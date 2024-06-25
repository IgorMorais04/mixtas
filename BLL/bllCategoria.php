<?php
namespace BLL;

include_once 'C:/XAMPP/htdocs/mixtas/DAL/dalCategoria.php';
use \DAL\dalCategoria;

class bllCategoria {
    public function Insert(\MODEL\Categoria $categoria) {
        $dal = new dalCategoria();
        return $dal->Insert($categoria);
    }

    public function Select() {
        $dal = new dalCategoria();
        return $dal->Select();
    }

    public function SelectID(int $id) {
        $dal = new dalCategoria();
        return $dal->SelectID($id);
    }

    public function Update(\MODEL\Categoria $categoria) {
        $dal = new dalCategoria();
        return $dal->Update($categoria);
    }

    public function Delete(int $id) {
        $dal = new dalCategoria();
        return $dal->Delete($id);
    }
}
?>
