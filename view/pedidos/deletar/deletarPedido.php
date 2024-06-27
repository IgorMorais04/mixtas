<?php
// Incluir os arquivos necessários
include_once 'C:/XAMPP/htdocs/mixtas/BLL/bllPedido.php';
include_once 'C:/XAMPP/htdocs/mixtas/MODEL/modelPedido.php';

use BLL\bllPedido;

// Verificar se foi fornecido o ID do pedido via GET
if (!isset($_GET['id'])) {
    echo "ID do pedido não fornecido!";
    exit;
}

$id = $_GET['id'];

// Criar uma instância da BLL e recuperar o pedido pelo ID
$bll = new bllPedido();
$pedido = $bll->SelectID($id);

// Verificar se o pedido foi encontrado
if (!$pedido) {
    echo "Pedido não encontrado!";
    exit;
}

// Verificar se o formulário foi enviado via POST para deletar o pedido
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Deletar o pedido
    $bll->Delete($id);
    echo "Pedido deletado com sucesso!";
    header('Location: ../menu/menu.php'); // Ajuste o caminho conforme necessário
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar Pedido</title>
    <link rel="stylesheet" href="./style.css">
    <style>
        /* Estilos CSS para a página de deleção podem ser adicionados aqui */
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
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h2 {
            margin-top: 0;
            color: #333;
        }

        p {
            color: #666;
            margin-bottom: 20px;
        }

        .confirm-form {
            margin-top: 20px;
        }

        .confirm-form input[type="submit"] {
            background-color: #ff2929;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .confirm-form input[type="submit"]:hover {
            background-color: #cc0000;
        }
    </style>
</head>
<body>


    <div class="container">
        <h2>Deletar Pedido</h2>
        <p>Tem certeza que deseja deletar o pedido <?php echo $pedido->getId(); ?>?</p>

        <form action="deletarPedido.php?id=<?php echo $pedido->getId(); ?>" method="post" class="confirm-form">
            <input type="submit" value="Deletar Pedido">
        </form>
    </div>
</body>
</html>
