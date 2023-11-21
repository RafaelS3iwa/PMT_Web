<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/cabecalhoUsuarios.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/UsuarioController.php"; 

$usuarioController = new UsuarioController();
$usuarioController->editarUsuario();
?>

<main>
    <div class="container">
        <form action="editar.php" method="post" class="estiloForm">
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
                                    <input type="text" name="nome_completo" class="form-control" id="nome_completo" value="<?= $usuario['nome_completo'] ?>">
                                </div>

                                <div class="col">
                                    <label for="nome_social" class="form-label">Nome Social: </label>
                                    <input type="text" name="nome_social" class="form-control" id="nome_social" value="<?= $usuario['nome_social'] ?>">
                                </div>
                            </div>

                            <div class="col">
                                <label for="data_nascimento" class="form-label">Data de Nascimento: </label>
                                <input type="date" name="data_nascimento" class="form-control" id="data_nascimento" value="<?= $usuario['data_nascimento'] ?>">
                            </div>
                            
                            <div class="col">
                                <label for="email" class="form-label">Email: </label>
                                <input type="email" name="email" class="form-control" id="email" value="<?= $usuario['email'] ?>">
                            </div>

                            <div class="botoes-editar">
                                <button type="submit" class="botao-confirmar"><img src="/assets/img/icone_confirmar.png" height="45"></button>
                                <a href="/admin/usuarios/index.php"><img src="/assets/img/icone_x.png" height="45"></a>
                            </div>
                        </div>
                    </div>

                    <div class="opcoes-editar">
                        <h4 class="pergunta-candidato">Gostaria de se tornar candidato?</h4>
                        <button class="botao-link-cadastro"><a href="/admin/candidatos/cadastrar.php">Cadastrar</a></button>

                    </div>
                    <div class="excluir-conta">
                        <button class="botao-excluir-conta"><a href="#">Excluir Conta</a></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/rodape.php" ?>