<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/cabecalhoEmpresas.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/EmpresaController.php";

$empresaController = new EmpresaController();
$empresaController->editarEmpresa();
?>
<div id="editar-empresa" class="container">
    <h1 class="titulo-editar">Meu Perfil</h1>
    <form action="editar.php" method="post" enctype="multipart/form-data" class="blocoFormRoxo">
        <div class="form-group">
            <img src="<?=$empresa['logotipo']?>">
            <label for="logotipo"></label>
            <input type="file" name="logotipo" id="logotipo" class="form-control" accept="image/*">
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
                            <label for="nome_empresa" class="form-label">Nome da Empresa: </label>
                            <input type="text" name="nome_empresa" class="form-control" id="nome_empresa" value="<?= $empresa['nome_empresa'] ?>">
                        </div>

                        <div class="col">
                            <label for="responsavel_legal" class="form-label">Responsavel Legal: </label>
                            <input type="text" name="responsavel_legal" class="form-control" id="responsavel_legal" value="<?= $empresa['responsavel_legal'] ?>">
                        </div>
                    </div>

                    <div class="form-editar">
                        <div class="col">
                            <label for="cnpj" class="form-label">CNPJ: </label>
                            <input type="text" name="cnpj" class="form-control" id="cnpj" value="<?= $empresa['cnpj'] ?>">
                        </div>

                        <div class="col">
                            <label for="inscricao_estadual" class="form-label">Inscrição Estadual: </label>
                            <input type="text" name="inscricao_estadual" class="form-control" id="inscricao_estadual" value="<?= $empresa['inscricao_estadual'] ?>">
                        </div>
                    </div>

                    <div class="form-editar">
                        <div class="col">
                            <label for="data_abertura" class="form-label">Data de Abertura: </label>
                            <input type="date" name="data_abertura" class="form-control" id="data_abertura" value="<?= $empresa['data_abertura'] ?>">
                        </div>
                    </div>
                    <div class="form-editar">
                        <div class="col">
                            <label for="email_corporativo" class="form-label">Email: </label>
                            <input type="email" name="email_corporativo" class="form-control" id="email_corporativo" value="<?= $empresa['email_corporativo'] ?>">
                        </div>
                    </div>

                    
                    <div class="form-editar">
                        <div class="col">
                            <label for="telefone" class="form-label">Telefone: </label>
                            <input type="text" name="telefone" class="form-control" id="telefone" value="<?= $empresa['telefone'] ?>">
                        </div>

                        <div class="col">
                            <label for="celular" class="form-label">Celular: </label>
                            <input type="text" name="celular" class="form-control" id="celular" value="<?= $empresa['celular'] ?>">
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
                            <input type="text" name="cep" class="form-control" id="cep" value="<?= $empresa['cep'] ?>">
                        </div>
                    </div>

                    <div class="form-editar">
                        <div class="col">
                            <label for="logradouro" class="form-label">Logradouro: </label>
                            <input type="text" name="logradouro" class="form-control" id="logradouro" value="<?= $empresa['logradouro'] ?>">
                        </div>
                    </div>

                    <div class="form-editar">
                        <div class="col">
                            <label for="bairro" class="form-label">Bairro: </label>
                            <input type="text" name="bairro" class="form-control" id="bairro" value="<?= $empresa['bairro'] ?>">
                        </div>

                        <div class="col">
                            <label for="numero" class="form-label">Número: </label>
                            <input type="text" name="numero" class="form-control" id="numero" value="<?= $empresa['numero'] ?>">
                        </div>
                    </div>

                    <div class="form-editar">
                        <div class="col">
                            <label for="cidade" class="form-label">Cidade: </label>
                            <input type="text" name="cidade" class="form-control" id="cidade" value="<?= $empresa['cidade'] ?>">
                        </div>

                        <div class="col">
                            <label for="estado" class="form-label">Estado (UF): </label>
                            <input type="text" name="estado" class="form-control" id="estado" value="<?= $empresa['estado'] ?>">
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
                        <a href="/admin/empresas/index.php"><img src="/assets/img/icone_x.png" height="45"></a>
                    </div>
            <div class="excluir-conta">
                <button class="botao-excluir-conta"><a href="#">Excluir Conta</a></button>
            </div>
        </div>
    </form>
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/rodape.php" ?>