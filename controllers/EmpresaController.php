<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/models/Empresas.php";

class EmpresaController
{
    private $empresaController;

    public function __construct()
    {
        $this->empresaController = new Empresa;
    }

    public function listarEmpresas(){
        return $this->empresaController->listar();
    }

    public function cadastrarEmpresa(){
        if($_SERVER['REQUEST_METHOD'] === "POST"){

            $dados = [
                'nome_empresa' => $_POST['nome_empresa'],
                'cnpj' => $_POST['cnpj'],
                'data_abertura' => $_POST['data_abertura'],
                'responsavel_legal' => $_POST['responsavel_legal'],
                'email_corporativo' => $_POST['email_corporativo'],
                'senha' => password_hash($_POST['senha'], PASSWORD_DEFAULT)
            ]; 

            $this->empresaController->cadastrar($dados); 
            header('Location: page.php'); 
        }
    }
}