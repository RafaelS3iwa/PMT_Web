<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . "/database/DBConexao.php";

    class Candidatos{

        protected $db; 
        protected $table = "candidatos"; 

        public function __construct()
        {
            $this->db = DBConexao::getConexao();
        }
    }