<?php
include_once 'C:/XAMPP/htdocs/mixtas/BLL/bllPedido.php';
use BLL\bllPedido;

$bll = new bllPedido();
$pedidos = $bll->Select();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Pedidos</title>
    <link rel="stylesheet" href="./style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            padding: 20px;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 14px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            color: #fff;
            border: none;
            border-radius: 4px;
            margin: 5px;
        }

        .btn-create {
            background-color: #4CAF50;
        }

        .btn-edit {
            background-color: #2196F3;
        }

        .btn-delete {
            background-color: #f44336;
        }

        .btn:hover {
            opacity: 0.9;
        }

        .action-buttons {
            text-align: right;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Listagem de Pedidos</h2>
        <div class="action-buttons">
            <a href="../inserir/inserirPedido.php" class="btn btn-create">Criar Pedido</a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Data do Pedido</th>
                    <th>Cliente</th>
                    <th>Total</th>
                    <th>Observações</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pedidos as $pedido) { ?>
                    <tr>
                        <td><?php echo $pedido->getId(); ?></td>
                        <td><?php echo date('d/m/Y', strtotime($pedido->getDataPedido())); ?></td>
                        <td><?php echo $pedido->getCliente(); ?></td>
                        <td>R$ <?php echo number_format($pedido->getTotal(), 2, ',', '.'); ?></td>
                        <td><?php echo $pedido->getObservacoes(); ?></td>
                        <td><?php echo $pedido->getStatus(); ?></td>
                        <td>
                            <a href="../editar/editarPedido.php?id=<?php echo $pedido->getId(); ?>" class="btn btn-edit">Editar</a>
                            <a href="../deletar/deletarPedido.php?id=<?php echo $pedido->getId(); ?>" class="btn btn-delete" onclick="return confirm('Tem certeza que deseja deletar este pedido?')">Deletar</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>
