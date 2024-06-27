<?php
// Incluir os arquivos necessários
include_once 'C:/XAMPP/htdocs/mixtas/BLL/bllFornecedor.php';
include_once 'C:/XAMPP/htdocs/mixtas/MODEL/modelFornecedor.php';

use BLL\bllFornecedor;

// Criar uma instância da BLL e recuperar a lista de fornecedores
$bll = new bllFornecedor();
$fornecedores = $bll->Select();

// Processar deleção do fornecedor
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
    $id = $_POST['delete_id'];
    $bll->Delete($id);
    // Redirecionar para evitar reenvio do formulário
    header("Location: {$_SERVER['PHP_SELF']}");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fornecedores</title>
    <link rel="stylesheet" href="./style.css">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap");

        body {
            font-family: 'Roboto', sans-serif;
            /* background-color: #f0f0f0; */
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 900px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .table-container {
            margin-top: 20px;
            overflow-x: auto;
            /* Adicionado para rolagem horizontal */
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: #fff;
            font-weight: bold;
            text-transform: uppercase;
        }

        td {
            background-color: #fff;
        }

        .table-actions {
            text-align: center;
        }

        .btn {
            padding: 8px 12px;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            font-size: 14px;
            text-transform: uppercase;
        }

        .btn-edit {
            background-color: #28a745;
            color: #fff;
            margin-right: 5px;
        }

        .btn-edit:hover {
            background-color: #218838;
        }

        .btn-delete {
            background-color: #dc3545;
            color: #fff;
        }

        .btn-delete:hover {
            background-color: #c82333;
        }

        .header-content {
            display: flex;
            align-items: center;
            justify-content: space-around;
            margin: 20px;
        }


        .Voltar,
        .Sair {
            border: none;
            font-size: 16px;
            background-color: white;
        }

        /* Define a animação */
        @keyframes colorChange {
            0% {
                color: initial;
            }

            100% {
                color: red;
            }
        }

        .Voltar:hover,
        .Sair:hover {
            color: red;
            animation: colorChange .2s ease-in-out;
        }

        .img-content img {
            width: 130px;
            height: auto;
        }

        .inform-content {
            display: flex;
            gap: 60px;
        }

        .inserir-button{
            position:relative;
            left: 350px;
            list-style: none;
            list-style-type: none;
            border: none;
            background-color: red;
            color: white;
            width: 150px;
            height: 40px;
            top: 50px;
            cursor: pointer;
        }


        .inserir-button:hover{
            transform: scale(1.1);
        }
    </style>
</head>

<body>
    <header class="header-content">
        <div class="img-content">
            <img src="../../../Mixtas_files/logo.svg" alt="logo mixtas">
        </div>
        <div class="inform-content">
            <button class="Voltar" style="font-family: Outfit;">&lt; Voltar</button>
            <button class="Sair" style="font-family: Outfit;">Sair</button>
        </div>
    </header>
    <br> <hr>
    <button class="inserir-button" onclick="red()">
        Inserir Fornecedor
    </button>
    <script>
        function red() {
            window.location.href = '../inserir/inserirFornecedor.php'
        }
    </script>
    <br> <br>
    <div class="container">
        <h2>Listagem de Fornecedores</h2>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Telefone</th>
                        <th>Endereço</th>
                        <th class="table-actions">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($fornecedores as $fornecedor) { ?>
                        <tr>
                            <td><?php echo $fornecedor->getId(); ?></td>
                            <td><?php echo $fornecedor->getNome(); ?></td>
                            <td><?php echo $fornecedor->getEmail(); ?></td>
                            <td><?php echo $fornecedor->getTelefone(); ?></td>
                            <td><?php echo $fornecedor->getEndereco(); ?></td>
                            <td class="table-actions">
                                <a href="../editar/editarFornecedor.php?id=<?php echo $fornecedor->getId(); ?>" class="btn btn-edit">Editar</a>
                                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" style="display: inline-block;">
                                    <input type="hidden" name="delete_id" value="<?php echo $fornecedor->getId(); ?>">
                                    <button type="submit" class="btn btn-delete">Deletar</button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>