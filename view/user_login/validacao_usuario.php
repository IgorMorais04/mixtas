<?php
session_start();

include_once 'C:/XAMPP/htdocs/mixtas/BLL/bllUserLogin.php';
include_once 'C:/XAMPP/htdocs/mixtas/MODEL/modelUserLogin.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = trim($_POST['username']);
    $senha = trim($_POST['password']);

    $bll = new \BLL\bllUserLogin();

    $objUsuario = $bll->SelectUserLogin($usuario); // Passando o $usuario para SelectUserLogin

    if ($objUsuario != null) {
        if (password_verify($senha, $objUsuario->getSenhaUser())) {
            $_SESSION['login'] = $objUsuario->getEmailUser();

            $nome_usuario = ucfirst(explode('@', $objUsuario->getEmailUser())[0]);

            // Armazenamos o nome de usuário na sessão
            $_SESSION['nome_usuario'] = $nome_usuario;

            ?>

            <!DOCTYPE html>
            <html lang="pt-br">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Login Efetuado</title>
                <style>
                    body {
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        height: 100vh;
                        background-color: #f8f9fa;
                        font-family: Arial, sans-serif;
                    }
                    .loader {
                        border: 8px solid #f3f3f3;
                        border-top: 8px solid #dc3545; /* Vermelho */
                        border-radius: 50%;
                        width: 50px;
                        height: 50px;
                        animation: spin 1s linear infinite;
                        margin: auto;
                    }
                    @keyframes spin {
                        0% { transform: rotate(0deg); }
                        100% { transform: rotate(360deg); }
                    }
                </style>
            </head>
            <body>
                <div class="loader"></div> <!-- Loader centralizado -->

                <script>
                    setTimeout(function() {
                        window.location.href = "../../Mixtas.php";
                    }, 10000); // 10000 milissegundos = 10 segundos
                </script>
            </body>
            </html>

            <?php
            exit();
        } else {
            echo '<script>window.location.href = "./error404/error404.html";</script>';
            exit();
        }
    } else {
        echo '<div class="container mt-5">';
        echo '  <div class="alert alert-danger text-center">';
        echo '      <h4 class="alert-heading">Usuário não encontrado</h4>';
        echo '      <p>Verifique seus dados e tente novamente.</p>';
        echo '  </div>';
        echo '</div>';
    }
}
?>
