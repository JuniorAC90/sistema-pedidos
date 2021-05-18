<main class="container">
    <form class="formulario-clientes" method="post" action="/salvar-clientes">
        <fieldset class="formulario-clientes__campos">
            <legend class="legenda-clientes">Dados Pessoais:</legend>
            <fieldset class="secao-clientes__texto--input">
                <label class="formulario-clientes__texto" for="nome-cliente">Nome:</label>
                <div class="formulario-clientes__campos--input">
                    <input type="text" id="nome-cliente" name="nome-cliente">
                </div> 
            </fieldset>
            <fieldset class="secao-clientes__texto--input">    
                <label class="formulario-clientes__texto" for="sobrenome-cliente">Sobrenome:</label>
                <div>
                    <input type="text" id="sobrenome-cliente" name="sobrenome-cliente">
                </div>
            </fieldset>
            <fieldset class="secao-clientes__texto--input">
                <label class="formulario-clientes__texto" for="telefone-cliente">Telefone:</label>
                <div>
                    <input type="tel" id="telefone-cliente" name="telefone-cliente" placeholder="(00) 00000 - 0000" maxlength="14" pattern="\(\d{2}\)\s\d{5}-\d{4}" data-telefone>
                </div>
                
            </fieldset>
        </fieldset>
        <fieldset class="formulario-clientes__campos">
        <legend class="legenda-clientes">Dados de Endereço:</legend>
            <fieldset class="secao-clientes__texto--input"> 
                <label class="formulario-clientes__texto" for="cep-cliente">CEP:</label>
                <div>
                    <input type="text" id="cep-cliente" name="cep-cliente" placeholder="00.000-000" maxlength="10" pattern= "\d{2}.\d{3}-?\d{3}" data-campo-cep> <button data-botao-cep>Buscar CEP</button>
                </div>
            </fieldset>
            <fieldset class="secao-clientes__texto--input"> 
                <label class="formulario-clientes__texto" for="endereco-cliente">Endereço:</label>
                <div>
                    <input type="text" id="endereco-cliente" name="endereco-cliente" data-logradouro>
                </div>
            </fieldset>   
            <fieldset class="secao-clientes__texto--input"> 
                <label class="formulario-clientes__texto" for="numero-cliente">Número:</label>
                <div>
                    <input type="number" id="numero-cliente" name="numero-cliente" min="0">
                </div>
            </fieldset>
            <fieldset class="secao-clientes__texto--input"> 
                <label class="formulario-clientes__texto" for="bairro-cliente">Bairro:</label>
                <div>
                    <input type="text" id="bairro-cliente" name="bairro-cliente" data-bairro>
                </div>
            </fieldset>
            <fieldset class="secao-clientes__texto--input">
                <label class="formulario-clientes__texto" for="complemento-cliente">Complemento:</label>
                <div>
                    <input type="text" id="complemento-cliente" name="complemento-cliente" data-complemento>
                </div>
            </fieldset>
            
            
        </fieldset>
        <fieldset class="formulario-clientes__botoes">
            <input type="submit" value="Salvar">
            <input type="reset" value="Limpar">
        </fieldset>
    </form>
</main>