<?php
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

// Função para gerar uma data aleatória entre duas datas
function randomDate($startDate, $endDate) {
    $timestampStart = strtotime($startDate);
    $timestampEnd = strtotime($endDate);
    $randomTimestamp = mt_rand($timestampStart, $timestampEnd);
    return date("Y-m-d", $randomTimestamp);
}

// Obtém todos os IDs existentes na tabela `estoque`
$estoque_ids = array();
$result = $conn->query("SELECT id FROM estoque");
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $estoque_ids[] = $row['id'];
    }
} else {
    die("Nenhum ID encontrado na tabela `estoque`.");
}

// Número de entradas aleatórias para inserir
$numEntradas = 20;

for ($i = 0; $i < $numEntradas; $i++) {
    // Gera dados aleatórios
    $id_estoque = $estoque_ids[array_rand($estoque_ids)]; // Seleciona um ID aleatório dos IDs existentes
    $quantidade = rand(1, 100);
    $valor = rand(10, 1000) / 10; // Gera valores entre 1.0 e 100.0
    $data_movimentacao = randomDate("2020-01-01", "2023-12-31");
    $pagamento = rand(10, 1000) / 10; // Gera valores entre 1.0 e 100.0

    // Insere a nova movimentação na tabela de movimentacao
    $stmt = $conn->prepare("INSERT INTO movimentacao (id_estoque, quantidade, valor, data_movimentacao, pagamento) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("iidss", $id_estoque, $quantidade, $valor, $data_movimentacao, $pagamento);
    if ($stmt->execute()) {
        echo "Movimentação $i inserida com sucesso!<br>";
    } else {
        echo "Erro ao inserir a movimentação $i: " . $stmt->error . "<br>";
    }
}

// Fecha a conexão
$stmt->close();
$conn->close();
?>
