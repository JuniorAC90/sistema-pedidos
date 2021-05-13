"use strict"
const botaoAdicionaCliente = document.querySelector('[data-adiciona-cliente]')
const inputCliente = document.querySelector('[data-cliente]')

const clientePedido = document.querySelector('[data-cliente-pedido]')

const inputIdCliente = document.querySelector('[data-id-cliente]')

const selectClienteJson = document.querySelector('[data-cliente-json]')


function converteClienteJson(clienteJson) {
    let listaClienteJson = [];
    for (let i = 0; i < clienteJson.options.length; i++) {
        listaClienteJson.push(converteJson(clienteJson.options[i].value))
    }
    return listaClienteJson
}

function validaCliente(valorInputCliente) {
    const clientesJson = converteClienteJson(selectClienteJson)
    for (let i = 0; i < clientesJson.length; i++) {
        if (valorInputCliente == clientesJson[i].telefone) {
            return true
        }
    }
    
    return false
}

function pegaNomeCliente(valorInputCliente) {
    const clientesJson = converteClienteJson(selectClienteJson)
    let valida = validaCliente(valorInputCliente)
    
    if (valida) {
        for (let i = 0; i < clientesJson.length; i++) {
            if (valorInputCliente == clientesJson[i].telefone) {
                
                return clientesJson[i].nome
                
            }
        }
    }
    return false
}

function pegaIdCliente(valorInputCliente) {
    const clientesJson = converteClienteJson(selectClienteJson)
    let valida = validaCliente(valorInputCliente)
    
    if (valida) {
        for (let i = 0; i < clientesJson.length; i++) {
            if (valorInputCliente == clientesJson[i].telefone) {
                
                return clientesJson[i].id
                
            }
        }
    }
    return false
}


function adicionaCliente() { 
    let nomeCliente = pegaNomeCliente(inputCliente.value)
    let idCliente = pegaIdCliente(inputCliente.value)
    if (nomeCliente !== false) {
        clientePedido.value = nomeCliente
        inputIdCliente.value = idCliente
        inputCliente.value = ""
    } else {
        alert('Opção Inválida!')
    }

}

if (botaoAdicionaCliente !== null) {

    botaoAdicionaCliente.addEventListener('click', (e) => {
        e.preventDefault()
        adicionaCliente()
    })

}

