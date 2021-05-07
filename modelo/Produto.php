<?php
class Produto {

    private $descricao;
    private $preco;
    
    function __construct() {
         
    }

    function pegaDescricao() {
        return $this->descricao;
    }
    function pegaPreco() {
        return $this->preco;
    }


    function insereDescricao($descricao) {
        $this->descricao = $descricao;
    }
    function inserePreco($preco) {
        $this->preco = $preco;
    }
}