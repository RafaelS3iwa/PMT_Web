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

        public function editar($id_empresa, $dados){
            try{
                $query = "UPDATE {$this->table} SET logotipo=:logotipo, nome_empresa=:nome_empresa, cnpj=:cnpj, inscricao_estadual=:inscricao_estadual, data_abertura=:data_abertura, responsavel_legal=:responsavel_legal, email_corporativo=:email_corporativo, telefone=:telefone, celular=:celular, logradouro=:logradouro, bairro=:bairro, numero=:numero, cep=:cep, cidade=:cidade, estado=:estado WHERE id_empresa=:id_empresa"; 
                $stmt = $this->db->prepare($query); 
                $stmt->bindParam(':id_empresa', $id_empresa, PDO::PARAM_INT); 
    
                $stmt->bindParam(':logotipo', $dados['logotipo']);
                $stmt->bindParam(':nome_empresa', $dados['nome_empresa']);
                $stmt->bindParam(':cnpj', $dados['cnpj']);
                $stmt->bindParam(':inscricao_estadual', $dados['inscricao_estadual']);
                $stmt->bindParam(':data_abertura', $dados['data_abertura']);
                $stmt->bindParam(':responsavel_legal', $dados['responsavel_legal']);
                $stmt->bindParam(':email_corporativo', $dados['email_corporativo']);
                $stmt->bindParam(':telefone', $dados['telefone']);
                $stmt->bindParam(':celular', $dados['celular']);
                $stmt->bindParam(':logradouro', $dados['logradouro']);
                $stmt->bindParam(':bairro', $dados['bairro']);
                $stmt->bindParam(':numero', $dados['numero']);
                $stmt->bindParam(':cep', $dados['cep']);
                $stmt->bindParam(':cidade', $dados['cidade']);
                $stmt->bindParam(':estado', $dados['estado']);
                
                $stmt->execute();
                return true;
            }catch(PDOException $e){
                echo 'Erro ao inserir os dados: ' . $e->getMessage();
                return false; 
            }
        }


        public static function getEmpresaPorID($id_empresa){
            try{
                $query = "SELECT id_empresa, nome_empresa, cnpj, data_abertura, responsavel_legal, inscricao_estadual, email_corporativo, telefone, celular, logotipo, logradouro, bairro, numero, cep, cidade, estado FROM empresas WHERE id_empresa = :id_empresa"; 
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
                        return false; 
                    }
                }else{
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