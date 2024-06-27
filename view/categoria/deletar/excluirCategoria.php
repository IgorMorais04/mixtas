<?php
include_once 'C:/XAMPP/htdocs/mixtas/BLL/bllCategoria.php';
include_once 'C:/XAMPP/htdocs/mixtas/MODEL/modelCategoria.php';

use BLL\bllCategoria;

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];

    $bll = new bllCategoria();
    $bll->Delete($id);

    echo "Categoria excluída com sucesso!";
    
    header('Location: ../menu/menu.php'); // Ajuste o caminho conforme necessário
    exit();
} else {
    echo "ID da categoria não fornecido!";
}
?>
