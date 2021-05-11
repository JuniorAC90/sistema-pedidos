<?php
    
    $id = filter_input(INPUT_POST, 'id-cliente', FILTER_SANITIZE_NUMBER_INT);
    $nome = filter_input(INPUT_POST, 'nome-cliente', FILTER_SANITIZE_STRING);
    $sobrenome = filter_input(INPUT_POST, 'sobrenome-cliente', FILTER_SANITIZE_STRING);
    $telefone = filter_input(INPUT_POST, 'telefone-cliente', FILTER_SANITIZE_STRING);
    $cep = filter_input(INPUT_POST, 'cep-cliente', FILTER_SANITIZE_STRING);
    $endereco = filter_input(INPUT_POST, 'endereco-cliente', FILTER_SANITIZE_STRING);
    $numero = filter_input(INPUT_POST, 'numero-cliente', FILTER_SANITIZE_NUMBER_INT);
    $bairro = filter_input(INPUT_POST, 'bairro-cliente', FILTER_SANITIZE_STRING);
    $complemento = filter_input(INPUT_POST, 'complemento-cliente', FILTER_SANITIZE_STRING);

    $cliente = new Cliente();
    $cliente->insereId($id);
    $cliente->insereNome($nome);
    $cliente->insereSobrenome($sobrenome);
    $cliente->insereTelefone($telefone);
    $cliente->insereCep($cep);
    $cliente->insereEndereco($endereco);
    $cliente->insereNumero($numero);
    $cliente->insereBairro($bairro);
    $cliente->insereComplemento($complemento); 
    
    editaCliente($cliente);

      
   
    
    