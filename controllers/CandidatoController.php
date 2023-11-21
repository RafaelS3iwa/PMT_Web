<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/models/Candidatos.php";

class CandidatoController
{
    private $candidatoModel;

    public function __construct()
    {
        $this->candidatoModel = new Candidato();
    }

    public function cadastrarCandidato()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $id_usuario = $_SESSION['id_usuario'];

            $dados = [
                'id_usuario' => $id_usuario,
                'genero' => $_POST['genero'],
                'cpf' => $_POST['cpf'],
                'telefone' => $_POST['telefone'],
                'celular' => $_POST['celular'],
                'cep' => $_POST['cep'],
                'logradouro' => $_POST['logradouro'],
                'numero' => $_POST['numero'],
                'bairro' => $_POST['bairro'],
                'cidade' => $_POST['cidade'],
                'estado' => $_POST['estado'],
                'biografia' => $_POST['biografia'],
                'experiencias' => $_POST['experiencias'],
                'conhecimentos' => $_POST['conhecimentos'],
                'id_area_interesse' => $_POST['id_area_interesse'],
                'id_area_interesse2' => $_POST['id_area_interesse2'],
                'id_area_interesse3' => $_POST['id_area_interesse3'],
                'estado_civil' => $_POST['estado_civil'],
                'nacionalidade' => $_POST['nacionalidade'],
                'escolaridade' => $_POST['escolaridade']
            ];

            if (isset($_FILES['foto']['name']) && !empty($_FILES['foto']['name'])) {
                $fileInfo = pathinfo($_FILES['foto']['name']);
                $nomeArquivo = md5(uniqid());
                $uploadDir = __dir__ . "/../uploads/candidatos";

                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }

                $novoNomeArquivo = $nomeArquivo . "." . $fileInfo['extension'];
                $pastaDestino = $uploadDir . $novoNomeArquivo;
                move_uploaded_file($_FILES['foto']['tmp_name'], $pastaDestino);
                $dados['foto'] = $novoNomeArquivo;
            }
            $this->candidatoModel->cadastrar($dados);
            header('Location: index.php'); 
            exit;
        }
    }

    public function editarCandidato()
    {
        $id_candidato = $_SESSION['id_candidato']; 
        $id_usuario = Candidato::buscarIdUsuario($id_candidato);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $dados = [
                'genero' => $_POST['genero'],
                'cpf' => $_POST['cpf'],
                'telefone' => $_POST['telefone'],
                'celular' => $_POST['celular'],
                'cep' => $_POST['cep'],
                'logradouro' => $_POST['logradouro'],
                'numero' => $_POST['numero'],
                'bairro' => $_POST['bairro'],
                'cidade' => $_POST['cidade'],
                'estado' => $_POST['estado'],
                'biografia' => $_POST['biografia'],
                'experiencias' => $_POST['experiencias'],
                'conhecimentos' => $_POST['conhecimentos'],
                'id_area_interesse' => $_POST['id_area_interesse'],
                'id_area_interesse2' => isset($_POST['id_area_interesse2']) ? $_POST['id_area_interesse2'] : null,
                'id_area_interesse3' => isset($_POST['id_area_interesse3']) ? $_POST['id_area_interesse3'] : null,
                'estado_civil' => $_POST['estado_civil'],
                'nacionalidade' => $_POST['nacionalidade'],
                'escolaridade' => $_POST['escolaridade'],
                'nome_completo' => $_POST['nome_completo'],
                'nome_social' => $_POST['nome_social'],
                'data_nascimento' => $_POST['data_nascimento'],
                'email' => $_POST['email']
            ];

            $this->candidatoModel->editar($id_usuario, $dados);
            var_dump($dados);
        }
    }

    public function candidatar()
    {
        if($_SERVER['REQUEST_METHOD'] === "POST"){
            $id_candidato = $_SESSION['id_candidato']; 
            $id_vaga = $_POST['id_vaga']; 
            $acao = $_POST['acao']; 
            
            if($acao === 'candidatar'){
                $this->candidatoModel->candidatarVaga($id_candidato, $id_vaga); 
                header('Location: index.php'); 
                exit;
            }
        }
    }

    public function listarDadosCandidato($id_candidato)
    {
        $id_candidato = $_SESSION['id_candidato']; 
        $id_usuario = Candidato::buscarIdUsuario($id_candidato);
        $dadosCandidato = Candidato::listarDados($id_usuario);
        return $dadosCandidato;
    }

    public function listarVagas()
    {
        $id_candidato = $_SESSION['id_candidato']; 
        $vagas = Candidato::listarVagas($id_candidato);
        // Limitar para apenas as 4 primeiras vagas
        $vagas = array_slice($vagas, 0, 4);
        return $vagas;
    }

    public function listarHistorico(){
        $id_candidato = $_SESSION['id_candidato']; 
        $historico = Candidato::listarHistorico($id_candidato); 
        return $historico; 
    }
}
