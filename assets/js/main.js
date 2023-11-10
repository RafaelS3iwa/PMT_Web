//Troca do formulário de Cadastro
document.getElementById('escolhaCadastro').addEventListener("change", function(event) {
    if (event.target.id === "usuario") {
        document.getElementById("usuarioForm").style.display = "block";
        document.getElementById("empresaForm").style.display = "none";
    } else if (event.target.id === "empresa") {
        document.getElementById("usuarioForm").style.display = "none";
        document.getElementById("empresaForm").style.display = "block";
    }
});

//Troca do formulário de Login
document.getElementById("escolhaLogin").addEventListener("change", function(event) {
    if (event.target.id === "usuario") {
        document.getElementById("usuarioForm").style.display = "block";
        document.getElementById("empresaForm").style.display = "none";
    } else if (event.target.id === "empresa") {
        document.getElementById("usuarioForm").style.display = "none";
        document.getElementById("empresaForm").style.display = "block";
    }
});

