<?php
namespace BLL;

include_once 'C:/XAMPP/htdocs/mixtas/DAL/dalUserLogin.php'; // Corrigido o caminho absoluto

use \DAL\dalUserLogin;

class bllUserLogin
{
    public function SelectUserLogin($usuario) {
        $dal = new dalUserLogin(); // Corrigido o namespace
        return $dal->SelectUserLogin($usuario);
    }

    public function SelectUserId(int $id) {
        $dal = new dalUserLogin(); // Corrigido o namespace
        return $dal->SelectUserID($id);
    }
}
?>
