document.addEventListener("DOMContentLoaded", function() {
//Fazer aparecer opções em index.php
const botaoIndex = document.getElementById('botaoTopo');
const menu = document.getElementById('menuBotao');

botaoIndex.addEventListener("click" , function(){
    menu.classList.toggle('menuBotao-ativo');
})


//Troca do formulário de Cadastro
  var escolhaCadastro = document.getElementById('escolhaCadastro');
  if (escolhaCadastro) {
    escolhaCadastro.addEventListener("change", function(event) {
      if (event.target.id === "usuario") {
          document.getElementById("usuarioForm").style.display = "block";
          document.getElementById("empresaForm").style.display = "none";
      } else if (event.target.id === "empresa") {
          document.getElementById("usuarioForm").style.display = "none";
          document.getElementById("empresaForm").style.display = "block";
      }
    })
  }else{
    escolhaCadastro = null;
  };

//Troca do formulário de Login
  var escolhaLoginElement = document.getElementById("escolhaLogin");
  if (escolhaLoginElement) {
      escolhaLoginElement.addEventListener("change", function(event) {
          if (event.target.id === "usuario") {
              document.getElementById("usuarioFormulario").style.display = "block";
              document.getElementById("empresaFormulario").style.display = "none";
          } else if (event.target.id === "empresa") {
              document.getElementById("usuarioFormulario").style.display = "none";
              document.getElementById("empresaFormulario").style.display = "block";
          }
      });
  } else {
      escolhaLoginElement = null;
  }
//Troca de página do Cadastro de Candidato
const multiStepForm = document.getElementById("multiStepForm")
const formSteps = [...multiStepForm.querySelectorAll("[dado-step]")]

let currentStep = formSteps.findIndex(step => {
    return step.classList.contains("ativa")
})

console.log(currentStep)

multiStepForm.addEventListener("click", e=> {

    let incrementador;

    if (e.target.classList.contains("dadoSeguinte")) {
        incrementador = 1
    }else if(e.target.classList.contains("dadoAnterior")){
        incrementador = -1
    }

    if(incrementador === 0) return

    const inputs = [...formSteps[currentStep].querySelectorAll("input")];
    const validado = inputs.every(input => input.reportValidity());

    if ((e.target.classList.contains("dadoSeguinte") && validado) || e.target.classList.contains("dadoAnterior")) {
        currentStep += incrementador;

        if (currentStep >= formSteps.length) {
            currentStep = formSteps.length - 1;
            console.log(currentStep)
        } else if (currentStep < 0) {
            currentStep = 0;
            console.log(currentStep)

        }

        mostrarCurrentStep();
    }
});

function mostrarCurrentStep(){
    formSteps.forEach((step, index) => {
        step.classList.toggle("ativa", index === currentStep)
    })
}
});

//baixar tela como pdf
document.getElementById('downloadButton').addEventListener('click', () => {
    var element = document.body;
    html2pdf(element);
});