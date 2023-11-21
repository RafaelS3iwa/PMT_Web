<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . "/database/DBConexao.php";

    class Candidato{

        protected $db; 
        protected $table = "candidatos"; 

        public function __construct()
        {
            $this->db = DBConexao::getConexao();
        }

        /**
         * Cadastrar Candidato
         * @param array $dados
         * @return bool 
         */
        public function cadastrar($dados){
            try{
                $query = "INSERT INTO {$this->table} (id_usuario, foto, genero, cpf, telefone, celular, cep, logradouro, numero, bairro, cidade, estado, biografia, experiencias, conhecimentos, id_area_interesse, id_area_interesse2, id_area_interesse3, estado_civil, nacionalidade, escolaridade) VALUES (:id_usuario, :foto, :genero, :cpf, :telefone, :celular, :cep, :logradouro, :numero, :bairro, :cidade, :estado, :biografia, :experiencias, :conhecimentos, :id_area_interesse, :id_area_interesse2, :id_area_interesse3, :estado_civil, :nacionalidade, :escolaridade)"; 
                $stmt = $this->db->prepare($query); 

                $stmt->bindParam(':id_usuario', $dados['id_usuario']);
                $stmt->bindParam(':foto', $dados['foto']);
                $stmt->bindParam(':genero', $dados['genero']);
                $stmt->bindParam(':cpf', $dados['cpf']);
                $stmt->bindParam(':telefone', $dados['telefone']);
                $stmt->bindParam(':celular', $dados['celular']);
                $stmt->bindParam(':cep', $dados['cep']);
                $stmt->bindParam(':logradouro', $dados['logradouro']);
                $stmt->bindParam(':numero', $dados['numero']);
                $stmt->bindParam(':bairro', $dados['bairro']);
                $stmt->bindParam(':cidade', $dados['cidade']);
                $stmt->bindParam(':estado', $dados['estado']);
                $stmt->bindParam(':biografia', $dados['biografia']);
                $stmt->bindParam(':experiencias', $dados['experiencias']);
                $stmt->bindParam(':conhecimentos', $dados['conhecimentos']);
                $stmt->bindParam(':id_area_interesse', $dados['id_area_interesse']);
                $stmt->bindParam(':id_area_interesse2', $dados['id_area_interesse2']);
                $stmt->bindParam(':id_area_interesse3', $dados['id_area_interesse3']);
                $stmt->bindParam(':estado_civil', $dados['estado_civil']);
                $stmt->bindParam(':nacionalidade', $dados['nacionalidade']);
                $stmt->bindParam(':escolaridade', $dados['escolaridade']);

                $stmt->execute();
                return true;
            }catch(PDOException $e){
                echo 'Erro ao inserir os dados: ' . $e->getMessage();
                return false;
            }
        }

        public function editar($id_usuario, $dados){
            try{
                $query = "UPDATE candidatos
                INNER JOIN usuarios ON candidatos.id_usuario = usuarios.id_usuario
                SET
                    candidatos.foto = :foto,
                    candidatos.genero = :genero,
                    candidatos.cpf = :cpf,
                    candidatos.telefone = :telefone,
                    candidatos.celular = :celular,
                    candidatos.cep = :cep,
                    candidatos.logradouro = :logradouro,
                    candidatos.numero = :numero,
                    candidatos.bairro = :bairro,
                    candidatos.cidade = :cidade,
                    candidatos.estado = :estado,
                    candidatos.biografia = :biografia,
                    candidatos.experiencias = :experiencias,
                    candidatos.conhecimentos = :conhecimentos,
                    candidatos.id_area_interesse = :id_area_interesse,
                    candidatos.id_area_interesse2 = :id_area_interesse2,
                    candidatos.id_area_interesse3 = :id_area_interesse3,
                    candidatos.estado_civil = :estado_civil,
                    candidatos.nacionalidade = :nacionalidade,
                    candidatos.escolaridade = :escolaridade,
                    usuarios.nome_completo = :nome_completo,
                    usuarios.nome_social = :nome_social,
                    usuarios.data_nascimento = :data_nascimento,
                    usuarios.email = :email
                WHERE candidatos.id_usuario = :id_usuario";
                $stmt = $this->db->prepare($query); 
                $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT); 

                $stmt->bindParam(':foto', $dados['foto']);
                $stmt->bindParam(':genero', $dados['genero']);
                $stmt->bindParam(':cpf', $dados['cpf']);
                $stmt->bindParam(':telefone', $dados['telefone']);
                $stmt->bindParam(':celular', $dados['celular']);
                $stmt->bindParam(':cep', $dados['cep']);
                $stmt->bindParam(':logradouro', $dados['logradouro']);
                $stmt->bindParam(':numero', $dados['numero']);
                $stmt->bindParam(':bairro', $dados['bairro']);
                $stmt->bindParam(':cidade', $dados['cidade']);
                $stmt->bindParam(':estado', $dados['estado']);
                $stmt->bindParam(':biografia', $dados['biografia']);
                $stmt->bindParam(':experiencias', $dados['experiencias']);
                $stmt->bindParam(':conhecimentos', $dados['conhecimentos']);
                $stmt->bindParam(':id_area_interesse', $dados['id_area_interesse']);
                $stmt->bindParam(':id_area_interesse2', $dados['id_area_interesse2']);
                $stmt->bindParam(':id_area_interesse3', $dados['id_area_interesse3']);
                $stmt->bindParam(':estado_civil', $dados['estado_civil']);
                $stmt->bindParam(':nacionalidade', $dados['nacionalidade']);
                $stmt->bindParam(':escolaridade', $dados['escolaridade']);

                $stmt->bindParam(':nome_completo', $dados['nome_completo']); 
                $stmt->bindParam(':nome_social', $dados['nome_social']); 
                $stmt->bindParam(':data_nascimento', $dados['data_nascimento']); 
                $stmt->bindParam(':email', $dados['email']); 
    
                $stmt->execute();
                return true;
            }catch(PDOException $e){
                echo 'Erro ao inserir os dados: ' . $e->getMessage();
                return false;
            }
        }

        public static function buscarIdUsuario($id_candidato){
            try{
                $query = "SELECT id_usuario FROM candidatos WHERE id_candidato = :id_candidato"; 
                $conexao = DBConexao::getConexao(); 
                $stmt = $conexao->prepare($query);
                $stmt->bindParam(':id_candidato', $id_candidato, PDO::PARAM_INT); 
                $stmt->execute(); 

                $id_usuario = $stmt->fetch(PDO::FETCH_ASSOC);
                return $id_usuario; 
            }catch(PDOException $e){
                echo 'Erro na inserção: ' . $e->getMessage(); 
                return null;
            }
        }

        public static function listarDados($id_usuario){ 
            try{
                $query = 
                "SELECT usuarios.nome_completo, usuarios.nome_social, usuarios.data_nascimento, usuarios.email, candidatos.*
                FROM usuarios
                INNER JOIN candidatos ON usuarios.id_usuario = candidatos.id_usuario
                WHERE usuarios.id_usuario = :id_usuario";                

                $conexao = DBConexao::getConexao();
                $stmt = $conexao->prepare($query);
                $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
                $stmt->execute(); 
                            
                $dadosCandidato = $stmt->fetch(PDO::FETCH_ASSOC);
                return $dadosCandidato;
            }catch(PDOException $e){
                echo 'Erro na inserção: ' . $e->getMessage(); 
                return null; 
            }
        }

        
        public static function listarVagas($id_candidato){
            try{
                $query = "SELECT DISTINCT v.*
                FROM vagas v
                JOIN candidatos c 
                ON v.id_area_interesse IN (c.id_area_interesse,  c.id_area_interesse2, c.id_area_interesse3)
                OR v.id_area_interesse2 IN (c.id_area_interesse, c.id_area_interesse2, c.id_area_interesse3)
                OR v.id_area_interesse3 IN (c.id_area_interesse, c.id_area_interesse2, c.id_area_interesse3)
                WHERE c.id_candidato = :id_candidato";

                $conexao = DBConexao::getConexao();
                $stmt = $conexao->prepare($query);
                $stmt->bindParam(':id_candidato', $id_candidato, PDO::PARAM_INT); 
                $stmt->execute();

                $vagas = $stmt->fetchAll(PDO::FETCH_ASSOC); 
                return $vagas;
            }catch(PDOException $e){
                echo 'Erro ao inserir os dados: ' . $e->getMessage();
                return false;   
            }
        }

        public function candidatarVaga($id_candidato, $id_vaga){
            try{
                $situacao = "Aguardando Resposta"; 
                $query = "INSERT INTO historicos (id_candidato, id_vaga, data_inscricao, situacao) VALUES (:id_candidato, :id_vaga, :data_inscricao, :situacao)";

                $stmt = $this->db->prepare($query); 
                $stmt->bindParam(':id_candidato', $id_candidato, PDO::PARAM_INT);
                $stmt->bindParam(':id_vaga', $id_vaga, PDO::PARAM_INT);
                $stmt->bindParam(':data_inscricao', date('Y-m-d'));
                $stmt->bindParam(':situacao', $situacao);

                $stmt->execute();
                return true;
            }catch(PDOException $e){
                echo 'Erro ao inserir os dados: ' . $e->getMessage();
                return false;   
            }
        }

        public static function listarHistorico($id_candidato){
            try{
                $query = "SELECT historicos.*, vagas.*
                FROM historicos
                INNER JOIN candidatos ON historicos.id_candidato = candidatos.id_candidato
                INNER JOIN vagas ON historicos.id_vaga = vagas.id_vaga
                WHERE candidatos.id_candidato = :id_candidato";

                $conexao = DBConexao::getConexao();
                $stmt = $conexao->prepare($query);
                $stmt->bindParam(':id_candidato', $id_candidato, PDO::PARAM_INT); 
                $stmt->execute();

                $historico = $stmt->fetchAll(PDO::FETCH_ASSOC); 
                return $historico;
            }catch(PDOException $e){
                echo 'Erro ao inserir os dados: ' . $e->getMessage();
                return false;   
            }
        }

        public function excluir($dados){
            
        }
    }