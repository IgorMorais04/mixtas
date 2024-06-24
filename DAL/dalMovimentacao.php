<?php
class MovimentacaoDAL {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function inserir(Movimentacao $movimentacao) {
        $stmt = $this->conn->prepare("INSERT INTO movimentacao (id_estoque, quantidade, valor, data_movimentacao, pagamento) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("iidss", $movimentacao->id_estoque, $movimentacao->quantidade, $movimentacao->valor, $movimentacao->data_movimentacao, $movimentacao->pagamento);
        return $stmt->execute();
    }

    public function atualizar(Movimentacao $movimentacao) {
        $stmt = $this->conn->prepare("UPDATE movimentacao SET id_estoque = ?, quantidade = ?, valor = ?, data_movimentacao = ?, pagamento = ? WHERE id = ?");
        $stmt->bind_param("iidssi", $movimentacao->id_estoque, $movimentacao->quantidade, $movimentacao->valor, $movimentacao->data_movimentacao, $movimentacao->pagamento, $movimentacao->id);
        return $stmt->execute();
    }

    public function deletar($id) {
        $stmt = $this->conn->prepare("DELETE FROM movimentacao WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function buscarPorId($id) {
        $stmt = $this->conn->prepare("SELECT * FROM movimentacao WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            return new Movimentacao($row['id_estoque'], $row['quantidade'], $row['valor'], $row['data_movimentacao'], $row['pagamento'], $row['id']);
        }
        return null;
    }

    public function listar() {
        $result = $this->conn->query("SELECT * FROM movimentacao");
        $movimentacoes = [];
        while ($row = $result->fetch_assoc()) {
            $movimentacoes[] = new Movimentacao($row['id_estoque'], $row['quantidade'], $row['valor'], $row['data_movimentacao'], $row['pagamento'], $row['id']);
        }
        return $movimentacoes;
    }
}
?>
