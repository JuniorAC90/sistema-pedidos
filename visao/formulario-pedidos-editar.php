<?php 
    $clientes = pegaClientes();
    $produtos = pegaProdutos();
    echo "<pre>";
    //print_r($pedido->pegaItens()[0]);
    //echo $pedido->pegaItens();
    echo "</pre>";

    $cliente = pegaUmCliente($pedido->pegaClienteId());
    $itens = $pedido->pegaItens();
?>

<main class="container">
<section class="secao-pedidos">
        <div class="secao-pedidos__campos">
            <fieldset>
                <label class="secao-pedidos__texto" for="lista-clientes">
                    Cliente:
                </label>
                <div class="secao-pedidos__texto--input">
                    <input list="lista-clientes" data-cliente>
                    <datalist id="lista-clientes">
                        <?php 
                            for ($i = 0; $i < count($clientes); $i++) {
                                echo "<option value='{$clientes[$i]->pegaTelefone()}'>{$clientes[$i]->pegaNome()}</option>";
                            }
                            
                        ?>
                    </datalist>
                    <button data-adiciona-cliente>Adicionar</button>
                </div>
            </fieldset>
            <select  data-cliente-json hidden>
                <?php 
                
                    for ($i = 0; $i < count($clientes); $i++) {
                        echo "<option value='{\"id\":\"{$clientes[$i]->pegaId()}\",\"nome\":\"{$clientes[$i]->pegaNome()}\", \"telefone\":\"{$clientes[$i]->pegaTelefone()}\"}'>{$clientes[$i]->pegaNome()}</option>";
                    }
                ?>
            </select>
        </div>
        <div class="secao-pedidos__campos--produto">
            <fieldset>
                <label class="secao-pedidos__texto" for="lista-produtos">
                    Produto:
                </label>
                <div class="secao-pedidos__texto--input">
                    <input list="lista-produtos" data-produto>
                    <datalist id="lista-produtos">
                        <?php 
                            for ($i = 0; $i < count($produtos); $i++) {
                                echo "<option value={$produtos[$i]->pegaId()}>{$produtos[$i]->pegaDescricao()}</option>";
                            }
                            
                        ?>
                    </datalist>
                </div>
            </fieldset>
            <fieldset>
                <label class="secao-pedidos__texto" for="quantidade-pedido">
                    Quantidade:
                </label>
                <div class="secao-pedidos__texto--input">
                    <input type="number" id=quantidade-pedido name="quantidade-pedido" min="1" value="1" data-quantidade-pedido>
                    <button data-adiciona-produto>Adicionar</button>
                </div>
            </fieldset>
            <select  data-produto-json hidden>
                <?php 
                
                    for ($i = 0; $i < count($produtos); $i++) {
                        echo "<option value='{\"id\":\"{$produtos[$i]->pegaId()}\",\"descricao\":\"{$produtos[$i]->pegaDescricao()}\", \"preco\":\"{$produtos[$i]->pegaPreco()}\"}'>{$produtos[$i]->pegaDescricao()}</option>";
                    }
                ?>
            </select>
            
        </div>
        <div class="formulario-pedidos__botoes">
            <button data-fechar-pedido>Fechar Pedido</button>
        </div>
    </section>
    <form class="formulario-pedidos" method="post" action="/editar-pedidos">
        <fieldset class="formulario-pedidos__campos">
            <label class="formulario-pedidos__texto">
                <input type="number" id="id-pedido" name="id-pedido" value="<?= $pedido->pegaId();?>" data-id-pedido  hidden readonly>
                Cliente: <span class="nome-cliente" data-cliente-pedido><?= $cliente->pegaNome();?></span>
                <input type="number" id="id-cliente" name="id-cliente" value="<?= $pedido->pegaClienteId();?>" data-id-cliente  hidden readonly>
            </label>
        </fieldset>
        <fieldset hidden>
            
            <select id="item" name="item[]" name multiple data-item-produto>
                <?php
                    for ($i = 0; $i < count($itens); $i++) {
                        echo "<option value={$itens[$i]->pegaProdutoId()} selected>{$itens[$i]->pegaProdutoId()}</option>";
                    } 
                ?>
            </select>
           
            <select id="quantidade" name="quantidade[]" multiple data-item-quantidade>
                <?php
                    for ($i = 0; $i < count($itens); $i++) {
                        echo "<option value={$itens[$i]->pegaQuantidade()} selected>{$itens[$i]->pegaQuantidade()}</option>";
                    } 
                ?>
            </select>

            <select id="preco" name="preco[]" multiple data-item-preco>
                <?php
                    for ($i = 0; $i < count($itens); $i++) {
                        echo "<option value={$itens[$i]->pegaPreco()} selected>{$itens[$i]->pegaPreco()}</option>";
                    } 
                ?>
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
                    <?php
                        for ($i = 0; $i < count($itens); $i++) {
                            $produto = pegaUmProduto($itens[$i]->pegaProdutoId());
                            echo "<tr>
                                    <td>{$produto->pegaDescricao()}</td>
                                    <td>{$itens[$i]->pegaQuantidade()}</td>
                                    <td>{$itens[$i]->pegaPreco()}</td>
                                </tr>";
                        } 
                    ?>
                
                </tbody>
                    
            </table>
        </fieldset>
        <fieldset class="formulario-pedidos__campos">
            <?php
                $check = array("","","");
                $pagamento = $pedido->pegaPagamento();
                if ($pagamento == 'd') {
                    $check[0] = "checked";
                } else if ($pagamento == 'c') {
                    $check[1] = "checked";
                } else {
                    $check[2] = "checked";
                }
            ?>
            <label class="formulario-pedidos__texto">
                <input type="radio" id="pedido-dinheiro" name="pedido-pagamento" value="d" <?= $check[0] ?> data-dinheiro>
                Dinheiro
            </label>
            <label class="formulario-pedidos__texto">
                <input type="radio" id="pedido-cartao" name="pedido-pagamento" value="c" <?= $check[1] ?> data-cartao>
                Cartão
            </label>
            <label class="formulario-pedidos__texto">
                <input type="radio" id="pedido-transferencia" name="pedido-pagamento" value="t" <?= $check[2] ?> data-transferencia>
                Transferência
            </label>
        </fieldset>
        <fieldset class="formulario-pedidos__campos">
            <label class="formulario-pedidos__texto">
                Taxa:<span data-taxa>R$ 0,00</span>
            </label>
        </fieldset>
        <fieldset class="formulario-pedidos__campos">
            <label class="formulario-pedidos__texto">
                Total: R$<input type="number" id="total-pedido" name="total-pedido" value="<?= $pedido->pegaTotal();?>" data-total-pedido readonly>
            </label>
        </fieldset>
            
        <fieldset class="formulario-pedidos__botoes">
            <input type="submit" value="Confirmar" data-botao-pedido disabled>
            <button data-limpar-pedido>Limpar Pedido</button>
        </fieldset>
    </form>
</main>