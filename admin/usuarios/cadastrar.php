<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/UsuarioController.php";

$usuarioController = new UsuarioController();
$usuarioController->cadastrarUsuario();
?>

<main>
    <div class="container">
        <form action="/admin/usuarios/cadastrar.php" method="post" class="estiloForm">
            <div class="form-row">
                <div class="col">
                    <label for="nome_completo" class="form-label">Nome Completo</label>
                    <input type="text" name="nome_completo" id="nome_completo" class="form-control" required>
                </div>

                <div class="col">
                    <label for="nome_social" class="form-label">Nome Social</label>
                    <input type="text" name="nome_social" id="nome_social" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label for="data_nascimento" class="form-label">Data de Nascimento</label>
                <input type="date" name="data_nascimento" id="data_nascimento" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>

            <div class="form-row">
                <div class="col">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" name="senha" id="senha" class="form-control" required>
                </div>
            </div>

            <div class="botoes">
                <button type="submit" class="btn-Cadastro">Cadastrar</button>
                <a href="/index.php">
                    <button  class="btn-Cancelar">Cancelar</button>
                    </a>
            </div>
        </form>
    </div>
</main>