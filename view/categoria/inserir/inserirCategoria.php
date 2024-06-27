<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserir Categoria</title>
    <link rel="stylesheet" href="./style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-top: 0;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Inserir Categoria</h2>
        <form action="inserirCategoria.php" method="post">
            <label for="nome">Nome da Categoria:</label>
            <input type="text" id="nome" name="nome" required><br><br>

            <input type="submit" value="Inserir Categoria">
        </form>
    </div>
</body>
</html>

<?php
include_once 'C:/XAMPP/htdocs/mixtas/BLL/bllCategoria.php';
include_once 'C:/XAMPP/htdocs/mixtas/MODEL/modelCategoria.php';

use BLL\bllCategoria;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];

    $categoria = new \MODEL\Categoria();
    $categoria->setNome($nome);

    $bll = new bllCategoria();
    $bll->Insert($categoria);

    header('Location: ../menu/menu.php'); // Ajuste o caminho conforme necessário
    exit();

}
?>
