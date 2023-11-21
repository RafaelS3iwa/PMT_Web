<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/database/DBConexao.php";

class AreaInteresse{

    protected $db;
    protected $table = "area_interesses"; 

    public function __construct()
    {
        $this->db = DBConexao::getConexao();
    }

    public function listar(){
        try {
            $sql = "SELECT * FROM {$this->table}";
            $stmt = $this->db->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro ao listar: " . $e->getMessage();
            return null;
        }
    }
}