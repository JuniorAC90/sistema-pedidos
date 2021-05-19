const listaLinhasPedidos = document.querySelectorAll('[data-linha-pedido]')
const inputFiltroNomePedido = document.querySelector('[data-busca-pedidos]')
let selecaoDadoPedido = '[data-dados-nome-pedido]'


if (listaLinhasPedidos !== null && inputFiltroNomePedido !== null) {
    inputFiltroNomePedido.addEventListener('keypress', () => atualizaLinhas(listaLinhasPedidos, inputFiltroNomePedido, selecaoDadoPedido))
    inputFiltroNomePedido.addEventListener('change', () =>  atualizaLinhas(listaLinhasPedidos, inputFiltroNomePedido, selecaoDadoPedido))
    inputFiltroNomePedido.addEventListener('keyup', () =>  atualizaLinhas(listaLinhasPedidos, inputFiltroNomePedido, selecaoDadoPedido))
}
