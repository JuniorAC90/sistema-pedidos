<?php
    $idPedido = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
    $pedido = pegaUmPedidoComItens($idPedido);
    $cliente = pegaUmCliente($pedido->pegaClienteId());

    
?>

<main class="nota">
    <h2 class="titulo">Nome da empresa</h2>
    <img src="img/logo.png" alt="logo" class="nota__logo">
    <div class="nota__subtitulo">
        <h3>Pedido: <span class="nota__subtitulo--pedido"><?= $idPedido?></span></h3>
        <h3>Cliente: <span class="nota__subtitulo--cliente"><?= $cliente->pegaNome()?></span></h3>
        <h3>Data: <span class="nota__subtitulo--data"><?= $pedido->pegaData()?></span></h3>
        <h3>Hora: <span class="nota__subtitulo--hora"><?= $pedido->pegaHorario()?></span></h3>
        <h3>Pagamento: <span class="nota__subtitulo--hora"><?= $pedido->pegaPagamentoDescricao()?></span></h3>
    </div>
   
    <table class="nota__tabela tabela">
        <thead>
            <tr>
                <th>Item</th>
                <th>Quantidade</th>  
                <th>Valor</th>
                
            </tr>
        </thead>
        <tbody>
            <?php

                for ($i = 0; $i < count($pedido->pegaItens()); $i++) {
                    $produto = pegaUmProduto($pedido->pegaItens()[$i]->pegaProdutoId());
                    $preco = $pedido->pegaItens()[$i]->pegaPreco();
                    $precoFormatado = number_format($preco,2,',', '.');
                    echo "
                    <tr>
                        <td>{$produto->pegaDescricao()}</td>
                        <td>{$pedido->pegaItens()[$i]->pegaQuantidade()}</td>
                        <td>R$ {$precoFormatado}</td>
                    </tr>
                    ";

                }
            ?>
            <?php 
                if ($pedido->pegaPagamento() == 'c') {
                    echo "
                    <tr>
                        <td>Taxa do Cartão</td>
                        <td>-</td>
                        <td>R$ 2,00</td>
                    </tr>
                    ";
                }
            ?>
            <tr class="total">
                <td><span class="total__desc">Total</span></td>
                <td></td>
                <td><span class="total__desc"><?=$pedido->pegaTotalFormatado()?></span</td>
            </tr>
            
        </tbody>
    </table>
</main>
<button class="botao-imprimir" data-botao-imprimir>Imprimir</button>