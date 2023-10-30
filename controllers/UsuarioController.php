<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/models/Usuarios.php";

class UsuarioController
{
    private $usuarioModel; 

    public function __construct(){
        $this->usuarioModel = new Usuario();
    }
    public function listarUsuarios(){
        return $this->usuarioModel->listar();
    }

    public function cadastrarUsuario(){
        if($_SERVER["REQUEST_METHOD"] === 'POST'){

            $dados = [
                'nome_completo' => $_POST['nome_completo'], 
                'nome_social' => $_POST['nome_social'],
                'data_nascimento' => $_POST['data_nascimento'], 
                'email' => $_POST['email'],
                'senha' => password_hash($_POST['senha'], PASSWORD_DEFAULT)
            ];

            $this->usuarioModel->cadastrar($dados);
            header('Location: /admin/index.php'); 
            exit; 
        }
    }
}