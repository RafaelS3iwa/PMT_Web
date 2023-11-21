<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/cabecalhoEmpresas.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/VagaController.php";
?>

<main>
    <div class="blocoCentralizado">

        <div class="blocoFormRoxo">
            <h1 class="titulo-h1">Suas Vagas
                <a href="/admin/vagas/cadastrar.php" class="btn btn-primary float-end">Criar Vaga</a>
            </h1>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nome da Vaga</th>
                        <th>Principal Área de Interesse</th>
                        <th>Data de Publicação</th>
                        <th>Número de Candidaturas</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        $vagaController = new VagaController();
                        $vagas = $vagaController->listarVaga();

                        foreach($vagas as $vaga):
                    ?>

                    <tr>
                        <td><?=$vaga->nome_vaga?></td>
                        <td><?=$vaga->id_area_interesse?></td>
                        <td><?=$vaga->data_publicacao?></td>
                        <td>0</td>
                        <td>
                            <a href="/admin/vagas/historico.php?id_vaga=<?=$vaga->id_vaga?>" class="btn btn-primary">Exibir</a>
                            <a href="/admin/vagas/editar.php?id_vaga=<?=$vaga->id_vaga?>" class="btn btn-danger">Editar</a>
                        </td>
                    </tr>

                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/rodape.php" ?>