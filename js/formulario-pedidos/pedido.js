"use strict"
const botaoFecharPedido = document.querySelector('[data-fechar-pedido]')
const botaoPedido = document.querySelector('[data-botao-pedido]') 


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