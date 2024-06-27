<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['nome_usuario'])) {
    header('Location: index.php');
    exit();
}

$nome_usuario = $_SESSION['nome_usuario'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem-vindo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Bem-vindo</div>
                    <div class="card-body">
                        <h4 class="card-title">Olá, <?php echo htmlspecialchars($nome_usuario); ?>!</h4>
                        <p class="card-text">Seja bem-vindo à sua página.</p>
                        <a href="logout.php" class="btn btn-primary">Sair</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
