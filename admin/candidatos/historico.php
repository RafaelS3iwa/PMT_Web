<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/cabecalhoCandidatos.php"; 
?>

<main>
    <div class="blocoCentralizado">
        <div class="blocoFormRoxo">
            <h1 class="titulo-h1">Seu Histórico</h1>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nome da Vaga</th>
                        <th>Principal Área de Interesse</th>
                        <th>Data de Inscrição</th>
                        <th>Situação</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        $historicos = $candidatoController->listarHistorico();
                        foreach($historicos as $historico):
                    ?>

                    <tr>
                        <td><?=$historico['nome_vaga']; ?></td>
                        <td><?=$historico['id_area_interesse'];?></td>
                        <td><?=$historico['data_inscricao'];?></td>
                        <td><?=$historico['situacao'];?></td>
                    </tr>

                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/rodape.php";?>