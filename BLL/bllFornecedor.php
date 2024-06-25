<?php
namespace BLL;

include_once 'C:/XAMPP/htdocs/mixtas/DAL/dalFornecedor.php';
use \DAL\dalFornecedor;

class bllFornecedor
{
   public function Select() {
       $dal = new dalFornecedor();
       return $dal->SelectFornecedores();
   }

   public function SelectID(int $id) {
       $dal = new dalFornecedor();
       return $dal->SelectID($id);
   }

   public function Insert(\MODEL\fornecedor $fornecedor) {
       $dal = new dalFornecedor();
       return $dal->Insert($fornecedor);
   }

   public function Update(\MODEL\fornecedor $fornecedor) {
       $dal = new dalFornecedor();
       return $dal->Update($fornecedor);
   }

   public function Delete(int $id) {
       $dal = new dalFornecedor();
       return $dal->Delete($id);
   }
}
?>
