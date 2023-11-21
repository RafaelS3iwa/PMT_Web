<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/models/Vagas.php";

class VagaController
{
    private $vagaModel;

    public function __construct()
    {
        $this->vagaModel = new Vaga();
    }

    public function cadastrarVaga()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $id_empresa = $_SESSION['id_empresa'];

            $dados = [
                'id_empresa' => $id_empresa,
                'nome_vaga' => $_POST['nome_vaga'],
                'id_area_interesse' => $_POST['id_area_interesse'],
                'id_area_interesse2' => $_POST['id_area_interesse2'],
                'id_area_interesse3' => $_POST['id_area_interesse3'],
                'informacoes_servicos' => $_POST['informacoes_servicos'],
                'beneficios' => $_POST['beneficios'],
                'horario_inicio' => $_POST['horario_inicio'],
                'horario_final' => $_POST['horario_final'],
                'salario' => $_POST['salario']
            ];

            $this->vagaModel->cadastrar($dados);
            header('Location: /admin/empresas/index.php');
            exit;
        }
    }

    public function listarVaga()
    {
        $id_empresa = $_SESSION['id_empresa'];
        return $this->vagaModel->listarVagas($id_empresa);
    }

    public function editarVaga()
    {
        $id_vaga = $_GET['id_vaga'];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $dados = [
                'nome_vaga' => $_POST['nome_vaga'],
                'id_area_interesse' => $_POST['id_area_interesse'],
                'id_area_interesse2' => isset($_POST['id_area_interesse2']) ? $_POST['id_area_interesse2'] : null,
                'id_area_interesse3' => isset($_POST['id_area_interesse3']) ? $_POST['id_area_interesse3'] : null,
                'informacoes_servicos' => $_POST['informacoes_servicos'],
                'beneficios' => $_POST['beneficios'],
                'horario_inicio' => $_POST['horario_inicio'],
                'horario_final' => $_POST['horario_final'],
                'salario' => $_POST['salario']
            ];

            $this->vagaModel->editar($id_vaga, $dados);
            var_dump($dados);
            exit;
        }
        return $this->vagaModel->mostrarVaga($id_vaga);
    }

    public function listarHistorico()
    {
        $id_vaga = $_GET['id_vaga'];
        $historico = Vaga::listarHistorico($id_vaga);
        return $historico;
    }

    public function avaliarCandidato()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_candidato = $_POST['id_candidato'];
            $id_vaga = $_POST['id_vaga'];
            $acao = $_POST['acao'];
            if ($acao === 'aprovar') {
                $this->vagaModel->aprovarCandidato($id_vaga, $id_candidato);
                $_GET['id_vaga'] = $id_vaga;
                header("Location: historico.php");
                exit();
            } elseif ($acao === 'rejeitar') {
                $this->vagaModel->rejeitarCandidato($id_vaga, $id_candidato);
                $_GET['id_vaga'] = $id_vaga;
                header("Location: historico.php");
                exit();
            }
        }
    }
}
