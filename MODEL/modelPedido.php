<?php
namespace MODEL;

class pedido {
    private $id;
    private $cliente;
    private $total;
    private $dataPedido;
    private $observacoes;
    private $status;

    public function getId() {
        return $this->id;
    }
    
    public function setId($id) {
        $this->id = $id;
    }
    
    public function getCliente() {
        return $this->cliente;
    }
    
    public function setCliente($cliente) {
        $this->cliente = $cliente;
    }
    
    public function getTotal() {
        return $this->total;
    }
    
    public function setTotal($total) {
        $this->total = $total;
    }
    
    public function getDataPedido() {
        return $this->dataPedido;
    }
    
    public function setDataPedido($dataPedido) {
        $this->dataPedido = $dataPedido;
    }
    
    public function getObservacoes() {
        return $this->observacoes;
    }
    
    public function setObservacoes($observacoes) {
        $this->observacoes = $observacoes;
    }
    
    public function getStatus() {
        return $this->status;
    }
    
    public function setStatus($status) {
        $this->status = $status;
    }
}

?>
