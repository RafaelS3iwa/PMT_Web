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
                    $_SESSION['id_usuario'] = $usuario['id_usuario'];
               
                        if(Usuario::isCandidato($usuario['id_usuario'])) {
                            session_start();
                            $idCandidato = Usuario::getIdCandidato($usuario['id_usuario']); 
                            $_SESSION['id_candidato'] = $idCandidato;
                            header("Location: /admin/candidatos/index.php");
                        }else{
                            session_start();
                            $_SESSION['id_usuario'] = $usuario['id_usuario'];
                            header("Location: index.php");
                        }
                    } else {
                        echo "E-mail ou senha inválidos"; 
                        header("Location: /admin/login.php"); 
                }
            }
        }
    }

    public function listarDadosUsuario($id_usuario){
        $id_usuario = $_SESSION['id_usuario'];
        $dadosUsuario = Usuario::getUsuarioPorID($id_usuario);
        return $dadosUsuario; 
    }

    public function editarUsuario(){
        $id_usuario = $_SESSION['id_usuario'];
        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $dados = [
                'nome_completo' => $_POST['nome_completo'], 
                'nome_social' => $_POST['nome_social'],
                'data_nascimento' => $_POST['data_nascimento'], 
                'email' => $_POST['email']
            ];

            $this->usuarioModel->editar($id_usuario, $dados);
            header('Location: index.php');
            exit; 
        }
    }
}