function atualizaLinhas(linhaTabela, inputValor, selecaoDado) {
    let dados = []
    for (let i = 0; i < linhaTabela.length; i++) {
        let linha = linhaTabela[i].querySelector(selecaoDado)
        dados.push(linha)
    }

    for (let i = 0; i < dados.length; i++) {
        valorDigitado = inputValor.value.trim()
        valorLinha = dados[i].textContent
        if (!valorLinha.includes(valorDigitado)) {
            dados[i].parentNode.classList.add('esconder')
        } else {
            dados[i].parentNode.classList.remove('esconder')
        }
        
    }
}