<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/cabecalho.php"; ?>

<form action="index.php" method="get">
    <input type="radio" name="formType" value="usuario" id="usuario" onchange="this.form.submit()" <?php if (isset($_GET['formType']) && $_GET['formType'] === 'usuario') echo 'checked'; ?>>
    <label for="usuario">Cadastro de Usuário</label>
    
    <input type="radio" name="formType" value="empresa" id="empresa" onchange="this.form.submit()" <?php if (isset($_GET['formType']) && $_GET['formType'] === 'empresa') echo 'checked'; ?>>
    <label for="empresa">Cadastro de Empresa</label>
</form>

<?php
if (!isset($_GET['formType'])) {
    $_GET['formType'] = 'usuario';
}

if (isset($_GET['formType'])) {
    $formType = $_GET['formType'];
    if ($formType === 'usuario') {
        require_once $_SERVER['DOCUMENT_ROOT'] . "/admin/usuarios/cadastrar.php";
    } elseif ($formType === 'empresa') {
        require_once $_SERVER['DOCUMENT_ROOT'] . "/admin/empresas/cadastrar.php";
    }
}

require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/rodape.php";
?>