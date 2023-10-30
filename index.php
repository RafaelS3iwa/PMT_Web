<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/cabecalho.php";
require_once $_SERVER["DOCUMENT_ROOT"] ."/controllers/UsuarioController.php";

$usuarioController = new UsuarioController();
$usuarioController->listarUsuarios(); 
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Banners</title>
  <link rel="stylesheet" type="text/css" href="/assets/css/styleHome.css">
  <link rel="stylesheet" type="text/css" href="/assets/css/styleHome2.css">
</head>

<body>
  <div class="banner bannerHome1">
    <div class="content">
      <h1>PMT</h1>
      <p>Encontre, Conquiste, Triunfe</p>
    </div>
  </div>

  <div class="banner bannerHome2">
    <div class="content">
      <h1 class="title-with-border">A Empresa</h1>
      <p>Texto do segundo banner. Você pode adicionar qualquer conteúdo aqui.</p>
    </div>
  </div>
</body>

</html>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/rodape.php";
?>