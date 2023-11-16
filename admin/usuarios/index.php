<?php   
    require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/cabecalhoUsuarios.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/UsuarioController.php";
?>

<main class="container mt-3 mb-3">
    <h1>Perfil do Usuário</h1>
        <form>
            <label for="id_usuario">ID do Usuário:</label>
            <input type="text" id="id_usuario" name="id_usuario" value="<?php echo $usuario['id_usuario']; ?>" readonly><br><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $usuario['email']; ?>" readonly><br><br>
        
            <label for="nome_completo">Nome:</label>
            <input type="text" id="nome_completo" name="nome_completo" value="<?php echo $usuario['nome_completo']; ?>" readonly><br><br>

            <label for="nome_social">Nome Social:</label>
            <input type="text" id="nome_social" name="nome_social" value="<?php echo $usuario['nome_social']; ?>" readonly><br><br>
        </form>
</main>
    
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/rodape.php" ?>
