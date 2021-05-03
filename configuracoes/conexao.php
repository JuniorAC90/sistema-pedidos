<?php
    $servidor = '127.0.0.1:3306';
    $usuario = 'root';
    $senha = 'root';
    $banco = 'sistema-pedidos';

    $conexao = new mysqli($servidor, $usuario, $senha, $banco);

    if ($conexao->connect_error) {
        die("Connection failed: " . $conexao->connect_error);
    }
?>