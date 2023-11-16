<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/UsuarioController.php"; 

    $usuarioController = new UsuarioController; 
    $usuarioController->loginUsuario(); 
?>

<main>
    <div class="container mt-3">
        <form action="/admin/usuarios/login.php" method="post" class="estiloForm">
                <div>
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" name="email" id="email" class="form-control"></input>
                </div>
            <div>
                <label for="senha" class="form-label">Senha</label>
                <input type="password" name="senha" id="senha" class="form-control"></input>
            </div>
            
            <div class="botoes">
                <button type="submit" class="btn btn-primary">Confirmar</button>
                <a href="login.php" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</main>