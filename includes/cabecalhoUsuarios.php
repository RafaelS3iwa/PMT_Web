<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/UsuarioController.php";

    session_start();

    if (isset($_SESSION['id_usuario'])) {
        $id_usuario = $_SESSION['id_usuario'];
        $usuarioController = new UsuarioController(); 
        $usuario = $usuarioController->listarDadosUsuario($id_usuario);
        var_dump($usuario);
    }else {

    echo "Dados do usuário não encontrados na sessão.";
    }

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/style.css">
    <title>PMT</title>

</head>

<body>
    <div id="barra-topo">
        <header id="cabecalho" class="container">
            <div id="logo">
                <h1><a href="/admin/usuarios/index.php"><img src="/assets/img/Logo PMT true.png" alt="Logo PMT" height="90"></a></h1>
            </div>

            <div id="grupo-informacoes">
                <div class="nomeUsuario">
                    <label><?=$usuario['nome_completo']?></label>
                </div>
                <div class="principalAreaInteresse">
                    <label>Principal Área Interesse</label>
                </div>
            </div>

            <div id="botaoTopo">
                <img src="/assets/img/icone-usuario.png" height="60" class="botaoUsuario">
                <nav id="menuBotao">
                    <ul>
                        <li><a href="/admin/usuarios/editar.php">Editar</a></li>
                        <li><a href="/controllers/logout.php">Sair</a></li>
                    </ul>
                </nav>
            </div>
        </header>
    </div>