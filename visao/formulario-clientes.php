<main class="container">
    <form class="formulario-clientes" method="post" action="/salvar-clientes">
        <fieldset class="formulario-clientes__campos">
        <legend class="legenda-clientes">Dados Pessoais:</legend>
            <label class="formulario-clientes__texto">Nome:<input type="text" id="nome-cliente" name="nome-cliente"></label>
            <label class="formulario-clientes__texto">Sobrenome:<input type="text" id="sobrenome-cliente" name="sobrenome-cliente"></label>
            <label class="formulario-clientes__texto">Telefone:<input type="tel" id="telefone-cliente" name="telefone-cliente" placeholder="(00) 00000 - 0000" maxlength="14" pattern="\(\d{2}\)\s\d{5}-\d{4}" data-telefone></label>
        </fieldset>
        <fieldset class="formulario-clientes__campos">
        <legend class="legenda-clientes">Dados de Endereço:</legend>
            <label class="formulario-clientes__texto">CEP:<input type="text" id="cep-cliente" name="cep-cliente" placeholder="00.000-000" maxlength="10" pattern= "\d{2}.\d{3}-?\d{3}" data-campo-cep> <button data-botao-cep>Buscar CEP</button></label>
            <label class="formulario-clientes__texto">Endereço:<input type="text" id="endereco-cliente" name="endereco-cliente" data-logradouro></label>
            <label class="formulario-clientes__texto">Número:<input type="number" id="numero-cliente" name="numero-cliente" min="0"></label>
            <label class="formulario-clientes__texto">Bairro:<input type="text" id="bairro-cliente" name="bairro-cliente" data-bairro></label>
            <label class="formulario-clientes__texto">Complemento:<input type="text" id="complemento-cliente" name="complemento-cliente" data-complemento></label>
        </fieldset>
        <fieldset class="formulario-clientes__botoes">
            <input type="submit" value="Salvar">
            <input type="reset" value="Limpar">
        </fieldset>
    </form>
</main>