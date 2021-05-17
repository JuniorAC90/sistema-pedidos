<?php
class Item {

    private $pedidoId;
    private $produtoId;
    private $quantidade;
    private $preco;
    
    function __construct() {
        
    }

    function pegaPedidoId() {
        return $this->pedidoId;
    }

    function pegaProdutoId() {
        return $this->produtoId;
    }

    function pegaQuantidade() {
        return $this->quantidade;
    }

    function pegaPreco() {
        return $this->preco;
    }

    function inserePedidoId($pedidoId) {
        $this->pedidoId = $pedidoId;
    }

    function insereProdutoId($produtoId) {
        $this->produtoId = $produtoId;
    }

    function insereQuantidade($quantidade) {
        $this->quantidade = $quantidade;
    }

    function inserePreco($preco) {
        $this->preco = $preco;
    }


    

   

    
}