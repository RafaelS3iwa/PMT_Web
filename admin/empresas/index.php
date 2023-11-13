<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/cabecalho.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/EmpresaController.php";
    include_once $_SERVER['DOCUMENT_ROOT'] . "/includes/alerta.php";
?>

    <main class="container mt-3 mb-3">
        <h1>Lista de Empresas
            <a href="cadastrar.php" class ="btn btn-primary float-end">Cadastrar</a>
        </h1>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome da Empresa</th>
                    <th>CNPJ</th>
                    <th>Data de Abertura</th>
                    <th>Responsável Legal</th>
                    <th>E-mail</th>
                    <th style="width: 200px;">Ação</th>
                </tr>
            </thead>
            <tbody>

            <?php 
                $empresaController = new EmpresaController();
                $empresas = $empresaController->listarEmpresas();

                foreach($empresas as $empresa): 
            ?>
                <tr>
                    <td><?=$empresa->id_empresa?></td>
                    <td><?=$empresa->nome_empresa?></td>
                    <td><?=$empresa->cnpj?></td>
                    <td><?=$empresa->data_abertura?></td>
                    <td><?=$empresa->responsavel_legal?></td>
                    <td><?=$empresa->email_corporativo?></td>
                    <td>
                            <!-- o ponto de interrogação significa URL ? Arquivo -->
                            <a href="editar.php?id_empresa=<?=$empresa->id_empresa?>" class="btn btn-primary btn-sm">Editar</a>
                            <a href="index.php?id_empresa=<?=$empresa->id_empresa ?>?&del" class="btn btn-danger btn-sm">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>

            </tbody>
        </table>
    
    </main>
    
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/rodape.php" ?>
