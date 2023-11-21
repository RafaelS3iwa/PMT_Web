<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/cabecalhoEmpresas.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/VagaController.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/AreaInteresseController.php";

$areaController = new AreaInteresseController();

$vagaController = new VagaController();
$vagaController->cadastrarVaga();
?>

<main id="cadastro-vaga">
    <div class="container">
        <form action="/admin/vagas/cadastrar.php" method="post" class="estiloForm">
            <div class="blocoFormRoxo">
            <div class="form-row">
                    <div class="form-group">
                        <label for="nome_vaga" class="form-label">Nome da Vaga:</label>
                        <input type="text" name="nome_vaga" id="nome_vaga" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="salario" class="form-label">Salário</label>
                        <input type="number" name="salario" id="salario" class="form-control" step="0.01">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="id_area_interesse">Principal Área de Atuação</label>
                        <select id="id_area_interesse" name="id_area_interesse">
                            <option value="" disabled selected>Selecione uma área</option>
                            <?php echo $areaController->listarAreas(); ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="id_area_interesse2">Segunda Área de Atuação (Opcional)</label>
                        <select id="id_area_interesse2" name="id_area_interesse2">
                            <option value="" disabled selected>Selecione uma área</option>
                            <?= $areaController->listarAreas(); ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="id_area_interesse3">Terceira Área de Atuação (Opcional)</label>
                        <select id="id_area_interesse3" name="id_area_interesse3">
                            <option value="" disabled selected>Selecione uma área</option>
                            <?= $areaController->listarAreas(); ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="informacoes_servicos" class="form-label">Informações do Serviço: </label>
                    <input type="text" name="informacoes_servicos" id="informacoes_servicos" class="form-control">
                </div>

                <div class="form-group">
                    <label for="beneficios" class="form-label">Benefícios: </label>
                    <input type="text" name="beneficios" id="beneficios" class="form-control">
                </div>

                <div class="form-row">
                    <div class="col">
                        <label for="horario_inicio" class="form-label">Horário de Entrada</label>
                        <input type="time" name="horario_inicio" id="horario_inicio" class="form-control">
                    </div>

                    <div class="col">
                        <label for="horario_final" class="form-label">Horário de Saída</label>
                        <input type="time" name="horario_final" id="horario_final" class="form-control">
                    </div>
                </div>

                <div class="botoes">
                    <button type="submit" class="btn btn-primary">Confirmar</button>
                    <a href="/admin/empresas/index.php" class="btn btn-secondary">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</main>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/rodape.php";  ?>