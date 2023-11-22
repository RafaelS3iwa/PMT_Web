<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/EmpresaController.php";

$empresaController = new EmpresaController();
$empresaController->cadastrarEmpresa();
?>
<main class="cadastro-empresa">
    <div class="container mt-5">
        <form action="/admin/empresas/cadastrar.php" method="post" class="estiloForm">

            <div class="form-row">
                <div class="col">
                    <label for="nome_empresa" class="form-label">Nome da Empresa</label>
                    <input type="text" name="nome_empresa" id="nome_empresa" class="form-control" required>
                </div>

                <div class="col">
                    <label for="responsavel_legal" class="form-label">Responsavel Legal</label>
                    <input type="text" name="responsavel_legal" id="responsavel_legal" class="form-control" required>
                </div>
            </div>

            <div class="form-group">
                <label for="data_abertura" class="form-label">Data de Abertura</label>
                <input type="date" name="data_abertura" id="data_abertura" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="cnpj" class="form-label">CNPJ</label>
                <input type="text" name="cnpj" id="cnpj" class="form-control" maxlength="18" required>
            </div>



            <div class="form-group">
                <label for="email_corporativo" class="form-label">E-mail</label>
                <input type="email" name="email_corporativo" id="email_corporativo" class="form-control" required>
            </div>

            <div class="form-row">
                <div class="col">
                    <label for="senha" class="form-label">Senha</label>
                    <div class="input-group">   
                        <input type="password" name="senha" id="senha" class="form-control" required>
                    </div>
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