<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/cabecalho.php";
?>
<div class="pagina-sobre">
    <h1 class="titulo-sobre">A Nossa História</h1>
    <img class="imagemSobre" src="/assets/img/imagem-grupo.jpg" height="500">
    <form class="blocoFormRoxo">
        <div class="guiaContainer">
            <p class="texto-guia">Em um mundo onde o tempo é o recurso mais valioso, muitos se dedicam a cursos e especializações na esperança de encontrar seu lugar no mercado de trabalho. Contudo, essa jornada enfrenta um desafio gigantesco: a tão temida falta de experiência..<br>Nossa história começa com aqueles que investiram seu tempo no conhecimento, ansiosos por uma chance. O <strong>PMT</strong> é a reviravolta que eles esperavam, uma oportunidade que transforma cada hora dedicada em cursos em um passo mais próximo do tão desejado emprego.</p>


            <h2 class="titulo-temas">Outros Temas que Possam te Interessar</h2>
            <div class="box-chamadas-sobre">
                <div class="box-chamadas-coluna">
                    <div class="box-time">
                        <h3>O Time</h3>
                        <div class="botao-roxo">
                            <a href="/paginaTime.php">Saiba Mais</a>
                        </div>
                    </div>
                </div>
                <div class="box-chamadas-coluna">
                    <div class="box-nossos-valores">
                        <h3>Nossos Valores</h3>
                        <div class="botao-roxo">
                            <a href="/paginaValores.php">Saiba Mais</a>
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