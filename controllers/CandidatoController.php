<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/models/Candidatos.php"; 

class CandidatoController{
    private $candidatoModel; 

    public function __construct()
    {
        $this->candidatoModel = new Candidato();
    }

    public function cadastrarCandidato(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            
            if($_FILES["imagem"]["error"] == 0){
                $dados_imagem = file_get_contents($_FILES["imagem"]["tmp_name"]);

                $dados = [
                    'foto' => $dados_imagem, 
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
                    'estado_civil' => $_POST['estado_civil'],
                    'nacionalidade' => $_POST['nacionalidade'], 
                    'escolaridade' => $_POST['escolaridade']
                ];

                $this->candidatoModel->cadastrar($dados);
                header('Location: index.php');
                exit;
            }
        }
    }
}