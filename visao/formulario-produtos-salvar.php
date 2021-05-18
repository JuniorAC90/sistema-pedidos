<main class="container">
    <form class="formulario-produtos" method="post" action="/salvar-produtos">
        <fieldset class="formulario-produtos__campos">
            <legend class="legenda-produtos">Dados do Produto:</legend>
                <fieldset>
                    <label class="formulario-produtos__texto" for="descricao-produto">Descrição:</label>
                    <div class="secao-pedidos__texto--input">
                        <input type="text" id="descricao-produto" name="descricao-produto">
                    </div>    
                </fieldset>
                <fieldset>
                    <label class="formulario-produtos__texto" for="preco-produtos">Preço:</label>
                    <div class="secao-pedidos__texto--input">
                        <input type="number" id="preco-produtos" name="preco-produtos" min="0.00" step="0.01" data-preco>
                    </div>
                </fieldset>
                    
        </fieldset>
        <fieldset class="formulario-produtos__botoes">
            <input type="submit" value="Salvar">
            <input type="reset" value="Limpar">
        </fieldset>
    </form>
</main>