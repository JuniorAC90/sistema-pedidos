<?php
class Banco {

    private $conexao;
    
    function __construct() {
        $host = '127.0.0.1:3306';
        $usuario = 'root';
        $senha = 'root';
        $banco = 'sistema-pedidos';
        $conexao = new mysqli($host, $usuario, $senha, $banco);
        if ($conexao->connect_error) {
            die("Connection failed: " . $conexao->connect_error);
        }
        $this->conexao = $conexao;
    }

    function pegaConexao() {
        return $this->conexao;
    }


    

   

    
}