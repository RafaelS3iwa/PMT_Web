<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/cabecalho.php"; 
?>

<div id="escolhaLogin" class="container">
    <div class="blocoFormRoxoLogin">
        <div id="botao-escolha-login">
            <h1 class="titulo-form">Login</h1>
            <h3 class="texto-boas-vindas">Seja bem-vindo! Venha fazer parte do PMT!</h3>
            <form action="login.php" method="post">
                <div class="botao-formEscolha">

                    <input type="radio" name="formType" value="usuario" id="usuario" checked>
                    <label for="usuario">Login de Usuário</label>
                    
                    <input type="radio" name="formType" value="empresa" id="empresa">
                    <label for="empresa">Login de Empresa</label>
                </div>
            </form>
        </div>
    <div id="usuarioFormulario">
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/admin/usuarios/login.php";?>
    </div>
    
    <div id="empresaFormulario" style="display:none">
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/admin/empresas/login.php";?>
    </div>
    </div>
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/rodape.php"; ?>
