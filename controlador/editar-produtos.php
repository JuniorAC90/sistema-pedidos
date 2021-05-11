<?php
    
    $id = filter_input(INPUT_POST, 'id-produto', FILTER_SANITIZE_NUMBER_INT);
    $descricao = filter_input(INPUT_POST, 'descricao-produto', FILTER_SANITIZE_STRING);
    $preco = filter_input(INPUT_POST, 'preco-produto', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION); 

    $produto = new Produto();
    $produto->insereId($id);
    $produto->insereDescricao($descricao);
    $produto->inserePreco($preco);
    
    
    editaProduto($produto);

      
   
    
    