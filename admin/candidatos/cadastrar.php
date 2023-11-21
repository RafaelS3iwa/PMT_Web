<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/cabecalhoUsuarios.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/CandidatoController.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/AreaInteresseController.php";

$areaController = new AreaInteresseController();

$candidatoController = new CandidatoController();
$candidatoController->cadastrarCandidato(); 
?>
<script src="/assets/js/main.js"></script>
<main>
  <div class="blocoCentralizado">
    <form class="blocoFormRoxo" id="multiStepForm" action="cadastrar.php" method="post" enctype="multipart/form-data">

      <!-- Foto de Perfil  -->
      <div class="etapa ativa" dado-step="1">
        <h3 class="titulo-etap">Gostaria de adicionar uma foto ao seu perfil?</h3>
        <h4 class="subtitulo-etapa">Próxima Etapa: Dados de Contato</h4>
        <div class="form-group">
          <label for="foto">Selecione uma Foto:</label>
          <input type="file" name="foto" id="foto" class="form-control" accept="image/*">
        </div>
        <button type="button" class="dadoSeguinte">Próximo</button>
      </div>

      <!-- Dados de Contato -->
      <div class="etapa" dado-step="2">
        <h3 class="titulo-etapa">Dados de Contato</h3>
        <h4 class="subtitulo-etapa">Próxima Etapa: Endereço</h4>
        <div class="form-group">
          <label for="genero">Qual o seu Gênero?</label>
          <input type="text" name="genero" id="genero">
        </div>
        <div class="form-group">
          <label for="cpf">Qual seu CPF?</label>
          <input type="text" name="cpf" id="cpf" required>
        </div>
        <div class="form-group">
          <label for="telefone">Qual seu Telefone?</label>
          <input type="text" name="telefone" id="telefone">
        </div>
        <div class="form-group">
          <label for="celular">E o Celular?</label>
          <input type="text" name="celular" id="celular" required>
        </div>
        <button type="button" class="dadoAnterior">Retroceder</button>
        <button type="button" class="dadoSeguinte">Próximo</button>
      </div>

      <!-- Endereço -->
      <div class="etapa" dado-step="3">
        <h3 class="titulo-etapa">Endereço</h3>
        <h4 class="subtitulo-etapa">Próxima Etapa: Sua Biografia</h4>
        <div class="form-group">
          <label for="cep">Qual o seu CEP?</label>
          <input type="text" name="cep" id="cep" required>
        </div>
        <div class="form-group">
          <label for="logradouro">Informe o seu Logradouro</label>
          <input type="text" name="logradouro" id="logradouro" required>
        </div>
        <div class="form-group">
          <label for="numero">Qual o Número da sua residência?</label>
          <input type="text" name="numero" id="numero" required>
        </div>
        <div class="form-group">
          <label for="bairro">Qual o seu Bairro?</label>
          <input type="text" name="bairro" id="bairro" required>
        </div>
        <div class="form-group">
          <label for="cidade">Sua Cidade</label>
          <input type="text" name="cidade" id="cidade" required>
        </div>
        <div class="form-group">
          <label for="estado">Por fim, seu Estado</label>
          <input type="text" name="estado" id="estado" required>
        </div>
        <button type="button" class="dadoAnterior">Retroceder</button>
        <button type="button" class="dadoSeguinte">Próximo</button>
      </div>

      <!-- Biografia -->
      <div class="etapa" dado-step="4">
        <h3 class="titulo-etapa">Quer contar um pouco de sua História?</h3>
        <h4 class="subtitulo-etapa">Próxima Etapa: Suas Experiências</h4>
        <div class="form-group">
          <label for="biografia">Sua Biografia:</label>
          <input type="text" name="biografia" id="biografia">
        </div>
        <button type="button" class="dadoAnterior">Retroceder</button>
        <button type="button" class="dadoSeguinte">Próximo</button>
      </div>

      <!-- Experiências -->
      <div class="etapa" dado-step="5">
        <h3 class="titulo-etapa">Você possui alguma experiência no mercado de trabalho?</h3>
        <h4 class="subtitulo-etapa">Próxima Etapa: Seus Conhecimentos</h4>
        <div class="form-group">
          <label for="experiencias">Suas Experiências:</label>
          <input type="text" name="experiencias" id="experiencias">
        </div>
        <button type="button" class="dadoAnterior">Retroceder</button>
        <button type="button" class="dadoSeguinte">Próximo</button>
      </div>

      <!-- Conhecimentos -->
      <div class="etapa" dado-step="6">
        <h3 class="titulo-etapa">E sobre seus Conhecimentos?</h3>
        <h4 class="subtitulo-etapa">Próxima Etapa: Últimas Informações</h4>
        <div class="form-group">
          <label for="conhecimentos">Conhecimentos: </label>
          <input type="text" name="conhecimentos" id="conhecimentos">
        </div>
        <button type="button" class="dadoAnterior">Retroceder</button>
        <button type="button" class="dadoSeguinte">Próximo</button>
      </div>

      <!-- Últimas Informações -->
      <div class="etapa" dado-step="7">
        <h3 class="titulo-etapa">Nos conte agora sobre:</h3>
        <h4 class="subtitulo-etapa">Última parte do Cadastro!</h4>
        <div class="select-container">
          <div class="select-group">
            <label for="id_area_interesse">Escolha sua principal Área de Interesse:</label>
            <select id="id_area_interesse" name="id_area_interesse">
              <option value="" disabled selected>Selecione uma área</option>
              <?php echo $areaController->listarAreas(); ?>
            </select>
          </div>

          <div class="select-group">
            <label for="id_area_interesse2">Aqui sua Segunda Área de Interesse:</label>
            <select id="id_area_interesse2" name="id_area_interesse2">
              <option value="" disabled selected>Selecione uma área</option>
              <?php echo $areaController->listarAreas(); ?>
            </select>
          </div>

          <div class="select-group">
            <label for="id_area_interesse3">Sua última Área de Interesse:</label>
            <select id="id_area_interesse3" name="id_area_interesse3">
              <option value="" disabled selected>Selecione uma área</option>
              <?php echo $areaController->listarAreas(); ?>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label for="estado_civil">Qual o seu Estado Civil?</label>
          <input type="text" name="estado_civil" id="estado_civil" required>
        </div>
        <div class="form-group">
          <label for="nacionalidade">Qual a sua Nacionalidade?</label>
          <input type="text" name="nacionalidade" id="nacionalidade" required>
        </div>
        <div class="form-group">
          <label for="escolaridade">Por fim, nos diga sua Escolaridade</label>
          <input type="text" name="escolaridade" id="escolaridade" required>
        </div>
        <button type="button" class="dadoAnterior">Retroceder</button>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
      </div>
    </form>
  </div>
</main>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/rodape.php"; ?>