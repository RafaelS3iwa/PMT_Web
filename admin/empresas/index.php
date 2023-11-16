<?php   
    require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/cabecalhoUsuarios.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/EmpresaController.php";
?>

<main class="container mt-3 mb-3">
    <h1>Perfil da Empresa</h1>
        <form>
            <label for="id_empresa">ID do Usuário:</label>
            <input type="text" id="id_empresa" name="id_empresa" value="<?php echo $empresa['id_empresa']; ?>" readonly><br><br>

            <label for="email_corporativo">Email:</label>
            <input type="email" id="email_corporativo" name="email_corporativo" value="<?php echo $empresa['email_corporativo']; ?>" readonly><br><br>
        
            <label for="nome_empresa">Nome:</label>
            <input type="text" id="nome_empresa" name="nome_empresa" value="<?php echo $empresa['nome_empresa']; ?>" readonly><br><br>

            <label for="responsavel_legal">Nome Social:</label>
            <input type="text" id="responsavel_legal" name="responsavel_legal" value="<?php echo $empresa['responsavel_legal']; ?>" readonly><br><br>
        </form>
</main>
    
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/rodape.php" ?>
