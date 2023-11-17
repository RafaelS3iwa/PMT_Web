<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . "/database/DBConexao.php";

    class Vagas{

        protected $db; 
        protected $table = "vagas"; 

        public function __construct()
        {
            $this->db = DBConexao::getConexao(); 
        }

    /**
     * Cadastrar Vaga
     * @param array $dados
     * @return bool 
     */
        public function cadastrar($dados){ 
            try{
                $query = "SELECT * FROM {$this->table} (id_empresa, id_area_interesse, id_area_interesse2, id_area_interesse3, informacoes_servicos, beneficios, horario_inicio, horario_final, salario) VALUES (:id_empresa, :id_area_interesse, :id_area_interesse2, :id_area_interesse3, :informacoes_servicos, :beneficios, :horario_inicio, :horario_final, :salario)";
                $stmt = $this->db->prepare($query);

                $stmt->bindParam(':id_empresa', $dados['id_empresa']); 
                $stmt->bindParam(':id_area_interesse', $dados['id_area_interesse']); 
                $stmt->bindParam(':id_area_interesse2', $dados['id_area_interesse2']); 
                $stmt->bindParam(':id_area_interesse3', $dados['id_area_interesse3']); 
                $stmt->bindParam(':informacoes_servicos', $dados['informacoes_servicos']); 
                $stmt->bindParam(':beneficios', $dados['beneficios']); 
                $stmt->bindParam(':horario_inicio', $dados['horario_inicio']); 
                $stmt->bindParam(':horario_final', $dados['horario_final']); 
                $stmt->bindParam(':salario', $dados['salario']); 

                $stmt->execute(); 
                return true;
            }catch(Exception $e){
                echo 'Erro ao inserir os dados: ' . $e->getMessage();
                return false;   
        }
    }

    public function editar($id, $dados){
        try{
            $query = "UPDATE {$this->table} SET id_area_interesse = :id_area_interesse, id_area_interesse2 = :id_area_interesse2, id_area_interesse3 = :id_area_interesse3, informacoes_servicos = :informacoes_servicos, beneficios = :beneficios, horario_inicio = :horario_inicio, horario_final = :horario_final, salario = :salario WHERE id_vaga = :id_vaga";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':id_vaga', $id, PDO::PARAM_INT); 

            $stmt->bindParam(':id_area_interesse', $dados['id_area_interesse']); 
            $stmt->bindParam(':id_area_interesse2', $dados['id_area_interesse2']); 
            $stmt->bindParam(':id_area_interesse3', $dados['id_area_interesse3']); 
            $stmt->bindParam(':informacoes_servicos', $dados['informacoes_servicos']); 
            $stmt->bindParam(':beneficios', $dados['beneficios']); 
            $stmt->bindParam(':horario_inicio', $dados['horario_inicio']); 
            $stmt->bindParam(':horario_final', $dados['horario_final']); 
            $stmt->bindParam(':salario', $dados['salario']); 

            $stmt->execute(); 
            return true;
        }catch(PDOException $e){
            echo 'Erro ao inserir os dados: ' . $e->getMessage();
            return false;
        }
    }

    public function apagarVaga($id_vaga){
        try{
            $query = "DELETE FROM {$this->table} WHERE id_vaga = :id_vaga"; 
            $stmt = $this->db->prepare($query); 
            $stmt->bindParam(':id_vaga', $id_vaga, PDO::PARAM_INT); 
            $stmt->execute(); 
            return true;
        }catch(PDOException $e){
            echo 'Erro na preparação da exclusão: ' . $e->getMessage();
            return false; 
        }
    }

    public function listarVagas($id){
        try{
            $query = "SELECT * FROM {$this->table} WHERE id_empresa = :id_empresa";
            $stmt = $this->db->prepare($query);  
            return $stmt->fetchAll(PDO::FETCH_OBJ); 
        }catch(PDOException $e){
            echo 'Erro na preparação da exclusão: ' . $e->getMessage();
            return false; 
        }
    }

    public function mostrarVaga($id_vaga){
        try{
            
        }catch(PDOException $e){

        }
    }
}