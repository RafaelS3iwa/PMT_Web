<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/cabecalho.php"; ?>

<div id="escolhaCadastro">
    <form action="index.php" method="post">
        <input type="radio" name="formType" value="usuario" id="usuario">
        <label for="usuario">Cadastro de Usuário</label>

        <input type="radio" name="formType" value="empresa" id="empresa">
        <label for="empresa">Cadastro de Empresa</label>
    </form>
</div>

<script>
document.querySelector("form").addEventListener("click", function(event) {
    if (event.target.id === "usuario") {
        fetch('usuarios/cadastrar.php?formType=usuario')
            .then(response => response.text())
            .then(data => {
                document.getElementById("mainContent").innerHTML = data;
            });
    } else if (event.target.id === "empresa") {
        fetch('empresas/cadastrar.php?formType=empresa')
            .then(response => response.text())
            .then(data => {
                document.getElementById("mainContent").innerHTML = data;
            });
    }
});
</script>

<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/rodape.php";
?>