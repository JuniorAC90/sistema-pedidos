const listaLinhasClientes = document.querySelectorAll('[data-linha-cliente]')
const inputFiltroNomeCliente = document.querySelector('[data-busca-clientes]')
let selecaoDadoCliente = '[data-dados-nome-cliente]'


if (listaLinhasClientes !== null && inputFiltroNomeCliente !== null) {
    inputFiltroNomeCliente.addEventListener('keypress', () => atualizaLinhas(listaLinhasClientes, inputFiltroNomeCliente, selecaoDadoCliente))
    inputFiltroNomeCliente.addEventListener('change', () =>  atualizaLinhas(listaLinhasClientes, inputFiltroNomeCliente, selecaoDadoCliente))
    inputFiltroNomeCliente.addEventListener('keyup', () =>  atualizaLinhas(listaLinhasClientes, inputFiltroNomeCliente, selecaoDadoCliente))
}
