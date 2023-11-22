<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/cabecalhoCandidatos.php";

$candidatoController->candidatar();
$vagas = $candidatoController->listarVagas();
?>

<main id="index-candidato">
    <div class="container">
        <div class="lista-vagas">
            <?php foreach ($vagas as $vaga) : ?>
                <form action="index.php" method="post">
                    <div class="vaga">
                        <input type="hidden" name="id_vaga" value="<?php echo $vaga['id_vaga']; ?>">
                        <h3><?php echo $vaga['nome_vaga']; ?></h3>
                        <p><?php echo $vaga['informacoes_servicos']; ?></p>
                        <p><strong class="beneficios">Benefícios:</strong> <?php echo $vaga['beneficios']; ?></p>
                        <p><strong class="salario">Salário:</strong> <?php echo $vaga['salario']; ?></p>
                        <!-- Botões -->
                        <div class="botoes">
                            <button type="submit" class="botao" name="acao" value="candidatar">Candidatar</button>
                            <button class="botao">Rejeitar</button>
                        </div>
                    </div>
                </form>
            <?php endforeach; ?>
        </div>
    </div>
</main>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/rodape.php"; ?>