<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/cabecalhoCandidatos.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/AreaInteresseController.php";

$areaController = new AreaInteresseController();

$candidatoController->editarCandidato();
?>
<div id="editar-candidato" class="container">
    <h1 class="titulo-editar">Meu Perfil</h1>
    <form action="editar.php" method="post" enctype="multipart/form-data" class="blocoFormRoxo">
        <div class="form-group">
            <img src="<?= $candidato['foto'] ?>">
            <label for="foto"></label>
            <input type="file" name="foto" id="foto" class="form-control" accept="image/*">
        </div>
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
                            <input type="text" name="nome_completo" class="form-control" id="nome_completo" value="<?= $candidato['nome_completo'] ?>">
                        </div>

                        <div class="col">
                            <label for="nome_social" class="form-label">Nome Social: </label>
                            <input type="text" name="nome_social" class="form-control" id="nome_social" value="<?= $candidato['nome_social'] ?>">
                        </div>
                    </div>

                    <div class="form-editar">
                        <div class="col">
                            <label for="cpf" class="form-label">Cpf: </label>
                            <input type="text" name="cpf" class="form-control" id="cpf" value="<?= $candidato['cpf'] ?>">
                        </div>

                        <div class="col">
                            <label for="genero" class="form-label">Gênero: </label>
                            <input type="text" name="genero" class="form-control" id="genero" value="<?= $candidato['genero'] ?>">
                        </div>
                    </div>

                    <div class="form-editar">
                        <div class="col">
                            <label for="data_nascimento" class="form-label">Data de Nascimento: </label>
                            <input type="date" name="data_nascimento" class="form-control" id="data_nascimento" value="<?= $candidato['data_nascimento'] ?>">
                        </div>
                    </div>
                    <div class="form-editar">
                        <div class="col">
                            <label for="email" class="form-label">Email: </label>
                            <input type="email" name="email" class="form-control" id="email" value="<?= $candidato['email'] ?>">
                        </div>
                    </div>


                    <div class="form-editar">
                        <div class="col">
                            <label for="telefone" class="form-label">Telefone: </label>
                            <input type="text" name="telefone" class="form-control" id="telefone" value="<?= $candidato['telefone'] ?>">
                        </div>

                        <div class="col">
                            <label for="celular" class="form-label">Celular: </label>
                            <input type="text" name="celular" class="form-control" id="celular" value="<?= $candidato['celular'] ?>">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Endereço -->
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                        Endereço
                    </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">

                    <div class="form-editar">
                        <div class="col">
                            <label for="cep" class="form-label">CEP: </label>
                            <input type="text" name="cep" class="form-control" id="cep" value="<?= $candidato['cep'] ?>">
                        </div>
                    </div>

                    <div class="form-editar">
                        <div class="col">
                            <label for="logradouro" class="form-label">Logradouro: </label>
                            <input type="text" name="logradouro" class="form-control" id="logradouro" value="<?= $candidato['logradouro'] ?>">
                        </div>
                    </div>

                    <div class="form-editar">
                        <div class="col">
                            <label for="bairro" class="form-label">Bairro: </label>
                            <input type="text" name="bairro" class="form-control" id="bairro" value="<?= $candidato['bairro'] ?>">
                        </div>

                        <div class="col">
                            <label for="numero" class="form-label">Número: </label>
                            <input type="text" name="numero" class="form-control" id="numero" value="<?= $candidato['numero'] ?>">
                        </div>
                    </div>

                    <div class="form-editar">
                        <div class="col">
                            <label for="cidade" class="form-label">Cidade: </label>
                            <input type="text" name="cidade" class="form-control" id="cidade" value="<?= $candidato['cidade'] ?>">
                        </div>

                        <div class="col">
                            <label for="estado" class="form-label">Estado (UF): </label>
                            <input type="text" name="estado" class="form-control" id="estado" value="<?= $candidato['estado'] ?>">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Biografia -->
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                        Sua História:
                    </button>
                </h2>
                <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">

                    <div class="form-editar">
                        <div class="col">
                            <label for="biografia" class="form-label">Sua História: </label>
                            <input type="text" name="biografia" class="form-control" id="biografia" value="<?= $candidato['biografia'] ?>">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Experiencias -->
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                        Suas Experiências:
                    </button>
                </h2>
                <div id="flush-collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">

                    <div class="form-editar">
                        <div class="col">
                            <label for="experiencias" class="form-label">Experiências: </label>
                            <input type="text" name="experiencias" class="form-control" id="experiencias" value="<?= $candidato['experiencias'] ?>">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Conhecimentos -->
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                        Seus Conhecimentos:
                    </button>
                </h2>
                <div id="flush-collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">

                    <div class="form-editar">
                        <div class="col">
                            <label for="conhecimentos" class="form-label">Conhecimentos: </label>
                            <input type="text" name="conhecimentos" class="form-control" id="conhecimentos" value="<?= $candidato['conhecimentos'] ?>">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Informações Adicionais -->
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix">
                        Informações Adicionais:
                    </button>
                </h2>
                <div id="flush-collapseSix" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">

                    <div class="form-row">
                        <div class="form-group">
                            <label for="id_area_interesse">Principal Área de Atuação</label>
                            <select id="id_area_interesse" name="id_area_interesse">
                                <?php
                                    $id_area_interesse_atual = $candidato['id_area_interesse'];
                                    echo $areaController->listarAreas($id_area_interesse_atual);
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="id_area_interesse2">Segunda Área de Atuação (Opcional)</label>
                            <select id="id_area_interesse2" name="id_area_interesse2">
                            <?php
                                    $id_area_interesse_atual = $candidato['id_area_interesse2'];
                                    echo $areaController->listarAreas($id_area_interesse_atual);
                                ?>>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="id_area_interesse3">Terceira Área de Atuação (Opcional)</label>
                            <select id="id_area_interesse3" name="id_area_interesse3">
                            <?php
                                    $id_area_interesse_atual = $candidato['id_area_interesse3'];
                                    echo $areaController->listarAreas($id_area_interesse_atual);
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-editar">
                        <div class="col">
                            <label for="conhecimentos" class="form-label">Conhecimentos: </label>
                            <input type="text" name="conhecimentos" class="form-control" id="conhecimentos" value="<?= $candidato['conhecimentos'] ?>">
                        </div>
                    </div>
                    
                    <div class="form-editar">
                        <div class="col">
                            <label for="estado_civil" class="form-label">Estado Civil: </label>
                            <input type="text" name="estado_civil" class="form-control" id="estado_civil" value="<?= $candidato['estado_civil'] ?>">
                        </div>

                        <div class="col">
                            <label for="nacionalidade" class="form-label">Nacionalidade: </label>
                            <input type="text" name="nacionalidade" class="form-control" id="nacionalidade" value="<?= $candidato['nacionalidade'] ?>">
                        </div>
                    </div>

                    <div class="form-editar">
                        <div class="col">
                            <label for="escolaridade" class="form-label">Escolaridade: </label>
                            <input type="text" name="escolaridade" class="form-control" id="escolaridade" value="<?= $candidato['escolaridade'] ?>">
                        </div>
                    </div>
                </div>
            </div>

            <div class="opcoes-editar">
                <h4 class="pergunta-candidato">Gostaria de Cadastrar uma Nova Vaga?</h4>
                <button class="botao-link-cadastro"><a href="/admin/candidatos/cadastrar.php">Cadastrar</a></button>

            </div>
            <div class="botoes-editar">
                <button type="submit" class="botao-confirmar"><img src="/assets/img/icone_confirmar.png" height="45"></button>
                <a href="/admin/candidatos/index.php"><img src="/assets/img/icone_x.png" height="45"></a>
            </div>
            <div class="excluir-conta">
                <button class="botao-excluir-conta"><a href="#">Excluir Conta</a></button>
            </div>
        </div>
    </form>
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/rodape.php"; ?>