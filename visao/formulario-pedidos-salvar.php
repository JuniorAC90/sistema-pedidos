<?php 
    $clientes = pegaClientes();
    $produtos = pegaProdutos();
?>

<main class="container">
    <section class="secao-pedidos">
        <div class="secao-pedidos__campos">
            <label class="secao-pedidos__texto">
                Cliente:<input list="lista-clientes" data-cliente>
                <datalist id="lista-clientes">
                    <?php 
                        for ($i = 0; $i < count($clientes); $i++) {
                            echo "<option value='{$clientes[$i]['telefone']}'>{$clientes[$i]['nome']}</option>";
                        }
                        
                    ?>
                </datalist>
                <button data-adiciona-cliente>Adicionar</button>
            </label>
            <select  data-cliente-json hidden>
                <?php 
                
                    for ($i = 0; $i < count($clientes); $i++) {
                        echo "<option value='{\"id\":\"{$clientes[$i]["id"]}\",\"nome\":\"{$clientes[$i]["nome"]}\", \"telefone\":\"{$clientes[$i]["telefone"]}\"}'>{$clientes[$i]["nome"]}</option>";
                    }
                ?>
            </select>
        </div>
        <div class="secao-pedidos__campos">
            <label class="secao-pedidos__texto">
                Produto:<input list="lista-produtos" data-produto>
                <datalist id="lista-produtos">
                    <?php 
                        for ($i = 0; $i < count($produtos); $i++) {
                            echo "<option value={$produtos[$i]['id']}>{$produtos[$i]['descricao']}</option>";
                        }
                        
                    ?>
                </datalist>
            </label>
            <label class="secao-pedidos__texto">
                
                Quantidade:<input type="number" id=quantidade-pedido name="quantidade-pedido" min="1" value="1" data-quantidade-pedido>
                <button data-adiciona-produto>Adicionar</button>
            </label>
            <select  data-produto-json hidden>
                <?php 
                
                    for ($i = 0; $i < count($produtos); $i++) {
                        echo "<option value='{\"id\":\"{$produtos[$i]["id"]}\",\"descricao\":\"{$produtos[$i]["descricao"]}\", \"preco\":\"{$produtos[$i]["preco"]}\"}'>{$produtos[$i]["nome"]}</option>";
                    }
                ?>
            </select>
            
        </div>
        <div class="formulario-pedidos__botoes">
            <button data-fechar-pedido>Fechar Pedido</button>
        </div>
    </section>
    <form class="formulario-pedidos" method="post" action="/salvar-pedidos">
        <fieldset class="formulario-pedidos__campos">
            <label class="formulario-pedidos__texto">
            <div id="cliente-pedido" name="cliente-pedido"></div>
                Cliente:<input type="text" id="cliente-pedido" name="cliente-pedido" data-cliente-pedido readonly>
                <input type="number" id="id-cliente" name="id-cliente" data-id-cliente hidden readonly>
            </label>
        </fieldset>
        <fieldset class="formulario-pedidos__campos" hidden>
            <label class="formulario-pedidos__texto">
                Produto: 
            </label>
            <select id="item" name="item[]" name multiple data-item-produto>

            </select>
            <label class="formulario-pedidos__texto">
                Quantidade:
            </label>
            <select id="quantidade" name="quantidade[]" multiple data-item-quantidade>

            </select>
            <label class="formulario-pedidos__texto">
                Preço:
            </label>
            <select id="preco" name="preco[]" multiple data-item-preco>

            </select>
            
        </fieldset>
        <fieldset class="formulario-pedidos__campos">
            <label class="formulario-pedidos__texto">
                Ítens:
            </label>
            <table class="tabela" data-tabela-pedido>
                <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Quantidade</th>
                        <th>Preço</th>
                    </tr>
                </thead>
                <tbody class="itens" data-itens-tabela>
                
                </tbody>
                    
            </table>
        </fieldset>
        <fieldset class="formulario-pedidos__campos">
            <label class="formulario-pedidos__texto">
                <input type="radio" id="pedido-dinheiro" name="pedido-pagamento" value="d" checked data-dinheiro>
                Dinheiro
            </label>
            <label class="formulario-pedidos__texto">
                <input type="radio" id="pedido-cartao" name="pedido-pagamento" value="c" data-cartao>
                Cartão
            </label>
            <label class="formulario-pedidos__texto">
                <input type="radio" id="pedido-transferencia" name="pedido-pagamento" value="t" data-transferencia>
                Transferência
            </label>
        </fieldset>
        <fieldset class="formulario-pedidos__campos">
            <label class="formulario-pedidos__texto">
                Total:<input type="number" id="total-pedido" name="total-pedido" value="0.00" data-total-pedido readonly>
            </label>
        </fieldset>
            
        <fieldset class="formulario-pedidos__botoes">
            <input type="submit" value="Confirmar" data-botao-pedido disabled>
            <button data-limpar-pedido>Limpar Pedido</button>
        </fieldset>
    </form>
</main>