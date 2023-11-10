<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . "/database/DBConexao.php";

    class Vagas{

        protected $db; 
        protected $table = "vagas"; 

        public function __construct()
        {
            $this->db = DBConexao::getConexao(); 
        }
    }