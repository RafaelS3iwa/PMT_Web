<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/cabecalho.php"; 
    require_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/UsuarioController.php"; 
    include_once $_SERVER['DOCUMENT_ROOT'] . "/includes/alerta.php";

    $usuarioController = new UsuarioController; 
    $usuarioController->loginUsuario(); 
?>

<main class="container mt-3 mb-3" >
    <h1>Login Usuário</h1>
    <form action="login.php" method="post">
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']?></p>
        <?php } ?>
        <div>
            <label for="email" class="form-label">E-mail</label>
            <input type="email" name="email" id="email" class="form-control"></input>
        </div>
        <div>
            <label for="senha" class="form-label">Senha</label>
            <input type="password" name="senha" id="senha" class="form-control"></input>
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Confirmar</button>
            <a href="index.php" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/rodape.php"; ?>
