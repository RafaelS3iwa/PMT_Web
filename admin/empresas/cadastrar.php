<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/EmpresaController.php";

$empresaController = new EmpresaController();
$empresaController->cadastrarEmpresa();
?>
<main class="container mt-3 mb-3">
    <h1 style="color: black;">Cadastro</h1>
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">

                <form action="/admin/empresas/cadastrar.php" method="post" class="row g-3">
                    <div class="col-md-4">
                        <label for="nome_empresa" class="form-label">Nome da Empresa</label>
                        <input type="text" name="nome_empresa" id="nome_empresa" class="form-control" required>
                    </div>

                    <div class="col-md-4">
                        <label for="cnpj" class="form-label">CNPJ</label>
                        <input type="text" name="cnpj" id="cnpj" class="form-control" maxlength="18" required>
                    </div>

                    <div class="col-md-4">
                        <label for="data_abertura" class="form-label">Data de Abertura</label>
                        <input type="date" name="data_abertura" id="data_abertura" class="form-control" required>
                    </div>

                    <div class="col-md-4">
                        <label for="responsavel_legal" class="form-label">Responsavel Legal</label>
                        <input type="text" name="responsavel_legal" id="responsavel_legal" class="form-control" required>
                    </div>

                    <div class="col-md-12">
                        <label for="email_corporativo" class="form-label">E-mail</label>
                        <input type="email" name="email_corporativo" id="email_corporativo" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label for="senha" class="form-label">Senha</label>
                        <div class="input-group">
                            <input type="password" name="senha" id="senha" class="form-control" required>
                            <button type="button" id="toggleSenha" class="btn btn-outline-secondary">
                                <i class="fa fa-eye-slash"></i>
                            </button>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="senha" class="form-label">Confirmar Senha</label>
                        <div class="input-group">
                            <input type="password" name="senha" id="senha" class="form-control" required>
                            <button type="button" id="toggleConfirmarSenha" class="btn btn-outline-secondary">
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
        </div>
    </div>
</main>