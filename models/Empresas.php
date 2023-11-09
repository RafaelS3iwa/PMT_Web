<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . "/database/DBConexao.php";

    class Empresa{
        protected $db;
        protected $table="empresas"; 

        public function __construct(){
            $this->db = DBConexao::getConexao();
        }

        /**
     * Cadastrar Usuário
     * @param array $dados
     * @return bool 
     */
        public function cadastrar($dados){
            try{
                $query = "INSERT INTO {$this->table} (nome_empresa, cnpj, data_abertura, responsavel_legal, email_corporativo, senha) VALUES (:nome_empresa, :cnpj, :data_abertura, :responsavel_legal, :email_corporativo, :senha)";
                $stmt = $this->db->prepare($query); 

                $stmt->bindParam(':nome_empresa', $dados['nome_empresa']);
                $stmt->bindParam(':cnpj', $dados['cnpj']);
                $stmt->bindParam(':data_abertura', $dados['data_abertura']);
                $stmt->bindParam(':responsavel_legal', $dados['responsavel_legal']);
                $stmt->bindParam(':email_corporativo', $dados['email_corporativo']);
                $stmt->bindParam(':senha', $dados['senha']);
 
                $stmt->execute();
                return true;
            }catch(PDOException $e){
                echo 'Erro ao inserir os dados: ' . $e->getMessage();
                return false;
            }
        }

        public function listar()
        {
            try{
                $query = "SELECT * FROM {$this->table}"; 
                $stmt = $this->db->query($query); 
                return $stmt->fetchAll(PDO::FETCH_OBJ);
                
            }catch(PDOException $e){
                echo 'Erro na inserção: ' . $e->getMessage(); 
                return null; 
            }
        }
    } 
?>