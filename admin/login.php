<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/cabecalho.php"; 
?>

<div id="escolhaLogin">
    <div id="botao-escolha-login">
        <form action="login.php" method="post">
            <input type="radio" name="formType" value="usuario" id="usuario" checked>
            <label for="usuario">Cadastro de Usuário</label>

            <input type="radio" name="formType" value="empresa" id="empresa">
            <label for="empresa">Cadastro de Empresa</label>
        </form>
    </div>
    <div id="usuarioForm">
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/admin/usuarios/login.php";?>
    </div>
    
    <div id="empresaForm" style="display:none">
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/admin/empresas/login.php";?>
    </div>
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/rodape.php"; ?>
