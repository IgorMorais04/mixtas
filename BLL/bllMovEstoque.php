<?php
namespace BLL;

include_once 'C:/XAMPP/htdocs/mixtas/DAL/dalMovEstoque.php';
use \DAL\dalMovEstoque;

class bllMovEstoque
{
   public function Select() {
       $dal = new dalMovEstoque();
       return $dal->SelectMovEstoque();
   }

   public function SelectID(int $id) {
       $dal = new dalMovEstoque();
       return $dal->SelectID($id);
   }

   public function Insert(\MODEL\movEstoque $estoque) {
       $dal = new dalMovEstoque();
       $dal->Insert($estoque);
   }

   public function Update(\MODEL\movEstoque $estoque) {
       $dal = new dalMovEstoque();
       $dal->Update($estoque);
   }

   public function Delete(int $id) {
       $dal = new dalMovEstoque();
       $dal->Delete($id);
   }
}
?>
