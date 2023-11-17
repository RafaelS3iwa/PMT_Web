<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/models/Empresas.php";

class EmpresaController
{
    private $empresaModel;

    public function __construct()
    {
        $this->empresaModel = new Empresa();
    }

    public function cadastrarEmpresa(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $cnpj = $_POST['cnpj']; 
            if(strlen($cnpj) !==18 ){
                $erroCnpj = 'CNPJ Inválido!';   
            }else{
                $dados = [
                    'nome_empresa' => $_POST['nome_empresa'],
                    'cnpj' => $_POST['cnpj'],
                    'data_abertura' => $_POST['data_abertura'],
                    'responsavel_legal' => $_POST['responsavel_legal'],
                    'email_corporativo' => $_POST['email_corporativo'],
                    'senha' => password_hash($_POST['senha'], PASSWORD_DEFAULT)
                ]; 
                
                $this->empresaModel->cadastrar($dados); 
                header('Location: index.php'); 
                exit;
            }
        }
    }

    public function loginEmpresa(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $email = $_POST['email_corporativo']; 
            $senha = $_POST['senha'];

            if(empty($email)){
                header("Location: login.php?error=E-mail é obrigatório."); 
                exit();
            }else if(empty($senha)){
                header("Location: login.php?error=A senha é obrigatória.");
                exit();
            }else{
                $empresa = Empresa::autenticarLogin($email, $senha);
                if ($empresa){ 
                    session_start(); 

                    $_SESSION['id_empresa'] = $empresa['id_empresa'];
                    if(isset($empresa['id_empresa'])){
                        $id_empresa = $empresa['id_empresa']; 
                        $_SESSION['dados_empresa'] = Empresa::getEmpresaPorID($id_empresa);
                    }; 
                    header("Location: index.php"); 
                }else{
                    echo "E-mail ou senha inválidos"; 
                    header("Location: /admin/index.php"); 
                }
            }
        }
    }
}
