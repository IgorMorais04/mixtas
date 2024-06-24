<?php 
namespace DAL;

include_once 'C:/XAMPP/htdocs/mixtas/DAL/conexao.php';
include_once 'C:/XAMPP/htdocs/mixtas/MODEL/modelFornecedor.php';

class dalFornecedor {
    public function SelectFornecedores() {
        $sql = "SELECT * FROM fornecedores;";

        $con = Conexao::conectar();
        $result = $con->query($sql);
        Conexao::desconectar();

        $lstFornecedores = array();

        foreach($result as $linha) {
            $fornecedor = new \MODEL\fornecedor();

            $fornecedor->setId($linha['id']);
            $fornecedor->setNome($linha['nome']);
            $fornecedor->setEmail($linha['email']);
            $fornecedor->setTelefone($linha['telefone']);
            $fornecedor->setEndereco($linha['endereco']);

            $lstFornecedores[] = $fornecedor;
        }
        return $lstFornecedores;
    }

    public function SelectID(int $id) {
        try {
            $sql = "SELECT * FROM fornecedores WHERE id=?";
            $pdo = Conexao::conectar();
            $query = $pdo->prepare($sql);
            $query->execute([$id]);
            $linha = $query->fetch(\PDO::FETCH_ASSOC);
            Conexao::desconectar();

            if($linha) {
                $fornecedor = new \MODEL\fornecedor();
                $fornecedor->setId($linha['id']);
                $fornecedor->setNome($linha['nome']);
                $fornecedor->setEmail($linha['email']);
                $fornecedor->setTelefone($linha['telefone']);
                $fornecedor->setEndereco($linha['endereco']);

                return $fornecedor;
            } else {
                return null;
            }
        } catch (\PDOException $e) {
            echo "Erro na consulta: " . $e->getMessage();
            return null;
        }
    }

    public function Insert(\MODEL\fornecedor $fornecedor) {
        try {
            $sql = "INSERT INTO fornecedores (nome, email, telefone, endereco)
                    VALUES (?, ?, ?, ?)";

            $pdo = Conexao::conectar();
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $query = $pdo->prepare($sql);
            $query->execute([
                $fornecedor->getNome(),
                $fornecedor->getEmail(),
                $fornecedor->getTelefone(),
                $fornecedor->getEndereco()
            ]);
            $lastInsertId = $pdo->lastInsertId();
            Conexao::desconectar();
            return $lastInsertId;
        }catch (\PDOException $e) {
            echo "Erro na inserção: " . $e->getMessage();
            return null;
        }
    }

    public function Update(\MODEL\fornecedor $fornecedor) {
        $sql = "UPDATE fornecedores SET nome=?, email=?, telefone=?, endereco=? WHERE id=?";

        $con = Conexao::conectar();
        $con->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION); 
        $query = $con->prepare($sql);
        $result = $query->execute([
            $fornecedor->getNome(),
            $fornecedor->getEmail(), 
            $fornecedor->getTelefone(),
            $fornecedor->getEndereco(),
            $fornecedor->getId()
        ]);
        Conexao::desconectar();
        return $result; 
    }

    public function Delete(int $id) {
        try {
            $sql = "DELETE FROM fornecedores WHERE id=?";
            $pdo = Conexao::conectar(); 
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION); 
            $query = $pdo->prepare($sql);
            $query->execute([$id]);
            Conexao::desconectar();
            return $query;
        } catch (\PDOException $e) {
            echo "Erro na exclusão: " . $e->getMessage();
            return false;
        }
    }
}
?>
