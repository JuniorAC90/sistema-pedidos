<?php
class Cliente {

    private $id;
    private $nome;
    private $sobrenome;
    private $telefone;
    private $cep;
    private $endereco;
    private $numero;
    private $bairro;
    private $complemento;
    
    function __construct() {
         
    }

    function pegaId() {
        return $this->id;
    }
    function pegaNome() {
        return $this->nome;
    }
    function pegaSobrenome() {
        return $this->sobrenome;
    }
    function pegaTelefone() {
        return $this->telefone;
    }
    function pegaCep() {
        return $this->cep;
    }
    function pegaEndereco() {
        return $this->endereco;
    }
    function pegaNumero() {
        return $this->numero;
    }
    function pegaBairro() {
        return $this->bairro;
    }
    function pegaComplemento() {
        return $this->complemento;
    }

    function insereId($id) {
        $this->id = $id;
    }
    function insereNome($nome) {
        $this->nome = $nome;
    }
    function insereSobrenome($sobrenome) {
        $this->sobrenome = $sobrenome;
    }
    function insereTelefone($telefone) {
        $this->telefone = $telefone;
    }
    function insereCep($cep) {
        $this->cep = $cep;
    }
    function insereEndereco($endereco) {
        $this->endereco = $endereco;
    }
    function insereNumero($numero) {
        $this->numero = $numero;
    }
    function insereBairro($bairro) {
        $this->bairro = $bairro;
    }
    function insereComplemento($complemento) {
        $this->complemento = $complemento;
    }
}