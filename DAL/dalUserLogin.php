<?php 
namespace DAL;

include_once 'C:/XAMPP/htdocs/mixtas/DAL/conexao.php';
include_once 'C:/XAMPP/htdocs/mixtas/MODEL/modelUserLogin.php';

use \MODEL\userLogin; // Corrigido o namespace

class dalUserLogin {
    public function SelectUserLogin($usuario) {
        $sql = "select * from usuarios where email_user = ?"; // Ajustado para usar o parâmetro $usuario

        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $query->execute([$usuario]);
        $result = $query->fetch(\PDO::FETCH_ASSOC);
        Conexao::desconectar();

        if ($result) {
            $login = new userLogin();
            $login->setIdUser($result['id_user']);
            $login->setEmailUser($result['email_user']);
            $login->setSenhaUser($result['senha_user']);

            return $login;
        } else {
            return null;
        }
    }

    public function SelectUserID(int $id) {
        try {
            $sql = "SELECT * FROM usuarios WHERE id_user=?";
            $pdo = Conexao::conectar();
            $query = $pdo->prepare($sql);
            $query->execute([$id]);
            $result = $query->fetch(\PDO::FETCH_ASSOC);
            Conexao::desconectar();

            if($result) {
                $login = new userLogin();
                $login->setIdUser($result['id_user']);
                $login->setEmailUser($result['email_user']);
                $login->setSenhaUser($result['senha_user']);

                return $login;
            } else {
                return null;
            }
        } catch (\PDOException $e) {
            echo "Erro na consulta: " . $e->getMessage();
            return null;
        }
    }
}
?>
