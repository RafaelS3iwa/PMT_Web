<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/cabecalho.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/UsuarioController.php";
?>

    <main class="container mt-3 mb-3">
        <h1>Lista de Usuários
            <a href="cadastrar.php" class ="btn btn-primary float-end">Cadastrar</a>
        </h1>

        <button><a href="/admin/candidatos/cadastrar.php">Cadastrar</a></button>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome Completo</th>
                    <th>Nome Social</th>
                    <th>E-mail</th>
                    <th>Data de Nascimento</th>
                    <th style="width: 200px;">Ação</th>
                </tr>
            </thead>
            <tbody>

            <?php 
                $usuarioController = new UsuarioController(); 
                $usuarios = $usuarioController->listarUsuarios(); 
                
                foreach($usuarios as $user): 
            ?>
                <tr>
                    <td><?=$user->id_usuario?></td>
                    <td><?=$user->nome_completo?></td>
                    <td><?=$user->nome_social?></td>
                    <td><?=$user->data_nascimento?></td>
                    <td><?=$user->email?></td>
                    <td>
                            <!-- o ponto de interrogação significa URL ? Arquivo -->
                            <a href="editar.php?id_usuario=<?=$user->id_usuario?>" class="btn btn-primary btn-sm">Editar</a>
                            <a href="index.php?id_usuario=<?=$user->id_usuario ?>?&del" class="btn btn-danger btn-sm">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>

            </tbody>
        </table>
    
    </main>
    
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/rodape.php" ?>
