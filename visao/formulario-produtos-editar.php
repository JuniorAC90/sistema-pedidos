<main class="container">
    <form class="formulario-produtos" method="post" action="/editar-produtos">
        <fieldset class="formulario-produtos__campos">
            <legend class="legenda-produtos">Identificador:</legend>
            <label class="formulario-produtos__texto">ID: <?=$produto->pegaId()?></label>
            <input type="hidden" id="id-produto" name="id-produto" value="<?=$produto->pegaId()?>">
        </fieldset>
        <fieldset class="formulario-produtos__campos">
            <legend class="legenda-produtos">Dados do Produto:</legend>
            <fieldset>
                <label class="formulario-produtos__texto" for="descricao-produto">Descrição:</label>
                <div class="secao-pedidos__texto--input">
                    <input type="text" id="descricao-produto" name="descricao-produto" value="<?=$produto->pegaDescricao()?>" required>
                </div>
            </fieldset>
            <fieldset>
                <label class="formulario-produtos__texto" for="preco-produto">Preço:</label>
                <div class="secao-pedidos__texto--input">
                    <input type="number" id="preco-produto" name="preco-produto" min="0.00" step="0.01" value="<?=$produto->pegaPreco()?>" required data-preco>
                </div>
            </fieldset>
            
        </fieldset>
        <fieldset class="formulario-produtos__botoes">
            <input type="submit" value="Editar">
            <input type="reset" value="Limpar">
        </fieldset>
    </form>
</main>