<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . "/database/DBConexao.php";

    class Empresa{

        protected $db;
        protected $table="empresas"; 

        public function __construct()
        {
            $this->db = DBConexao::getConexao();
        }

        /**
         * Cadastrar Empresa
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

        public static function getEmpresaPorID($id_empresa){
            try{
                $query = "SELECT * FROM empresas WHERE id_empresa = :id_empresa"; 
                $conexao = DBConexao::getConexao();

                $stmt = $conexao->prepare($query);
                $stmt->bindParam(":id_empresa", $id_empresa);
                $stmt->execute();

                if($stmt->rowCount() === 1){
                    $empresa = $stmt->fetch(PDO::FETCH_ASSOC);
                    return $empresa;
                }else{
                    throw new Exception('Usuário não encontrado');
                    return false;
                }
            }catch(PDOException $e){
                echo 'Erro na inserção: ' . $e->getMessage(); 
                return null; 
            }
        }
        
        public static function autenticarLogin($email, $senha){
            try{
                $query = "SELECT id_empresa, email_corporativo, senha FROM empresas WHERE email_corporativo=:email_corporativo ";
                $conexao = DBConexao::getConexao();

                $stmt = $conexao->prepare($query);
                $stmt->bindParam(':email_corporativo', $email); 
                $stmt->execute(); 

                if($stmt->rowCount() === 1){
                    $empresa = $stmt->fetch(PDO::FETCH_ASSOC);
                    if(password_verify($senha, $empresa["senha"])){
                        return $empresa;
                    }else{
                        $_SESSION['erro'] = "E-mail ou senha incorretos!"; 
                        return false; 
                    }
                }else{
                    $_SESSION['erro'] = "E-mail ou senha incorretos!"; 
                    return false; 
                }
                return null; 
            }catch(PDOException $e){
                echo "Erro na inserção". $e->getMessage();
                return false; 
            }
        }
    } 
?>