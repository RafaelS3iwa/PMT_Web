<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/cabecalho.php"; ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<!-- Adicione o código JavaScript/jQuery aqui -->
<script>
$(document).ready(function () {
    $("#toggleSenha").click(function () {
        var senhaInput = $("#inputsenha");
        var tipoInput = senhaInput.attr("type");

        if (tipoInput === "password") {
            senhaInput.attr("type", "text");
            $("#toggleSenha i").removeClass("fa-eye-slash").addClass("fa-eye");
        } else {
            senhaInput.attr("type", "password");
            $("#toggleSenha i").removeClass("fa-eye").addClass("fa-eye-slash");
        }
    });

    $("#toggleConfirmarSenha").click(function () {
        var confirmarSenhaInput = $("#inputConfirmarSenha");
        var tipoInput = confirmarSenhaInput.attr("type");

        if (tipoInput === "password") {
            confirmarSenhaInput.attr("type", "text");
            $("#toggleConfirmarSenha i").removeClass("fa-eye-slash").addClass("fa-eye");
        } else {
            confirmarSenhaInput.attr("type", "password");
            $("#toggleConfirmarSenha i").removeClass("fa-eye").addClass("fa-eye-slash");
        }
    });
});
</script>
<style>
  /* Estilo para a imagem de fundo */
  body {
    background-image: url('/assets/img/pexels-marek-piwnicki-5913337.jpg'); /* Nome da imagem que você baixou */
    background-size: 1950px 1150px;
    background-repeat: no-repeat;
    background-attachment: fixed;
  }
</style>

<main class="container mt-3 mb-3" >
    <h1 style="color: white;">Cadastro</h1>
</main>

<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <form class="row g-3">
                <div class="col-12">
                    <label class="visually-hidden" for="inlineFormSelectPref">Preference</label>
                    <select class="form-select" id="inlineFormSelectPref">
                        <option selected>Escolha...</option>
                        <option value="1">Usuário</option>
                        <option value="2">Candidato</option>
                        <option value="3">Empresa</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="inputNome_Completo4" class="form-label">Nome Completo</label>
                    <input type="text" class="form-control" id="inputNome_Completo4">
                </div>
                <div class="col-md-4">
                    <label for="inputNome_Social4" class="form-label">Nome Social</label>
                    <input type="text" name="telefone" class="form-control" id="inputNome_Social4">
                </div>
                <div class="col-md-4">
                    <label for="inputData_Nascimento" class="form-label">Data de Nascimento</label>
                    <input type="date" name="Data_Nascimento" class="form-control" id="inputData_Nascimento">
                </div>
                <div class="col-md-6">
                    <label for="inputsenha" class="form-label">Senha</label>
                    <div class="input-group">
                        <input type="password" name="senha" class="form-control" id="inputsenha">
                        <button class="btn btn-outline-secondary" type="button" id="toggleSenha">
                            <i class="fa fa-eye-slash"></i>
                        </button>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="inputConfirmarSenha" class="form-label">Confirmar Senha</label>
                    <div class="input-group">
                        <input type="password" name="senha" class="form-control" id="inputConfirmarSenha">
                        <button class="btn btn-outline-secondary" type="button" id="toggleConfirmarSenha">
                            <i class="fa fa-eye-slash"></i>
                        </button>
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/rodape.php"; ?>