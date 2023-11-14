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
    }