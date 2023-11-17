<?php 
    require_once $_SERVER['DOCUMENT_ROOT'] . "/database/DBConexao.php";

class Usuario {
    
    protected $db;
    protected $table = "usuarios"; 

    public function __construct()
    {
        $this->db = DBConexao::getConexao();
    }

    /**
     * Cadastrar Usuário
     * @param array $dados
     * @return bool 
     */

    public function cadastrar($dados){
        try{
            $query = "INSERT INTO {$this->table} (nome_completo, nome_social, data_nascimento, email, senha) VALUES (:nome_completo, :nome_social, :data_nascimento, :email, :senha)"; 
            $stmt = $this->db->prepare($query);

            $stmt->bindParam(':nome_completo', $dados['nome_completo']); 
            $stmt->bindParam(':nome_social', $dados['nome_social']); 
            $stmt->bindParam(':data_nascimento', $dados['data_nascimento']); 
            $stmt->bindParam(':email', $dados['email']); 
            $stmt->bindParam(':senha', $dados['senha']); 

            $stmt->execute(); 
            return true;
        }catch(PDOException $e){
            echo 'Erro ao inserir os dados: ' . $e->getMessage();
            return false; 
        }
    }

    /**
     * Editar dados de Usuário
    *@param int $id
    *@param array $dados 
    *@return bool 
    */

    public function editar($id, $dados){
        try{    
            $query = "UPDATE {$this->table} SET  nome_completo=:nome_completo, nome_social=:nome_social, data_nascimento=:data_nascimento, email=:email WHERE id_usuario=:id_usuario"; 
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':id_usuario', $id, PDO::PARAM_INT);

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

    /**
     * Exclui Usuário
     */
    public function excluir($id_usuario)
    {
        try{
            $query = "DELETE FROM {$this->table} WHERE id_usuario = :id_usuario"; 
            $stmt = $this->db->prepare($query); 
            $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT); 
            $stmt->execute();
            return true; 
        }catch(PDOException $e){
            echo 'Erro na preparação da exclusão: ' . $e->getMessage(); 
            return false;   
        }
    }

    /**
     * Pega o id do Usuário e Lista seus dados após Login
     */
    public static function getUsuarioPorID($id_usuario)
    {
        try{
            $query = "SELECT * FROM usuarios WHERE id_usuario =:id_usuario"; 
            $conexao = DBConexao::getConexao();

            $stmt = $conexao->prepare($query);
            $stmt->bindParam(':id_usuario', $id_usuario);
            $stmt->execute(); 

            if($stmt->rowCount() === 1){
                $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
                return $usuario;
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
            $query = "SELECT id_usuario, email, senha FROM usuarios WHERE email=:email ";
            $conexao = DBConexao::getConexao();

            $stmt = $conexao->prepare($query);
            $stmt->bindParam(':email', $email); 
            $stmt->execute(); 

            if($stmt->rowCount() === 1){
                $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
                if(password_verify($senha, $usuario["senha"])){
                    return $usuario;
                }else{
                    $_SESSION['erro'] = "E-mail ou senha incorretos!"; 
                    return false; 
                }
            }else{
                $_SESSION['erro'] = "E-mail ou senha incorretos!"; 
                return false; 
            }
        } catch(PDOException $e){
            echo "Erro na autenticação: " . $e->getMessage();
            return false; 
        }
    }

    public static function isCandidato($id_usuario)
    {   
        try{
            $query = "SELECT COUNT(*) FROM candidatos WHERE id_usuario = :id_usuario";
            $conexao = DBConexao::getConexao();

            $stmt = $conexao->prepare($query);
            $stmt->bindParam(':id_usuario', $id_usuario);
            $stmt->execute(); 

            return $stmt->fetchColumn() > 0;
        } catch(PDOException $e){
            echo 'Erro na verificação de candidato: ' . $e->getMessage(); 
            return false; 
        }
    }
}

