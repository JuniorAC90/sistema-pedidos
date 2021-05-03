<?php
    $query = "INSERT INTO cliente(nome, sobrenome, telefone, cep, endereco, numero, bairro, complemento) VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
    $statement = $conexao->prepare($query);
    $statement->bind_param('sssssiss', $nome, $sobrenome, $telefone, $cep, $endereco, $numero, $bairro, $complemento);

    $nome = filter_input(INPUT_POST, 'nome-cliente', FILTER_SANITIZE_STRING);
    $sobrenome = filter_input(INPUT_POST, 'sobrenome-cliente', FILTER_SANITIZE_STRING);
    $telefone = filter_input(INPUT_POST, 'telefone-cliente', FILTER_SANITIZE_STRING);
    $cep = filter_input(INPUT_POST, 'cep-cliente', FILTER_SANITIZE_STRING);
    $endereco = filter_input(INPUT_POST, 'endereco-cliente', FILTER_SANITIZE_STRING);
    $numero = filter_input(INPUT_POST, 'numero-cliente', FILTER_SANITIZE_NUMBER_INT);
    $bairro = filter_input(INPUT_POST, 'bairro-cliente', FILTER_SANITIZE_STRING);
    $complemento = filter_input(INPUT_POST, 'complemento-cliente', FILTER_SANITIZE_STRING);
    
    $statement->execute();

    if ($statement->error) {
       lancaMensagem("Erro ao inserir os dados.", "erro");
    } else {
       lancaMensagem("Dados inseridos com sucesso!", "sucesso");
       //$statement->affected_rows;
       header("refresh:2; url=/clientes");
    }
        
   
    
    