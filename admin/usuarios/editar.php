<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/cabecalhoUsuarios.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/UsuarioController.php";

$usuarioController = new UsuarioController();
?>

<main>
    <div class="container">
        <h1 class="titulo-editar">Meu Perfil</h1>
        <div class="blocoFormRoxo">
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            Informações de Contato
                        </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <div class="form-editar">
                            <div class="col">
                                <label for="nome_completo" class="form-label">Nome Completo: </label>
                                <input type="text" class="form-control" id="nome_completo" placeholder="">
                            </div>

                            <div class="col">
                                <label for="inputEmail" class="form-label">Nome Social: </label>
                                <input type="email" class="form-control" id="inputEmail" placeholder="">
                            </div>
                        </div>

                        <div class="col">
                            <label for="inputTelefone" class="form-label">Email: </label>
                            <input type="tel" class="form-control" id="inputTelefone" placeholder="Digite seu telefone">
                        </div>

                        <div class="botoes-editar">
                            <button type="submit" class="botao-confirmar"><img src="/assets/img/icone_confirmar.png" height="45"></button>
                            <a href="/admin/usuarios/index.php"><img src="/assets/img/icone_x.png" height="45"></a>
                        </div>
                    </div>
                </div>

                <div class="opcoes-editar">
                    <h4>Gostaria de se tornar candidato?</h4>
                    <button><a href="/admin/candidatos/cadastrar.php">Cadastrar</a></button>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/rodape.php" ?>