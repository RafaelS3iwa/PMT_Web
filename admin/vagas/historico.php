<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/cabecalhoEmpresas.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/VagaController.php";

$vagaController = new VagaController();
$vagaController->avaliarCandidato();
?>

<main id="historico-vaga">
    <div class="blocoCentralizado">

        <div class="blocoFormRoxo">
            <h1 class="titulo-h1">Seu Histórico</h1>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nome do Candidato</th>
                        <th>Conhecimentos</th>
                        <th>Experiencias</th>
                        <th>Data de Inscrição</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $historicos = $vagaController->listarHistorico();
                    foreach ($historicos as $historico) :
                    ?>

                        <tr>
                            <td><?=$historico['nome_completo']; ?></td>
                            <td><?=$historico['conhecimentos']; ?></td>
                            <td><?=$historico['experiencias']; ?></td>
                            <td><?=$historico['data_inscricao']; ?></td>
                            <td>
                                <form method="post" action="/admin/vagas/historico.php">
                                    <input type="hidden" name="id_candidato" value="<?=$historico['id_candidato'];?>">
                                    <input type="hidden" name="id_vaga" value="<?=$historico['id_vaga'];?>">
                                    <button type="submit" class="botao" name="acao" value="aprovar">Selecionar</button>
                                </form>

                                <form method="post" action="/admin/vagas/historico.php">
                                    <input type="hidden" name="id_candidato" value="<?=$historico['id_candidato'];?>">
                                    <input type="hidden" name="id_vaga" value="<?=$historico['id_vaga'];?>">
                                    <button type="submit" class="botao" name="acao" value="rejeitar">Rejeitar</button>
                                </form>
                            </td>
                        </tr>

                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/rodape.php"; ?>