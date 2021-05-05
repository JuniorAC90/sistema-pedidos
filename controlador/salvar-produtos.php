<?php
    $query = "INSERT INTO produto(descricao, preco) VALUES(?, ?)";
    $statement = $conexao->prepare($query);
    $statement->bind_param('sd', $descricao, $preco);

    $descricao = filter_input(INPUT_POST, 'descricao-produto', FILTER_SANITIZE_STRING); 
    $preco = filter_input(INPUT_POST, 'preco-produtos', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION); 
    
    $statement->execute();

    if ($statement->error) {
       lancaMensagem("Erro ao inserir os dados.", "erro");
    } else {
       lancaMensagem("Dados inseridos com sucesso!", "sucesso");
       //$statement->affected_rows;
       header("refresh:2; url=/produtos");
    }
        
   
    
    