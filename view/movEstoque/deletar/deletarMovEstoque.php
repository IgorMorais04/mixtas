<?php
// Incluir os arquivos necessários
include_once 'C:/XAMPP/htdocs/mixtas/BLL/bllMovEstoque.php';
include_once 'C:/XAMPP/htdocs/mixtas/MODEL/modelMovEstoque.php';

use BLL\bllMovEstoque;
use MODEL\movEstoque;

// Verificar se o ID do produto foi fornecido via GET
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Criar uma nova instância da BLL e buscar o produto pelo ID
    $bll = new bllMovEstoque();
    $produto = $bll->SelectID($id);

    if (!$produto) {
        // Produto não encontrado, redirecionar ou exibir mensagem de erro
        echo "Produto não encontrado!";
        exit;
    }
} else {
    // ID não fornecido via GET, redirecionar ou exibir mensagem de erro
    echo "ID do produto não fornecido!";
    exit;
}

// Verificar se o formulário foi enviado (confirmação de exclusão)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['confirmar'])) {
        // Se o botão 'Confirmar Exclusão' foi clicado
        $id = $_POST['id'];

        // Criar uma nova instância do modelo
        $estoque = new movEstoque();
        $estoque->setId($id);

        // Criar uma nova instância da BLL e excluir o produto
        $bll = new bllMovEstoque();
        $bll->Delete($id);

        // Redirecionar para uma página de sucesso ou exibir uma mensagem
        echo "Produto excluído com sucesso!";
        header("Location: ../menuMain/indexMovEstoque.php");
        exit();
    } elseif (isset($_POST['cancelar'])) {
        // Se o botão 'Cancelar' foi clicado
        echo "Exclusão cancelada!";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar Exclusão de Produto</title>
    <link rel="stylesheet" href="./style.css">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap");
        
        /* Estilo personalizado para os botões */
        .button-confirmar {
            background-color: #E53E3E; /* Vermelho */
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            font-family: 'Outfit';
            font-size: 16px;
            margin-right: 10px;
            margin-top: 20px;
        }

        .button-cancelar {
            background-color: #1A202C; /* Preto */
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            font-family: 'Outfit';
            font-size: 16px;
            margin-top: 20px;
        }

        .confirmacao-content {
            position: relative;
            left: 485px;
            top: 120px;
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
    <hr>
    <span class="specific-name-prop" style="font-family: Outfit;">
        CONFIRMAR EXCLUSÃO DE PRODUTO
    </span>
    <div class="confirmacao-content">
        <p style="font-family: Outfit;">Você tem certeza que deseja excluir o produto abaixo?</p>
        <p><strong>Nome:</strong> <?php echo $produto->getNome(); ?></p>
        <p><strong>Categoria:</strong> <?php echo $produto->getCategoria(); ?></p>
        <p><strong>Valor:</strong> R$ <?php echo number_format($produto->getValor(), 2, ',', '.'); ?></p>

        <form action="deletarMovEstoque.php?id=<?php echo $produto->getId(); ?>" method="post">
            <input type="hidden" name="id" value="<?php echo $produto->getId(); ?>">
            <button class="button-confirmar" type="submit" name="confirmar">Confirmar Exclusão</button>
            <button class="button-cancelar" type="submit" name="cancelar">Cancelar</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
