<?php
    
    $descricao = filter_input(INPUT_POST, 'descricao-produto', FILTER_SANITIZE_STRING); 
    $preco = filter_input(INPUT_POST, 'preco-produtos', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION); 
    
    $produto = new Produto();
    $produto->insereDescricao($descricao);
    $produto->inserePreco($preco);

    insereProduto($produto);   