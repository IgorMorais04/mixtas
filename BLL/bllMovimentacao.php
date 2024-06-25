<?php
class MovimentacaoBLL {
    private $movimentacaoDAL;

    public function __construct($movimentacaoDAL) {
        $this->movimentacaoDAL = $movimentacaoDAL;
    }

    public function adicionarMovimentacao($id_estoque, $quantidade, $valor, $data_movimentacao, $pagamento) {
        $movimentacao = new Movimentacao($id_estoque, $quantidade, $valor, $data_movimentacao, $pagamento);
        return $this->movimentacaoDAL->inserir($movimentacao);
    }

    public function atualizarMovimentacao($id, $id_estoque, $quantidade, $valor, $data_movimentacao, $pagamento) {
        $movimentacao = new Movimentacao($id_estoque, $quantidade, $valor, $data_movimentacao, $pagamento, $id);
        return $this->movimentacaoDAL->atualizar($movimentacao);
    }

    public function deletarMovimentacao($id) {
        return $this->movimentacaoDAL->deletar($id);
    }

    public function obterMovimentacaoPorId($id) {
        return $this->movimentacaoDAL->buscarPorId($id);
    }

    public function listarMovimentacoes() {
        return $this->movimentacaoDAL->listar();
    }
}
?>
