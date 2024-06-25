<?php
class Movimentacao {
    public $id;
    public $id_estoque;
    public $quantidade;
    public $valor;
    public $data_movimentacao;
    public $pagamento;

    public function __construct($id_estoque, $quantidade, $valor, $data_movimentacao, $pagamento, $id = null) {
        $this->id = $id;
        $this->id_estoque = $id_estoque;
        $this->quantidade = $quantidade;
        $this->valor = $valor;
        $this->data_movimentacao = $data_movimentacao;
        $this->pagamento = $pagamento;
    }
}
?>
