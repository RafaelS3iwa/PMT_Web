<?php 
    require_once $_SERVER['DOCUMENT_ROOT'] ."/controllers/UsuarioController.php";
    
    $usuarioController = new UsuarioController();
    $usuarioController->cadastrarUsuario();
?>

<main class="cadastro">
    <h1>Cadastro</h1>
        <div class="container mt-5">
            <form action="/admin/usuarios/cadastrar.php" method="post" class="formCadastro">
                <div class="form-nome">
                    <label for="nome_completo" class="form-label">Nome Completo</label>
                    <input type="text" name="nome_completo" id="nome_completo" class="form-control" required>
                </div>

                <div class="form-nome">
                    <label for="nome_social" class="form-label">Nome Social</label>
                    <input type="text" name="nome_social"  id="nome_social" class="form-control">
                </div>

                <div class="form-group">
                    <label for="data_nascimento" class="form-label">Data de Nascimento</label>
                    <input type="date" name="data_nascimento" id="data_nascimento"  class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" name="email"  id="email" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="senha" class="form-label">Senha</label>
                    <div class="input-group">
                        <input type="password" name="senha"  id="senha" class="form-control" required>
                        <button  type="button" id="toggleSenha" class="btn btn-outline-secondary">
                            <i class="fa fa-eye-slash"></i>
                        </button>
                    </div>
                </div>

                <div class="form-group">
                    <label for="senha" class="form-label">Confirmar Senha</label>
                    <div class="input-group">
                        <input type="password" name="senha" id="senha" class="form-control" required>
                        <button type="button" id="toggleConfirmarSenha"  class="btn btn-outline-secondary">
                            <i class="fa fa-eye-slash"></i>
                        </button>
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit">Cadastrar</button>
                    <a href="/index.php" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>

</main>