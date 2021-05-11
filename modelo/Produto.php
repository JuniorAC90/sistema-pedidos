<?php
class Produto {

    private $id;
    private $descricao;
    private $preco;
    
    function __construct() {
         
    }

    function pegaId() {
        return $this->id;
    }
    function pegaDescricao() {
        return $this->descricao;
    }
    function pegaPreco() {
        return $this->preco;
    }


    function insereId($id) {
        $this->id = $id;
    }
    function insereDescricao($descricao) {
        $this->descricao = $descricao;
    }
    function inserePreco($preco) {
        $this->preco = $preco;
    }
}