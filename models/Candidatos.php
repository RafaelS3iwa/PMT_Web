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
                $query = "INSERT INTO {$this->table} (id_usuario, id_area_interesse, cpf, telefone, genero, celular, experiencias, conhecimentos, biografia, escolaridade, nacionalidade, estado_civil, foto, cep, logradouro, bairro, numero, cidade, estado) VALUES (:id_usuario, :id_area_interesse, :cpf, :telefone, :genero, :celular, :experiencias, :conhecimentos, :biografia, :escolaridade, :nacionalidade, :estado_civil, :foto, :cep, :logradouro, :bairro, :numero, :cidade, :estado)"; 
                $stmt = $this->db->prepare($query); 

                $stmt->bindParam(':id_usuario', $dados['id_usuario']);
                $stmt->bindParam(':id_area_interesse', $dados['id_area_interesse']);
                $stmt->bindParam(':cpf', $dados['cpf']);
                $stmt->bindParam(':telefone', $dados['telefone']);
                $stmt->bindParam(':genero', $dados['genero']);
                $stmt->bindParam(':celular', $dados['celular']);
                $stmt->bindParam(':experiencias', $dados['experiencias']);
                $stmt->bindParam(':conhecimentos', $dados['conhecimentos']);
                $stmt->bindParam(':biografia', $dados['biografia']);
                $stmt->bindParam(':escolaridade', $dados['escolaridade']);
                $stmt->bindParam(':nacionalidade', $dados['nacionalidade']);
                $stmt->bindParam(':estado_civil', $dados['estado_civil']);
                $stmt->bindParam(':foto', $dados['foto']);
                $stmt->bindParam(':cep', $dados['cep']);
                $stmt->bindParam(':logradouro', $dados['logradouro']);
                $stmt->bindParam(':bairro', $dados['bairro']);
                $stmt->bindParam(':numero', $dados['numero']);
                $stmt->bindParam(':cidade', $dados['cidade']);
                $stmt->bindParam(':estado', $dados['estado']);

                $stmt->execute();
                return true;
            }catch(PDOException $e){
                echo 'Erro ao inserir os dados: ' . $e->getMessage();
                return false;
            }
        }
    }