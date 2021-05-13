"use strict"
const campoPreco = document.querySelector('[data-preco]')

function mascaraPreco(valor) {
    campoPreco.value = Number(valor).toFixed(2)
}

if (campoPreco !== null) {
    campoPreco.addEventListener('keypress', (e) => mascaraPreco(e.target.value)) // Dispara quando digitado no campo
    campoPreco.addEventListener('change', (e) => mascaraPreco(e.target.value)) // Dispara quando autocompletado o campo
    campoPreco.addEventListener('keyup', (e) => mascaraPreco(e.target.value)) 
    
    mascaraPreco(campoPreco.value)
}
