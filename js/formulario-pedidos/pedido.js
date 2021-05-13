"use strict"
const botaoFecharPedido = document.querySelector('[data-fechar-pedido]')
const botaoPedido = document.querySelector('[data-botao-pedido]') 

const inputDinheiro = document.querySelector('[data-dinheiro]')
const inputCartao = document.querySelector('[data-cartao]')
const inputTransferencia = document.querySelector('[data-transferencia]')

var taxa = false;


function checaPedido(cliente, produtos) {
    let checaCliente = false
    let checaProdutos = false
    console.log(cliente.value.length)
    if (cliente.value.length !== 0) {
        checaCliente = true
    } else {
        alert('Adicione o Cliente!')
    }
    if (produtos.length !== 0) {
        checaProdutos = true
    } else {
        alert('Adicione os Produtos!')
    }

    if (checaCliente && checaProdutos) {
        return true
    } else {
        return false
    }

    
}

if (botaoFecharPedido !== null) {
    botaoFecharPedido.addEventListener('click', () => {

        let acionaBotao = checaPedido(clientePedido, selectItemProduto)

        if (acionaBotao) {
            botaoPedido.disabled = false;
        }

    })
}

function verificaDinheiro(checkboxDinheiro) {
    let valor = 0.00
    if (checkboxDinheiro) {
        if (taxa) {
            valor = 2.00 * -1
            atualizaTotal(valor)
            taxa = false
        }   
    } 
}

function verificaCartao(checkboxCartao) {
    let valor = 0.00
    if (checkboxCartao) {
        taxa = true
        valor = 2.00
        atualizaTotal(valor)
    } 
}

function verificaTransferencia(checkboxTransferecia) {
    let valor = 0.00
    if (checkboxTransferecia) {
        if (taxa) {
            valor = 2.00 * -1
            atualizaTotal(valor)
            taxa = false
        }   
    } 
}

if (inputDinheiro !== null) {
    inputDinheiro.addEventListener('change', () => {
        verificaDinheiro(inputDinheiro.checked)
    })
}

if (inputCartao !== null) {
    inputCartao.addEventListener('change', () => {
        verificaCartao(inputCartao.checked)
    })
}

if (inputTransferencia !== null) {
    inputTransferencia.addEventListener('change', () => {
        verificaTransferencia(inputTransferencia.checked)
    })
}