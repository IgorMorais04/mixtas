<?php
include_once 'C:/XAMPP/htdocs/mixtas/BLL/bllPedido.php';
include_once 'C:/XAMPP/htdocs/mixtas/MODEL/modelPedido.php';

use BLL\bllPedido;
use MODEL\pedido;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dataPedido = $_POST['data_pedido'];
    $cliente = $_POST['cliente'];
    $total = $_POST['total'];
    $observacoes = $_POST['observacoes'];
    $status = $_POST['status'];

    $pedido = new pedido();
    $pedido->setDataPedido($dataPedido);
    $pedido->setCliente($cliente);
    $pedido->setTotal($total);
    $pedido->setObservacoes($observacoes);
    $pedido->setStatus($status);

    $bll = new bllPedido();
    $bll->Insert($pedido);

    echo "Pedido inserido com sucesso!";
    header('Location: ../menu/menu.php'); // Ajuste o caminho conforme necessário
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserir Pedido</title>
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

        input[type="text"],
        input[type="date"],
        textarea,
        select {
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
        <h2>Inserir Pedido</h2>
        <form action="inserirPedido.php" method="post">
            <label for="data_pedido">Data do Pedido:</label>
            <input type="date" id="data_pedido" name="data_pedido" required>

            <label for="cliente">Cliente:</label>
            <input type="text" id="cliente" name="cliente" required>

            <label for="total">Total:</label>
            <input type="text" id="total" name="total" required>

            <label for="observacoes">Observações:</label>
            <textarea id="observacoes" name="observacoes"></textarea>

            <label for="status">Status:</label>
            <select id="status" name="status" required>
                <option value="pendente">Pendente</option>
                <option value="processando">Processando</option>
                <option value="concluido">Concluído</option>
            </select>

            <input type="submit" value="Inserir Pedido">
        </form>
    </div>
</body>

</html>
