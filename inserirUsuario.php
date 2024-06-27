<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Registro</title>
</head>
<body>
    <h2>Formulário de Registro</h2>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Configurações do banco de dados
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "mixtas";

        // Cria a conexão
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verifica a conexão
        if ($conn->connect_error) {
            die("Conexão falhou: " . $conn->connect_error);
        }

        // Obtém os dados do formulário
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        // Hash da senha usando bcrypt
        $senha_hash = password_hash($senha, PASSWORD_BCRYPT);

        // Prepara e executa a query de inserção
        $stmt = $conn->prepare("INSERT INTO usuarios (email_user, senha_user) VALUES (?, ?)");
        $stmt->bind_param("ss", $email, $senha_hash);

        if ($stmt->execute() === TRUE) {
            echo "Novo registro criado com sucesso";
        } else {
            echo "Erro: " . $stmt->error;
        }

        // Fecha a conexão
        $stmt->close();
        $conn->close();
    }
    ?>

    <form action="inserirUsuario.php" method="POST">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br><br>
        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required>
        <br><br>
        <input type="submit" value="Registrar">
    </form>
</body>
</html>
