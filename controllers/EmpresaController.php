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
                header('Location: ../index.php'); 
                exit;
            }
        }
    }

    public function editarEmpresa(){
        $id_empresa = $_SESSION['id_empresa']; 
        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $dados = [
                'nome_empresa' => $_POST['nome_empresa'],
                'cnpj' => $_POST['cnpj'],
                'inscricao_estadual' => $_POST['inscricao_estadual'],
                'data_abertura' => $_POST['data_abertura'],
                'responsavel_legal' => $_POST['responsavel_legal'],
                'email_corporativo' => $_POST['email_corporativo'],
                'telefone' => $_POST['telefone'],
                'celular' => $_POST['celular'],
                'logradouro' => $_POST['logradouro'],
                'bairro' => $_POST['bairro'],
                'numero' => $_POST['numero'],
                'cep' => $_POST['cep'],
                'cidade' => $_POST['cidade'],
                'estado' => $_POST['estado'],
            ];

            if (isset($_FILES['logotipo']['name']) && !empty($_FILES['logotipo']['name'])) {
                $fileInfo = pathinfo($_FILES['logotipo']['name']);
                $nomeArquivo = md5(uniqid());
                $uploadDir = __dir__ . "/../uploads/empresas";

                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }

                $novoNomeArquivo = $nomeArquivo . "." . $fileInfo['extension'];
                $pastaDestino = $uploadDir . "/" . $novoNomeArquivo;
                move_uploaded_file($_FILES['logotipo']['tmp_name'], $pastaDestino);
                $dados['logotipo'] = $novoNomeArquivo;
            }

            $this->empresaModel->editar($id_empresa, $dados); 
            var_dump($dados);
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
                    header("Location: /admin/empresas/index.php"); 
                }else{
                    echo "E-mail ou senha inválidos"; 
                    header("Location: /admin/login.php"); 
                }
            }
        }
    }

    public function listarDadosEmpresa($id_empresa){
        $id_empresa = $_SESSION['id_empresa']; 
        $dadosEmpresa = Empresa::getEmpresaPorID($id_empresa); 
        return $dadosEmpresa;
    }
}
