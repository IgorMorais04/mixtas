<?php
// Inclua seus arquivos PHP necessários aqui
include_once 'C:/XAMPP/htdocs/mixtas/BLL/bllFornecedor.php';
include_once 'C:/XAMPP/htdocs/mixtas/MODEL/modelFornecedor.php';

use BLL\bllFornecedor;
use MODEL\fornecedor;

// Verifique se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Receba os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];

    // Crie uma nova instância do modelo
    $fornecedor = new fornecedor();
    $fornecedor->setNome($nome);
    $fornecedor->setEmail($email);
    $fornecedor->setTelefone($telefone);
    $fornecedor->setEndereco($endereco);

    // Crie uma nova instância da BLL e insira o novo fornecedor
    $bll = new bllFornecedor();
    $bll->Insert($fornecedor);

    // Após o insert, redirecione para outra página
    header("Location: ../menuMain/indexFornecedor.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserir Fornecedor</title>
    <link rel="stylesheet" href="./style.css">
    <style>
        /* Estilos do Loader */
        .loader-wrapper {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: none; /* Inicia oculto */
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        .loader {
            border: 8px solid #f3f3f3; /* Cinza claro */
            border-top: 8px solid #dc3545; /* Vermelho */
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .nome-content input,
        .email-content input,
        .telefone-content input,
        .endereco-content input {
            width: 400px;
            height: 50px;
        }

        .specific-name-prop{
    position: relative;
    left: 520px;
    top: 80px;
    font-size: 23px;
}
    </style>
</head>

<body>
    <!-- Elemento de carregamento -->
    <div class="loader-wrapper" id="loader">
        <div class="loader"></div>
    </div>

    <!-- Cabeçalho -->
    <header class="header-content">
        <div class="img-content">
            <img src="../../../Mixtas_files/logo.svg" alt="logo mixtas">
        </div>
        <div class="inform-content">
            <button class="Voltar">&lt; Voltar</button>
            <button class="Sair">Sair</button>
        </div>
    </header>
 
    <hr>
    <!-- Título da página -->
    <span class="specific-name-prop">
        INSERIR FORNECEDOR
    </span>

    <!-- Formulário de inserção de fornecedor -->
    <div class="formulario-content">
        <form id="formulario" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="content-form">
                <div class="nome-content">
                    <input type="text" name="nome" id="nome" placeholder="    Nome do fornecedor" required>
                </div>
                <div class="email-content">
                    <input type="email" name="email" id="email" placeholder="    E-mail do fornecedor">
                </div>
                <div class="telefone-content">
                    <input type="tel" name="telefone" id="telefone" placeholder="    Telefone do fornecedor">
                </div>
                <div class="endereco-content">
                    <input type="text" name="endereco" id="endereco" placeholder="    Endereço do fornecedor">
                </div>
                <div class="button-content">
                    <button class="button-send" type="button" onclick="showLoader()">Enviar</button>
                    <button class="button-clean" type="reset">Limpar</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Scripts necessários -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script>
        // Função para mostrar o loader e enviar o formulário após 10 segundos
        function showLoader() {
            document.getElementById('loader').style.display = 'flex'; // Mostra o loader
            setTimeout(function() {
                document.getElementById('formulario').submit(); // Envia o formulário após 10 segundos
            }, 10000); // 10000 milissegundos = 10 segundos
        }
    </script>
</body>

</html>
