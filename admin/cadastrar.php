<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/cabecalho.php"; ?>

<div id="escolhaCadastro">
    <form action="cadastrar.php" method="post">
        <input type="radio" name="formType" value="usuario" id="usuario" checked>
        <label for="usuario">Cadastro de Usuário</label>

        <input type="radio" name="formType" value="empresa" id="empresa">
        <label for="empresa">Cadastro de Empresa</label>
    </form>
</div>

<div id="usuarioForm">
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/admin/usuarios/cadastrar.php";?>
</div>

<div id="empresaForm" style="display:none">
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/admin/empresas/cadastrar.php";?>
</div>

<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/rodape.php";
?>