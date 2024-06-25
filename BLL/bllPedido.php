<?php
namespace BLL;

include_once 'C:/XAMPP/htdocs/mixtas/DAL/dalPedido.php';
use \DAL\dalPedido;

class bllPedido {
    public function Insert(\MODEL\pedido $pedido) {
        $dal = new dalPedido();
        return $dal->Insert($pedido);
    }

    public function Select() {
        $dal = new dalPedido();
        return $dal->Select();
    }

    public function SelectID(int $id) {
        $dal = new dalPedido();
        return $dal->SelectID($id);
    }

    public function Update(\MODEL\pedido $pedido) {
        $dal = new dalPedido();
        return $dal->Update($pedido);
    }

    public function Delete(int $id) {
        $dal = new dalPedido();
        return $dal->Delete($id);
    }
}
?>
