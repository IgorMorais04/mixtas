<?php
namespace DAL;

include_once 'C:/XAMPP/htdocs/mixtas/MODEL/modelCategoria.php';
use \MODEL\Categoria;

class dalCategoria {
    private $conn;

    public function __construct() {
        // Configuração da conexão com o banco de dados
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

    public function Insert(Categoria $categoria) {
        $stmt = $this->conn->prepare("INSERT INTO categorias (nome) VALUES (:nome)");
        $stmt->bindValue(':nome', $categoria->getNome());
        $stmt->execute();
    }

    public function Select() {
        $stmt = $this->conn->query("SELECT * FROM categorias");
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "MODEL\\Categoria");
    }

    public function SelectID(int $id) {
        $stmt = $this->conn->prepare("SELECT * FROM categorias WHERE id = :id");
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetchObject("MODEL\\Categoria");
    }

    public function Update(Categoria $categoria) {
        $stmt = $this->conn->prepare("UPDATE categorias SET nome = :nome WHERE id = :id");
        $stmt->bindValue(':id', $categoria->getId());
        $stmt->bindValue(':nome', $categoria->getNome());
        $stmt->execute();
    }

    public function Delete(int $id) {
        $stmt = $this->conn->prepare("DELETE FROM categorias WHERE id = :id");
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }
}
?>
