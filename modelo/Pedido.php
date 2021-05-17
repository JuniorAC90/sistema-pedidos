<?php
class Pedido {

    private $id;
    private $clienteId;
    private $ano;
    private $mes;
    private $dia;
    private $hora;
    private $minuto;
    private $segundo;
    private $total;
    private $estado;
    private $pagamento;
    private $itens;
    
    function __construct() {
        
    }

    function pegaId() {
        return $this->id;
    }

    function pegaClienteId() {
        return $this->clienteId;
    }

    function pegaAno() {
        return $this->ano;
    }

    function pegaMes() {
        return $this->mes;
    }

    function pegaDia() {
        return $this->dia;
    }

    function pegaHora() {
        return $this->hora;
    }

    function pegaMinuto() {
        return $this->minuto;
    }

    function pegaSegundo() {
        return $this->segundo;
    }

    function pegaTotal() {
        return $this->total;
    }

    function pegaEstado() {
        return $this->estado;
    }

    function pegaPagamento() {
        return $this->pagamento;
    }

    function pegaData() {
        return $this->dia.'/'.$this->mes.'/'.$this->ano;
    }

    function pegaHorario() {
        return $this->hora.':'.$this->minuto.':'.$this->segundo;
    }

    function pegaTotalFormatado() {
        return "R$ " . str_replace('.', ',', $this->total);
    }

    function pegaItens() {
        return $this->itens;
    }

    function insereId($id) {
        $this->id = $id;
    }

    function insereClienteId($clienteId) {
        $this->clienteId = $clienteId;
    }

    function insereAno($ano) {
        $this->ano = $ano;
    }

    function insereMes($mes) {
        $this->mes = $mes;
    }

    function insereDia($dia) {
        $this->dia = $dia;
    }

    function insereHora($hora) {
        $this->hora = $hora;
    }

    function insereMinuto($minuto) {
        $this->minuto = $minuto;
    }

    function insereSegundo($segundo) {
        $this->segundo = $segundo;
    }

    function insereTotal($total) {
        $this->total = $total;
    }

    function insereEstado($estado) {
        $this->estado = $estado;
    }

    function inserePagamento($pagamento) {
        $this->pagamento = $pagamento;
    }

    function insereItens($itens) {
        $this->itens = $itens;
    }

   

    
}