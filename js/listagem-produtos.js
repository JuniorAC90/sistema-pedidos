const listaLinhasProdutos = document.querySelectorAll('[data-linha-produto]')
const inputFiltroDescricaoProduto = document.querySelector('[data-busca-produtos]')
let selecaoDadoProduto = '[data-dados-descricao-produto]'

if (listaLinhasProdutos !== null && inputFiltroDescricaoProduto !== null) {
    inputFiltroDescricaoProduto.addEventListener('keypress', () => atualizaLinhas(listaLinhasProdutos, inputFiltroDescricaoProduto, selecaoDadoProduto))
    inputFiltroDescricaoProduto.addEventListener('change', () =>  atualizaLinhas(listaLinhasProdutos, inputFiltroDescricaoProduto, selecaoDadoProduto))
    inputFiltroDescricaoProduto.addEventListener('keyup', () =>  atualizaLinhas(listaLinhasProdutos, inputFiltroDescricaoProduto, selecaoDadoProduto))
}
