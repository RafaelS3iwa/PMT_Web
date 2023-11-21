<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . "/database/DBConexao.php";

    class Vaga{

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
                $query = "INSERT INTO {$this->table} (id_empresa, nome_vaga, data_publicacao, id_area_interesse, id_area_interesse2, id_area_interesse3, informacoes_servicos, beneficios, horario_inicio, horario_final, salario) VALUES (:id_empresa, :nome_vaga, :data_publicacao, :id_area_interesse, :id_area_interesse2, :id_area_interesse3, :informacoes_servicos, :beneficios, :horario_inicio, :horario_final, :salario)";
                $stmt = $this->db->prepare($query);

                $stmt->bindParam(':id_empresa', $dados['id_empresa']); 
                $stmt->bindParam(':nome_vaga', $dados['nome_vaga']); 
                $stmt->bindParam(':data_publicacao', date('Y-m-d'));
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

    public function editar($id_vaga, $dados){
        try{
            $query = "UPDATE {$this->table} SET nome_vaga = :nome_vaga, data_publicacao = :data_publicacao, id_area_interesse = :id_area_interesse, id_area_interesse2 = :id_area_interesse2, id_area_interesse3 = :id_area_interesse3, informacoes_servicos = :informacoes_servicos, beneficios = :beneficios, horario_inicio = :horario_inicio, horario_final = :horario_final, salario = :salario WHERE id_vaga = :id_vaga";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':id_vaga', $id_vaga, PDO::PARAM_INT); 

            $stmt->bindParam(':nome_vaga', $dados['nome_vaga']); 
            $stmt->bindParam(':data_publicacao', date('Y-m-d'));
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

    // Exibe as vagas unicamente para a empresa pelo id
    public function listarVagas($id_empresa){
        try{
            $query = "SELECT * FROM {$this->table} WHERE id_empresa = :id_empresa";
            $stmt = $this->db->prepare($query);  
            $stmt->bindParam(':id_empresa', $id_empresa, PDO::PARAM_INT);
            
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_OBJ); 
        }catch(PDOException $e){
            echo 'Erro na preparação da exclusão: ' . $e->getMessage();
            return false; 
        }
    }

    /**
     * Pega o id da vaga e Lista seus dados para a empresa
     */
    public function mostrarVaga($id_vaga)
    {
        try {
            $query = "SELECT * FROM {$this->table} WHERE id_vaga = :id_vaga";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':id_vaga', $id_vaga, PDO::PARAM_INT);

            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo 'Erro ao inserir os dados: ' . $e->getMessage();
            return false;
        }
    }

    public static function listarHistorico($id_vaga){
        try{
            $query = "SELECT historicos.*, candidatos.*, usuarios.nome_completo
            FROM historicos 
            INNER JOIN vagas ON historicos.id_vaga = vagas.id_vaga
            INNER JOIN candidatos ON historicos.id_candidato = candidatos.id_candidato
            INNER JOIN usuarios ON candidatos.id_usuario = usuarios.id_usuario
            WHERE vagas.id_vaga = :id_vaga"; 

            $conexao = DBConexao::getConexao(); 
            $stmt = $conexao->prepare($query); 
            $stmt->bindParam(':id_vaga', $id_vaga, PDO::PARAM_INT); 
            $stmt->execute(); 

            $historico = $stmt->fetchAll(PDO::FETCH_ASSOC); 
            return $historico;
        }catch(PDOException $e){
            echo 'Erro ao inserir os dados: ' . $e->getMessage();
            return false;  
        }
    }

    public function aprovarCandidato($id_vaga, $id_candidato){
        try{ 
            $situacao = "Selecionado!";
            $query = "UPDATE historicos SET situacao = :situacao WHERE id_vaga = :id_vaga AND id_candidato = :id_candidato"; 

            $stmt = $this->db->prepare($query); 
            $stmt->bindParam(':id_vaga', $id_vaga, PDO::PARAM_INT); 
            $stmt->bindParam(':id_candidato', $id_candidato, PDO::PARAM_INT); 
            $stmt->bindParam(':situacao', $situacao); 

            $stmt->execute();
            return true; 
        }catch(PDOException $e){
            echo 'Erro ao inserir os dados: ' . $e->getMessage();
            return false;  
        }
    }

    public function rejeitarCandidato($id_vaga, $id_candidato){
        try{ 
            $situacao = "Não Selecionado";
            $query = "UPDATE historicos SET situacao = :situacao WHERE id_vaga = :id_vaga AND id_candidato = :id_candidato"; 

            $stmt = $this->db->prepare($query); 
            $stmt->bindParam(':id_vaga', $id_vaga, PDO::PARAM_INT); 
            $stmt->bindParam(':id_candidato', $id_candidato, PDO::PARAM_INT); 
            $stmt->bindParam(':situacao', $situacao); 

            $stmt->execute();
            return true; 
        }catch(PDOException $e){
            echo 'Erro ao inserir os dados: ' . $e->getMessage();
            return false;  
        }
    }
}