<?php
// Inclua seus arquivos PHP necessários aqui
include_once 'C:/XAMPP/htdocs/mixtas/BLL/bllMovEstoque.php';
include_once 'C:/XAMPP/htdocs/mixtas/MODEL/modelMovEstoque.php';

use BLL\bllMovEstoque;
use MODEL\movEstoque;


// Verifique se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Receba os dados do formulário
    $nome = $_POST['nome'];
    $categoria = $_POST['categoria'];
    $valor = $_POST['valor'];

    // Verifique se um arquivo de imagem foi enviado
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
        $imagemTmp = file_get_contents($_FILES['imagem']['tmp_name']);
        $imagemBase64 = base64_encode($imagemTmp); // Converta a imagem para base64
    } else {
        $imagemBase64 = null; // Defina como null se não houver imagem
    }

    // Crie uma nova instância do modelo
    $estoque = new movEstoque();
    $estoque->setNome($nome);
    $estoque->setCategoria($categoria);
    $estoque->setValor((float)$valor);
    $estoque->setImagem($imagemBase64); // Defina a imagem base64

    // Crie uma nova instância da BLL e insira o novo produto
    $bll = new bllMovEstoque();
    $bll->Insert($estoque);

        // Após o insert, redirecione para outra página
        header("Location: ../menuMain/indexMovEstoque.php");
        exit(); // Certifique-se de que o script pare de ser executado após o redirecionamento
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserir Estoque</title>
    <link rel="stylesheet" href="./style.css">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap");

        /* Estilos do loader */
        .loader-wrapper {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            display: none; /* Inicia oculto */
        }

        .loader {
            border: 8px solid #f3f3f3;
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
    </style>
</head>
<body>
    <div class="loader-wrapper" id="loader">
        <div class="loader"></div>
    </div>

    <header class="header-content">
        <div class="img-content">
            <img src="../../../Mixtas_files/logo.svg" alt="logo mixtas">
        </div>
        <div class="inform-content">
            <button class="Voltar" style="font-family: Outfit;">&lt; Voltar</button>
            <button class="Sair" style="font-family: Outfit;">Sair</button>
        </div>
    </header>
    <hr>
    <span class="specific-name-prop" style="font-family: Outfit;">
        INSERIR PRODUTO
    </span>
    <div class="formulario-content">
        <form id="formulario" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
            <div class="content-form">
                <div class="nome-content">
                    <input type="text" name="nome" id="nome" placeholder="    Nome do produto" required>
                </div>
                <div class="categoria-content">
                    <input type="text" name="categoria" id="categoria" placeholder="    Categoria do produto" required>
                </div>
                <div class="valor-content">
                    <input type="number" name="valor" id="valor" step="0.01" placeholder="    Valor do produto" required>
                </div>
                <div class="imagem-content">
                    <label for="imagem" style="font-family: Outfit;">Imagem</label>
                    <input type="file" name="imagem" id="imagem">
                </div>
                <div class="button-content">
                    <button class="button-send" type="button" onclick="showLoader()">Enviar</button>
                    <button class="button-clean" type="reset">Limpar</button>
                </div>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function showLoader() {
            document.getElementById('loader').style.display = 'flex'; // Mostra o loader

            setTimeout(function() {
                document.getElementById('formulario').submit(); // Envia o formulário após 10 segundos
            }, 10000); // 10000 milissegundos = 10 segundos
        }
    </script>
</body>
</html>
