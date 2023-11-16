<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/EmpresaController.php"; 

    $empresaController = new EmpresaController();
    $empresaController->loginEmpresa(); 
?>

<main>
    <div class="container mt-3">
        <form action="/admin/empresas/login.php" method="post" class="estiloForm">
            <div>
                <label for="email_corporativo" class="form-label">E-mail Corporativo</label>
                <input type="email" name="email_corporativo" id="email_corporativo" class="form-control"></input>
            </div>
            <div>
                <label for="senha" class="form-label">Senha</label>
                <input type="password" name="senha" id="senha" class="form-control"></input>
            </div>
    
            <div class="botoes">
                <button type="submit" class="btn btn-primary">Confirmar</button>
                <a href="index.php" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</main>