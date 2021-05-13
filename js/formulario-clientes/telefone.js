"use strict"
const campoTelefone = document.querySelector('[data-telefone]')

function mascaraTelefone(valor) {
    valor = valor.replace(/\D/g, "")
    valor = valor.replace(/^(\d{2})(\d)/g, "($1) $2")
    valor = valor.replace(/(\d{5})(\d{4})$/, "$1-$2")
    campoTelefone.value = valor
}
if(campoTelefone !== null) {
    campoTelefone.addEventListener('keypress', (e) => mascaraTelefone(e.target.value)) // Dispara quando digitado no campo
    campoTelefone.addEventListener('change', (e) => mascaraTelefone(e.target.value)) // Dispara quando autocompletado o campo
    campoTelefone.addEventListener('keyup', (e) => mascaraTelefone(e.target.value)) 

    mascaraTelefone(campoTelefone.value)
}


