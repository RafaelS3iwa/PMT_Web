<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/cabecalho.php"; 
?>


<div id="escolhaCadastro" class="container">
    <div id="botao-escolha-cadastro">
        <form action="cadastro.php" method="post">
            <input type="radio" name="formType" value="usuario" id="usuario" checked>
            <label for="usuario">Cadastro de Usuário</label>

            <input type="radio" name="formType" value="empresa" id="empresa">
            <label for="empresa">Cadastro de Empresa</label>
        </form>
    </div>
    <div id="usuarioCadastroForm" class="blocoFormRoxo">
        <form action="/cadastrar_usuario.php" method="post" class="estiloForm">

            <label for="nome">Nome:</label>
            <input type="text" name="nome" required>

            <label for="nome_social">Nome Social:</label>
            <input type="text" name="nome_social">

            <label for="data_nascimento">Data de Nascimento:</label>
            <input type="date" name="data_nascimento" required>

            <label for="email">Email:</label>
            <input type="email" name="email" required>

            <label for="senha">Senha:</label>
            <input type="password" name="senha" required>

            <label for="confirmar_senha">Confirmar Senha:</label>
            <input type="password" name="confirmar_senha" required>

            <input type="submit" value="Cadastrar">
        </form>
    </div>
    
    <div id="empresaCadastroForm" style="display:none">
        <!-- Formulário de cadastro de empresa (se necessário) -->
    </div>
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/rodape.php"; ?>

<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/cabecalho.php"; 
?>

