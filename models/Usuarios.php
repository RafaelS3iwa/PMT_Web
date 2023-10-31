<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . "/database/dbconexao.php";

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