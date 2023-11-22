<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/cabecalho.php";
?>
<div class="pagina-sobre">
    <h1 class="titulo-sobre">A Equipe PMT</h1>
    <img class="imagemSobre" src="/assets/img/time-pmt.jpg" height="350">
    <form class="blocoFormRoxo">
        <div class="guiaContainer">
            <p class="texto-guia">Conheça a equipe que transforma sonhos em realidade, dedicada a uma missão épica: abrir as portas do mercado de trabalho para jovens ansiosos por conquistar seu tão sonhado estágio.<br>Rafael, Miguel e Aarão, somos um trio que temos como missão, não apenas criar um software, mas construir um portal para o futuro, onde jovens talentos podem encontrar, conquistar e triunfar em seus estágios dos sonhos.<br>A equipe PMT avança, levando consigo o lema que impulsiona cada linha de código, cada decisão tomada:<br><strong class="slogan">"Encontre, Conquiste, Triunfe."</strong></p>


            <h2 class="titulo-temas">Outros Temas que Possam te Interessar</h2>
            <div class="box-chamadas-sobre">
                <div class="box-chamadas-coluna">
                    <div class="box-nossos-valores">
                        <h3>Nossos Valores</h3>
                        <div class="botao-roxo">
                            <a href="/paginaValores.php">Saiba Mais</a>
                        </div>
                    </div>
                </div>
            <div class="box-chamadas-coluna">
                <div class="box-nossa-historia">
                    <h3>Nossa História</h3>
                    <div class="botao-roxo">
                        <a href="/paginaHistoria.php">Saiba Mais</a>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </form>
    <button id="downloadButton">Baixar como PDF</button>
</div>
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/rodape.php";
?>