<main class="container">
    <form class="formulario-clientes" method="post" action="/editar-clientes">
        <fieldset class="formulario-clientes__campos">
        <legend class="legenda-clientes">Identificador:</legend>
            <label class="formulario-clientes__texto">ID: <?= $cliente->pegaId()?> </label>
            <input type="hidden" id="id-produto" name="id-cliente" value="<?= $cliente->pegaId()?>">
        </fieldset>
        <fieldset class="formulario-clientes__campos">
        <legend class="legenda-clientes">Dados Pessoais:</legend>
            <label class="formulario-clientes__texto">Nome:<input type="text" id="nome-cliente" name="nome-cliente" value="<?= $cliente->pegaNome()?>"></label>
            <label class="formulario-clientes__texto">Sobrenome:<input type="text" id="sobrenome-cliente" name="sobrenome-cliente" value="<?= $cliente->pegaSobrenome()?>"></label>
            <label class="formulario-clientes__texto">Telefone:<input type="tel" id="telefone-cliente" name="telefone-cliente" placeholder="(00) 00000 - 0000" maxlength="14" pattern="\(\d{2}\)\s\d{5}-\d{4}" value="<?= $cliente->pegaTelefone()?>" data-telefone></label>
        </fieldset>
        <fieldset class="formulario-clientes__campos">
        <legend class="legenda-clientes">Dados de Endereço:</legend>
            <label class="formulario-clientes__texto">CEP:<input type="text" id="cep-cliente" name="cep-cliente" placeholder="00.000-000" maxlength="10" pattern= "\d{2}.\d{3}-?\d{3}" value="<?= $cliente->pegaCep()?>" data-campo-cep> <button data-botao-cep>Buscar CEP</button></label>
            <label class="formulario-clientes__texto">Endereço:<input type="text" id="endereco-cliente" name="endereco-cliente" value="<?= $cliente->pegaEndereco()?>" data-logradouro></label>
            <label class="formulario-clientes__texto">Número:<input type="number" id="numero-cliente" name="numero-cliente" min="0" value="<?= $cliente->pegaNumero()?>"></label>
            <label class="formulario-clientes__texto">Bairro:<input type="text" id="bairro-cliente" name="bairro-cliente" value="<?= $cliente->pegaBairro()?>" data-bairro></label>
            <label class="formulario-clientes__texto">Complemento:<input type="text" id="complemento-cliente" name="complemento-cliente" value="<?= $cliente->pegaComplemento()?>" data-complemento></label>
        </fieldset>
        <fieldset class="formulario-clientes__botoes">
            <input type="submit" value="Editar">
            <input type="reset" value="Limpar">
        </fieldset>
    </form>
</main>