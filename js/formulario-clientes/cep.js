const botaoCep = document.querySelector('[data-botao-cep]')
const campoCep = document.querySelector('[data-campo-cep]')

const campoLogradouro = document.querySelector('[data-logradouro]')
const campoBairro = document.querySelector('[data-bairro]')
const campoComplemento = document.querySelector('[data-complemento]')

function mascaraCep(valor) {
    valor = valor.replace(/\D/g, "")
    valor = valor.replace(/^(\d{2})(\d)/g, "$1.$2")
    valor = valor.replace(/(\d{3})(\d{3})$/, "$1-$2")
    campoCep.value = valor
}

function preencheCampos(json) {
    document.querySelector('[data-logradouro]').value = json.logradouro
    document.querySelector('[data-bairro]').value = json.bairro
    document.querySelector('[data-complemento]').value = json.complemento
}

function buscaCep(valor) {
    let digitosCep = valor.replace(/\D/g, '')
    if (campoCep != '' && digitosCep.length == 8) {
        let xhr = new XMLHttpRequest();
        let url = `https://viacep.com.br/ws/${digitosCep}/json/`

        xhr.open('GET', url, true)
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4) {
                if (xhr.status == 200) {
                    preencheCampos(JSON.parse(xhr.responseText))
                }
            }
        }
        xhr.send()
    } else {
        alert('Valor inválido')
    }
}

campoCep.addEventListener('keypress', (e) => mascaraCep(e.target.value))
campoCep.addEventListener('change', (e) => mascaraCep(e.target.value))
campoCep.addEventListener('keyup', (e) => mascaraCep(e.target.value))

botaoCep.addEventListener("click", function(event) {
    event.preventDefault()
    buscaCep(campoCep.value)
})

mascaraCep(campoCep.value)

