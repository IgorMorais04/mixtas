<?php
include_once 'C:/XAMPP/htdocs/mixtas/BLL/bllCategoria.php';
use BLL\bllCategoria;

$bll = new bllCategoria();
$categorias = $bll->Select();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Categorias</title>
    <link rel="stylesheet" href="./style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
        }

        .container {
            max-width: 800px;
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }

        .actions {
            display: flex;
            gap: 10px;
        }

        .actions a {
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 4px;
            background-color: #4CAF50;
            color: white;
            transition: background-color 0.3s ease;
        }

        .actions a:hover {
            background-color: #45a049;
        }

        .add-category {
            display: block;
            margin-top: 20px;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 4px;
            background-color: #007bff;
            color: white;
            transition: background-color 0.3s ease;
        }

        .add-category:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Listagem de Categorias</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome da Categoria</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categorias as $categoria) { ?>
                    <tr>
                        <td><?php echo $categoria->getId(); ?></td>
                        <td><?php echo $categoria->getNome(); ?></td>
                        <td class="actions">
                            <a href="../editar/editarCategoria.php?id=<?php echo $categoria->getId(); ?>">Editar</a>
                            <a href="../deletar/excluirCategoria.php?id=<?php echo $categoria->getId(); ?>">Excluir</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <a href="../inserir/inserirCategoria.php" class="add-category">Inserir Nova Categoria</a>
    </div>
</body>
</html>
