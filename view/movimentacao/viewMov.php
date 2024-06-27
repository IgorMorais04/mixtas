<?php
// Inclui os arquivos necessários
require_once 'C:\XAMPP\htdocs\mixtas\MODEL\modelMovimentacao.php';
require_once 'C:\XAMPP\htdocs\mixtas\DAL\dalMovimentacao.php';
require_once 'C:\XAMPP\htdocs\mixtas\BLL\bllMovimentacao.php';

// Configurações do banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mixtas";

// Conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica se houve erro na conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Instancia a DAL e a BLL
$movimentacaoDAL = new MovimentacaoDAL($conn);
$movimentacaoBLL = new MovimentacaoBLL($movimentacaoDAL);

// Lista todas as movimentações
$movimentacoes = $movimentacaoBLL->listarMovimentacoes();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movimentações de Estoque</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background-color: #fff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        table th,
        table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }

        table th {
            background-color: #f2f2f2;
            color: #333;
            text-transform: uppercase;
        }

        table td {
            background-color: #fff;
            color: #666;
        }

        table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table tbody tr:hover {
            background-color: #f2f2f2;
        }

        svg{
            cursor: pointer;
        }
    </style>
</head>

<body>
    <h1>Movimentações de Estoque</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>ID Estoque</th>
                <th>Quantidade</th>
                <th>Valor</th>
                <th>Data Movimentação</th>
                <th>Pagamento</th>
                <th>-</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($movimentacoes) > 0) : ?>
                <?php foreach ($movimentacoes as $movimentacao) : ?>
                    <tr>
                        <td><?php echo htmlspecialchars($movimentacao->id); ?></td>
                        <td><?php echo htmlspecialchars($movimentacao->id_estoque); ?></td>
                        <td><?php echo htmlspecialchars($movimentacao->quantidade); ?></td>
                        <td><?php echo htmlspecialchars($movimentacao->valor); ?></td>
                        <td><?php echo htmlspecialchars($movimentacao->data_movimentacao); ?></td>
                        <td><?php echo htmlspecialchars($movimentacao->pagamento); ?></td>
                        <td><svg onclick="redirecionar()" xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 0 24 24" width="48px" fill="#75FB4C">
                                <path d="M0 0h24v24H0z" fill="none" />
                                <path d="M11.8 10.9c-2.27-.59-3-1.2-3-2.15 0-1.09 1.01-1.85 2.7-1.85 1.78 0 2.44.85 2.5 2.1h2.21c-.07-1.72-1.12-3.3-3.21-3.81V3h-3v2.16c-1.94.42-3.5 1.68-3.5 3.61 0 2.31 1.91 3.46 4.7 4.13 2.5.6 3 1.48 3 2.41 0 .69-.49 1.79-2.7 1.79-2.06 0-2.87-.92-2.98-2.1h-2.2c.12 2.19 1.76 3.42 3.68 3.83V21h3v-2.15c1.95-.37 3.5-1.5 3.5-3.55 0-2.84-2.43-3.81-4.7-4.4z" />
                            </svg></td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="6">Nenhuma movimentação encontrada.</td>
                </tr>
            <?php endif; ?>
        </tbody>
        <script>
            function redirecionar() {
                window.location.href = './viewMovEs.php'
            }
        </script>
    </table>
</body>

</html>

<?php
// Fecha a conexão
$conn->close();
?>