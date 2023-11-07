<?php
    session_start();
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
            
        }
    }
?>