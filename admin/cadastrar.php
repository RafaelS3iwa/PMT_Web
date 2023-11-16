<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/cabecalho.php";
?>


<div id="escolhaCadastro" class="container">
    <div class="blocoFormRoxo">
        <div id="botao-escolha-cadastro">
            <h1 class="titulo-form">Cadastro</h1>
            <h3 class="texto-boas-vindas">Seja bem-vindo! Venha fazer parte do PMT!</h3>
            <form action="cadastro.php" method="post">
                <div class="botao-formEscolha">
                    
                    <input type="radio" name="formType" value="usuario" id="usuario" checked>
                    <label for="usuario">Cadastro de Usuário</label>
    
                    <input type="radio" name="formType" value="empresa" id="empresa">
                    <label for="empresa">Cadastro de Empresa</label>
                </div>
            </form>
        </div>
        <div id="usuarioForm">
            <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/admin/usuarios/cadastrar.php"; ?>
        </div>

        <div id="empresaForm" style="display:none">
            <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/admin/empresas/cadastrar.php"; ?>
        </div>
    </div>
</div>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/rodape.php"; ?>