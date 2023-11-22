<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/cabecalho.php";
?>
<main>
  <div class="container" id="banner">
    <div id="textoSlogan">
      <h3>Encontre,</h3>
      <h2>Conquiste,</h2>
      <h1>Triunfe.</h1>
    </div>

    <div id="trofeu">
      <img src="/assets/img/trofeu.png" height="500">
    </div>
  </div>

  <div class="fundoRoxo">
    <div class="container">
      <h1>Informações</h1>
      <div id="carrossel">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          </div>
          <div class="carousel-inner">
            <!-- Primeiro Slide -->
            <div class="carousel-item active">
              <a href="/documentacao/guiaCandidatoCadastro.php">
                <img src="/assets/img/pixel4.jpg" class="d-block w-100" alt="...">
              </a>
              <div class="carousel-caption d-none d-md-block">
                <h5>Guia do Usuário para Usuários</h5>
                <p>Veja os primeiros passos aqui no PMT.</p>
              </div>
            </div>
            <!-- Segundo Slide -->
            <div class="carousel-item">
              <a href="/documentacao/guiaEmpresaCadastro.php">
                <img src="/assets/img/pixel.jpg" class="d-block w-100" alt="...">
              </a>
              <div class="carousel-caption d-none d-md-block">
                <h5>Guia do Usuário para Empresas</h5>
                <p>Veja os primeiros passos aqui no PMT.</p>
              </div>
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </div>
  </div>

  <section class="container">
    <h2 class="Sobre">Sobre</h2>
    <div id="box-chamadas">
      <div class="box-chamadas-index">
        <div class="box-nossa-historia">
          <h3>Nossa História</h3>
          <div class="botao-roxo">
            <a href="/paginaHistoria.php">Saiba Mais</a>
          </div>
        </div>
      </div>
      <div class="box-chamadas-index">
        <div class="box-time">
          <h3>O Time</h3>
          <div class="botao-roxo">
            <a href="/paginaTime.php">Saiba Mais</a>
          </div>
        </div>
        <div class="box-nossos-valores">
          <h3>Nossos Valores</h3>
          <div class="botao-roxo">
            <a href="/paginaValores.php">Saiba Mais</a>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/rodape.php";
?>