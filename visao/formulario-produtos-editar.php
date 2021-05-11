<main class="container">
    <form class="formulario-produtos" method="post" action="/editar-produtos">
        <fieldset class="formulario-produtos__campos">
            <legend class="legenda-produtos">Identificador:</legend>
            <label class="formulario-produtos__texto">ID: <?=$produto->pegaId()?></label>
            <input type="hidden" id="id-produto" name="id-produto" value="<?=$produto->pegaId()?>">
        </fieldset>
        <fieldset class="formulario-produtos__campos">
        <legend class="legenda-produtos">Dados do Produto:</legend>
            <label class="formulario-produtos__texto">Descrição:<input type="text" id="descricao-produto" name="descricao-produto" value="<?=$produto->pegaDescricao()?>"></label>
            <label class="formulario-produtos__texto">Preço:<input type="number" id="preco-produto" name="preco-produto" min="0.00" step="0.01" value="<?=$produto->pegaPreco()?>"" data-preco></label>
        </fieldset>
        <fieldset class="formulario-produtos__botoes">
            <input type="submit" value="Editar">
            <input type="reset" value="Limpar">
        </fieldset>
    </form>
</main>