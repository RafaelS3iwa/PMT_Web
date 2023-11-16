<?php 
    require_once $_SERVER['DOCUMENT_ROOT'] . "/models/Usuarios.php";

class UsuarioController
{
    private $usuarioModel; 

    public function __construct()
    {
        $this->usuarioModel = new Usuario();
    }

    public function cadastrarUsuario(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $dados = [
                'nome_completo' => $_POST['nome_completo'], 
                'nome_social' => $_POST['nome_social'],
                'data_nascimento' => $_POST['data_nascimento'], 
                'email' => $_POST['email'],
                'senha' => password_hash($_POST['senha'], PASSWORD_DEFAULT)
            ];

            $this->usuarioModel->cadastrar($dados);
            header('Location: index.php'); 
            exit; 
        }

    }

    public function loginUsuario(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $email = $_POST['email']; 
            $senha = $_POST['senha'];

            if(empty($email)){
                header("Location: login.php?error=E-mail é obrigatório."); 
                exit();
            }else if(empty($senha)){
                header("Location: login.php?error=A senha é obrigatória.");
                exit();
            }else{
                $usuario = Usuario::autenticarLogin($email, $senha);
                if ($usuario){ 
                    session_start(); 
                    
                    $_SESSION['id_usuario'] = $usuario['id_usuario'];
                    if (isset($usuario['id_usuario'])) {
                        $id_usuario = $usuario['id_usuario'];
                        $_SESSION['dados_usuario'] = Usuario::getUsuarioPorID($id_usuario);
                    };
                    header("Location: index.php"); 
                }else{
                    echo "E-mail ou senha inválidos"; 
                    header("Location: /admin/login.php"); 
                }
            }
        }
    }

    public function logoutUsuario(){
        session_start();
        session_unset();
        session_destroy();
        header("Location: ../index.php");
        exit();
    }
}