<main class="container">
    <form class="formulario-produtos" method="post" action="/salvar-produtos">
        <fieldset class="formulario-produtos__campos">
        <legend class="legenda-produtos">Dados do Produto:</legend>
            <label class="formulario-produtos__texto">Descrição:<input type="text" id="descricao-produto" name="descricao-produto"></label>
            <label class="formulario-produtos__texto">Preço:<input type="number" id="preco-produtos" name="preco-produtos" min="0.00" step="0.01" data-preco></label>
        </fieldset>
        <fieldset class="formulario-produtos__botoes">
            <input type="submit" value="Salvar">
            <input type="reset" value="Limpar">
        </fieldset>
    </form>
</main>