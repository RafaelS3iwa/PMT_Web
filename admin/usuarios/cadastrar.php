<?php 
    require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/cabecalho.php"; 
    require_once $_SERVER['DOCUMENT_ROOT'] ."/controllers/UsuarioController.php";
    include_once $_SERVER['DOCUMENT_ROOT'] . "/includes/alerta.php";
    
    $usuarioController = new UsuarioController();
    $usuarioController->cadastrarUsuario();
?>

<main class="container mt-3 mb-3" >
    <h1 style="color: white;">Cadastro</h1>

        <div class="container mt-5">
            <div class="card">
                <div class="card-body">
                    <div class="col-12">
                        <label class="visually-hidden" for="inlineFormSelectPref">Preference</label>
                        <select class="form-select" id="inlineFormSelectPref">
                            <option selected>Escolha...</option>
                            <option value="1">Usuário</option>
                            <option value="2">Candidato</option>
                            <option value="3">Empresa</option>
                        </select>
                    </div>

                <form action="cadastrar.php" method="post" class="row g-3">
                    <div class="col-md-4">
                        <label for="nome_completo" class="form-label">Nome Completo</label>
                        <input type="text" name="nome_completo" id="nome_completo" class="form-control" required>
                    </div>

                    <div class="col-md-4">
                        <label for="nome_social" class="form-label">Nome Social</label>
                        <input type="text" name="nome_social"  id="nome_social" class="form-control">
                    </div>

                    <div class="col-md-4">
                        <label for="data_nascimento" class="form-label">Data de Nascimento</label>
                        <input type="date" name="data_nascimento" id="data_nascimento"  class="form-control" required>
                    </div>

                    <div class="col-md-12">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" name="email"  id="email" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label for="senha" class="form-label">Senha</label>
                        <div class="input-group">
                            <input type="password" name="senha"  id="senha" class="form-control" required>
                            <button  type="button" id="toggleSenha" class="btn btn-outline-secondary">
                                <i class="fa fa-eye-slash"></i>
                            </button>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="senha" class="form-label">Confirmar Senha</label>
                        <div class="input-group">
                            <input type="password" name="senha" id="senha" class="form-control" required>
                            <button type="button" id="toggleConfirmarSenha"  class="btn btn-outline-secondary">
                                <i class="fa fa-eye-slash"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                        <a href="index.php" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</main>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/rodape.php"; ?>