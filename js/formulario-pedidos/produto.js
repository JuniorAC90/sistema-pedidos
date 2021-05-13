"use strict"
const botaoAdicionaProduto = document.querySelector('[data-adiciona-produto]')
const inputProduto = document.querySelector('[data-produto]')
const inputQuantidade = document.querySelector('[data-quantidade-pedido]')

const produtoPedido = document.querySelector('[data-produto-pedido]')

const selectProdutoJson = document.querySelector('[data-produto-json]')

const selectItemProduto = document.querySelector('[data-item-produto]')
const selectItemQuantidade = document.querySelector('[data-item-quantidade]')
const selectItemPreco = document.querySelector('[data-item-preco]')

const inputTotal = document.querySelector('[data-total-pedido]')

const itensTabela = document.querySelector('[data-itens-tabela]')

const botaoLimparPedido = document.querySelector('[data-limpar-pedido]')




function atualizaTotal(valor) {
    inputTotal.value = parseFloat(parseFloat(inputTotal.value) + parseFloat(valor)).toFixed(2)
}

function converteProdutoJson(produtoJson) {
    let listaProdutoJson = [];
    for (let i = 0; i < produtoJson.options.length; i++) {
        listaProdutoJson.push(converteJson(produtoJson.options[i].value))
    }
    return listaProdutoJson
}

function validaProduto(valorInputProduto) {
    const produtosJson = converteProdutoJson(selectProdutoJson)
    for (let i = 0; i < produtosJson.length; i++) {
        alert(produtosJson[i].id)
        if (valorInputProduto == produtosJson[i].id) {
            return true
        }
    }
    
    return false
}

function pegaProduto(valorInputProduto) {
    const produtosJson = converteProdutoJson(selectProdutoJson)
    if (validaProduto) {
        for (let i = 0; i < produtosJson.length; i++) {
            if (valorInputProduto == produtosJson[i].id) {
                return produtosJson[i]
            }
        }
    }
    return false
}

function adicionaItemTabela(produto, quantidade) {
    let linhaProduto = document.createElement("tr")

    let dadoProduto = document.createElement("td")
    let dadoQuantidade = document.createElement("td")
    let dadoPreco = document.createElement("td")

    dadoProduto.innerHTML = produto.descricao
    dadoQuantidade.innerHTML = quantidade
    dadoPreco.innerHTML = produto.preco

    linhaProduto.appendChild(dadoProduto)
    linhaProduto.appendChild(dadoQuantidade)
    linhaProduto.appendChild(dadoPreco)

    itensTabela.appendChild(linhaProduto)
}

function adicionaItemPedido(produto, quantidade) {
    let optionItemProduto = document.createElement('option')
    optionItemProduto.value = produto.id
    optionItemProduto.innerHTML = produto.descricao
    optionItemProduto.selected = true
    selectItemProduto.appendChild(optionItemProduto)

    let optionItemQuantidade = document.createElement('option')
    optionItemQuantidade.value = quantidade 
    optionItemQuantidade.innerHTML = quantidade 
    optionItemQuantidade.selected = true 
    selectItemQuantidade.appendChild(optionItemQuantidade)

    let optionItemPreco = document.createElement('option')
    optionItemPreco.value = produto.preco
    optionItemPreco.innerHTML = produto.preco * quantidade
    optionItemPreco.selected = true
    selectItemPreco.appendChild(optionItemPreco)

    atualizaTotal(produto.preco)
    //inputTotal.value = Number(parseFloat(inputTotal.value) + parseFloat(produto.preco)).toFixed(2)

    inputProduto.value = ""
    inputQuantidade.value = 1

    adicionaItemTabela(produto, quantidade)
}

function adicionaProduto() { 
    let produto = pegaProduto(inputProduto.value)
    if (produto !== false) {
        produtoPedido.value = produto
    } else {
        alert('Opção Inválida!')
    }

}

function removeItem(evento, indice) {

    let valor = selectItemPreco.options[indice].value * -1
    
    atualizaTotal(valor)
    //inputTotal.value = parseFloat(parseFloat(inputTotal.value) - parseFloat(valor)).toFixed(2)

    selectItemProduto.options[indice].remove() 
    selectItemQuantidade.options[indice].remove() 
    selectItemPreco.options[indice].remove()

    evento.target.parentNode.remove()
}

function limparPedido() {
    clientePedido.value = ""
    selectItemProduto.length = 0
    selectItemQuantidade.length = 0
    selectItemPreco.length = 0

    itensTabela.innerHTML = ""
    inputTotal.value = parseFloat("0.00").toFixed(2)
}


if (botaoLimparPedido !== null) {
    botaoLimparPedido.addEventListener('click', (e) => {
        e.preventDefault()
        limparPedido()
    })
}


if (botaoAdicionaProduto !== null) {

    botaoAdicionaProduto.addEventListener('click', (e) => {
        e.preventDefault()
        let produto = pegaProduto(inputProduto.value)
        let quantidade = inputQuantidade.value
        if (produto !== false) {
            adicionaItemPedido(produto, quantidade)
        } else {
            alert('Opção Inválida!')
        }
    })

}

if (itensTabela !== null) {
    itensTabela.addEventListener('dblclick', (e) => {
        let indice = e.target.parentNode.rowIndex -1;
        removeItem(e, indice)
    })
} 