<?php 
namespace DAL;

include_once 'C:/XAMPP/htdocs/mixtas/DAL/conexao.php';
include_once 'C:/XAMPP/htdocs/mixtas/MODEL/modelMovEstoque.php';

class dalMovEstoque {
    public function SelectMovEstoque() {
        $sql = "SELECT * FROM estoque;";

        $con = Conexao::conectar();
        $result = $con->query($sql);
        $con = Conexao::desconectar();

        $lstEstoque = array();

        foreach($result as $linha) {
            $estoque = new \MODEL\movEstoque();

            $estoque->setId($linha['id']);
            $estoque->setNome($linha['nome']);
            $estoque->setCategoria($linha['categoria']);
            $estoque->setValor($linha['valor']);
            $estoque->setImagem($linha['imagem']); // Adicionado para a imagem

            $lstEstoque[] = $estoque;
        }
        return $lstEstoque;
    }

    public function SelectID(int $id) {
        try {
            $sql = "SELECT * FROM estoque WHERE id=?";
            $pdo = Conexao::conectar();
            $query = $pdo->prepare($sql);
            $query->execute([$id]);
            $linha = $query->fetch(\PDO::FETCH_ASSOC);
            Conexao::desconectar();

            if($linha) {
                $estoque = new \MODEL\movEstoque();
                $estoque->setId($linha['id']);
                $estoque->setNome($linha['nome']);
                $estoque->setCategoria($linha['categoria']);
                $estoque->setValor($linha['valor']);
                $estoque->setImagem($linha['imagem']); // Adicionado para a imagem

                return $estoque;
            } else {
                return null;
            }
        } catch (\PDOException $e) {
            echo "Erro na consulta: " . $e->getMessage();
            return null;
        }
    }

    public function Insert(\MODEL\movEstoque $estoque) {
        try {
            $sql = "INSERT INTO estoque (nome, categoria, valor, imagem)
                    VALUES (?, ?, ?, ?)";

            $pdo = Conexao::conectar();
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $query = $pdo->prepare($sql);
            $query->execute([
                $estoque->getNome(),
                $estoque->getCategoria(),
                $estoque->getValor(),
                $estoque->getImagem() // Adicionado para a imagem
            ]);
            $lastInsertId = $pdo->lastInsertId();
            Conexao::desconectar();
            return $lastInsertId;
        }catch (\PDOException $e) {
            echo "Erro na inserção: " . $e->getMessage();
            return null;
        }
    }

    public function Update(\MODEL\movEstoque $estoque) {
        $sql = "UPDATE estoque SET nome=?, categoria=?, valor=?, imagem=? WHERE id=?";

        $con = Conexao::conectar();
        $con->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION); 
        $query = $con->prepare($sql);
        $result = $query->execute([
            $estoque->getNome(),
            $estoque->getCategoria(), 
            $estoque->getValor(),
            $estoque->getImagem(), // Adicionado para a imagem
            $estoque->getId()
        ]);
        Conexao::desconectar();
        return $result; 
    }

    public function Delete(int $id) {
        try {
            $sql = "DELETE FROM estoque WHERE id=?";
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
