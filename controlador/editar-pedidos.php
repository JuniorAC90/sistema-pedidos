<?php
    $idPedidoCancela = filter_input(INPUT_POST, 'id-pedido', FILTER_SANITIZE_NUMBER_INT); 
    editaPedido($idPedidoCancela);

    $idCliente = filter_input(INPUT_POST, 'id-cliente', FILTER_SANITIZE_NUMBER_INT); 

    $itemProdutos = filter_input(INPUT_POST, 'item', FILTER_DEFAULT,FILTER_REQUIRE_ARRAY); 
    $quantidadeProdutos = filter_input(INPUT_POST, 'quantidade', FILTER_DEFAULT , FILTER_REQUIRE_ARRAY); 
    $precoProdutos = filter_input(INPUT_POST, 'preco', FILTER_DEFAULT,FILTER_REQUIRE_ARRAY);  

    $pagamento = filter_input(INPUT_POST, 'pedido-pagamento', FILTER_SANITIZE_STRING);

    $total = filter_input(INPUT_POST, 'total-pedido', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION); 

    date_default_timezone_set("America/Sao_Paulo");

    $ano = strval(date('Y'));
    $mes = strval(date('m'));
    $dia = strval(date('d'));
    
    $hora = strval(date('H'));
    $minuto = strval(date('i'));
    $segundo = strval(date('s'));

    $idPedido = $ano . $mes . $dia . $hora . $minuto . $segundo;

    $estado = 'aberto';

    $itens = array();
    for ($i = 0; $i < count($itemProdutos); $i++) {
        $item = new Item();
        $item->inserePedidoId($idPedido);
        $item->insereProdutoId($itemProdutos[$i]);
        $itens[] = $item;
    }

    for ($i = 0; $i < count($quantidadeProdutos); $i++) {
        $itens[$i]->insereQuantidade($quantidadeProdutos[$i]);
    }

    for ($i = 0; $i < count($precoProdutos); $i++) {
        $itens[$i]->inserePreco($precoProdutos[$i]);
    }

    $pedido = new Pedido();
    $pedido->insereId($idPedido);
    $pedido->insereClienteId($idCliente);
    $pedido->insereAno($ano);
    $pedido->insereMes($mes);
    $pedido->insereDia($dia);
    $pedido->insereHora($hora);
    $pedido->insereMinuto($minuto);
    $pedido->insereSegundo($segundo);
    $pedido->insereTotal($total);
    $pedido->insereEstado($estado);
    $pedido->inserePagamento($pagamento);

    inserePedido($pedido);

    for ($i = 0; $i < count($itens); $i++) {
        insereItem($itens[$i], $i);
    }

    header("refresh:2; url=/impressao?pedido={$idPedido}");

    