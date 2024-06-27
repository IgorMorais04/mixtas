<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Atualizar Movimentação</title>
    <style>
        /* Estilos CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
            color: #666;
        }

        input[type=text], input[type=number] {
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            width: calc(100% - 20px); /* Ajuste para o padding */
        }

        input[type=submit] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            cursor: pointer; /* Mudar o cursor ao passar sobre o botão */
            border: none;
            border-radius: 4px;
            font-size: 16px;
            margin-top: 10px;
        }

        input[type=submit]:hover {
            background-color: #45a049; /* Mudar a cor de fundo ao passar o mouse */
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Atualizar Movimentação</h2>
        <form action="./atualizar_movimentacao.php" method="post">
            <label for="id_movimentacao">ID da Movimentação:</label><br>
            <input type="text" id="id_movimentacao" name="id_movimentacao" required><br><br>
            
            <label for="nova_quantidade">Nova Quantidade:</label><br>
            <input type="number" id="nova_quantidade" name="nova_quantidade" required><br><br>
            
            <input type="submit" value="Atualizar Movimentação">
        </form>
    </div>
</body>
</html>
