<?php
// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validação básica do ID da movimentação
    $id_movimentacao = $_POST['id_movimentacao'] ?? null;
    if (!$id_movimentacao) {
        die("ID da movimentação não foi fornecido.");
    }
    
    // Nova quantidade vinda do formulário
    $nova_quantidade = $_POST['nova_quantidade'] ?? null;
    if (!$nova_quantidade) {
        die("Nova quantidade não foi fornecida.");
    }
    
    // Conectar ao banco de dados (substitua com suas credenciais)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mixtas";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }
    
    // Busca a movimentação atual no banco de dados
    $stmt = $conn->prepare("SELECT quantidade FROM movimentacao WHERE id = ?");
    $stmt->bind_param("i", $id_movimentacao);
    $stmt->execute();
    $stmt->bind_result($quantidade_atual);
    $stmt->fetch();
    $stmt->close();
    
    if (!$quantidade_atual) {
        die("Movimentação não encontrada.");
    }
    
    // Calcula a nova quantidade subtraindo do valor atual
    $quantidade_atual -= $nova_quantidade;
    
    // Atualiza a movimentação no banco de dados
    $data_movimentacao = date('Y-m-d H:i:s'); // Data atual
    
    $stmt = $conn->prepare("UPDATE movimentacao SET quantidade = ?, data_movimentacao = ? WHERE id = ?");
    $stmt->bind_param("isi", $quantidade_atual, $data_movimentacao, $id_movimentacao);
    $stmt->execute();
    
    echo "Movimentação atualizada com sucesso!";
    header("Location: ./viewMov.php");
    exit(); // Certifique-se de que o script pare de ser executado após o redirecionamento
    $stmt->close();
    $conn->close();
}
?>
