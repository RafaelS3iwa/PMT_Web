<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/cabecalho.php";
?>
<div class="pagina-sobre">
    <h1 class="titulo-sobre">Nossos Valores</h1>
    <img class="imagemSobre" src="/assets/img/imagem-maos.png" height="350">
    <form class="blocoFormRoxo">
        <div class="guiaContainer">
            <p class="texto-guia">
                No epicentro do PMT, a inovação é nossa bússola, guiando-nos a transformar aprendizado em conquistas palpáveis. Com empatia como nossa linguagem universal, colaboramos intensamente, vendo desafios como oportunidades de crescimento. A persistência é nosso mantra, e confiamos profundamente no potencial humano.

                Através do PMT, não apenas construímos um software; forjamos uma promessa de que, com as ferramentas certas, todos podem superar obstáculos e alcançar triunfos. Acreditamos no potencial humano e <strong>estamos aqui</strong> para te ajudar a superar seus problemas.</p>

            <h2 class="titulo-temas">Outros Temas que Possam te Interessar</h2>
            <div class="box-chamadas-sobre">

            <div class="box-chamadas-coluna">
                    <div class="box-nossa-historia">
                        <h3>Nossa História</h3>
                        <div class="botao-roxo">
                            <a href="/paginaHistoria.php">Saiba Mais</a>
                        </div>
                    </div>
                </div>

                <div class="box-chamadas-coluna">
                    <div class="box-time">
                        <h3>O Time</h3>
                        <div class="botao-roxo">
                            <a href="/paginaTime.php">Saiba Mais</a>
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