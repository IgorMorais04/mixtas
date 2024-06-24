<?php
namespace DAL;

include_once 'C:/XAMPP/htdocs/mixtas/MODEL/modelPedido.php';
use \MODEL\pedido;

class dalPedido {
    private $conn;

    public function __construct() {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "mixtas";

        try {
            $this->conn = new \PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch(\PDOException $e) {
            echo "Erro na conexão: " . $e->getMessage();
        }
    }

    public function Insert(pedido $pedido) {
        $stmt = $this->conn->prepare("INSERT INTO pedidos (cliente, data_pedido, total, observacoes, status) VALUES (:cliente, :data_pedido, :total, :observacoes, :status)");
        $stmt->bindValue(':cliente', $pedido->getCliente());
        $stmt->bindValue(':data_pedido', $pedido->getDataPedido());
        $stmt->bindValue(':total', $pedido->getTotal());
        $stmt->bindValue(':observacoes', $pedido->getObservacoes());
        $stmt->bindValue(':status', $pedido->getStatus());
        $stmt->execute();
    }

    public function Select() {
        $stmt = $this->conn->query("SELECT * FROM pedidos");
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "MODEL\\pedido");
    }

    public function SelectID(int $id) {
        $stmt = $this->conn->prepare("SELECT * FROM pedidos WHERE id = :id");
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetchObject("MODEL\\pedido");
    }

    public function Update(pedido $pedido) {
        $stmt = $this->conn->prepare("UPDATE pedidos SET cliente = :cliente, data_pedido = :data_pedido, total = :total, observacoes = :observacoes, status = :status WHERE id = :id");
        $stmt->bindValue(':id', $pedido->getId());
        $stmt->bindValue(':cliente', $pedido->getCliente());
        $stmt->bindValue(':data_pedido', $pedido->getDataPedido());
        $stmt->bindValue(':total', $pedido->getTotal());
        $stmt->bindValue(':observacoes', $pedido->getObservacoes());
        $stmt->bindValue(':status', $pedido->getStatus());
        $stmt->execute();
    }

    public function Delete(int $id) {
        $stmt = $this->conn->prepare("DELETE FROM pedidos WHERE id = :id");
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }
}

?>
