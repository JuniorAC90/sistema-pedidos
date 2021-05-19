const botaoImprimir = document.querySelector('[data-botao-imprimir]')
const cabecalho = document.querySelector('[data-cabecalho]')
const links = document.querySelector('[data-links]')

if (botaoImprimir !== null) {
    botaoImprimir.addEventListener('click',(e) => {
        e.preventDefault()
        botaoImprimir.style.visibility = 'hidden'
        cabecalho.style.visibility = 'hidden'
        links.style.visibility = 'hidden'
        window.print();
        botaoImprimir.style.visibility = 'visible'
        cabecalho.style.visibility = 'visible'
        links.style.visibility = 'visible'
    })
}
