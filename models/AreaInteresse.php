<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/database/DBConexao.php";

class AreaInteresse{
    protected $db;
    protected $table = "area_interesse"; 

    public function __construct()
    {
        $this->db = DBConexao::getConexao();
    }

}