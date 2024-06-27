<?php
// Incluir os arquivos necessários
include_once 'C:/XAMPP/htdocs/mixtas/BLL/bllMovEstoque.php';
include_once 'C:/XAMPP/htdocs/mixtas/MODEL/modelMovEstoque.php';

use BLL\bllMovEstoque;
use MODEL\movEstoque;

// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Receber os dados do formulário
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $categoria = $_POST['categoria'];
    $valor = $_POST['valor'];

    // Verificar se um arquivo de imagem foi enviado
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
        $imagemTmp = file_get_contents($_FILES['imagem']['tmp_name']);
        $imagemBase64 = base64_encode($imagemTmp); // Converter a imagem para base64
    } else {
        // Caso contrário, manter a imagem existente (se houver)
        $produtoExistente = (new bllMovEstoque())->SelectID($id);
        $imagemBase64 = $produtoExistente->getImagem();
    }

    // Criar uma nova instância do modelo
    $estoque = new movEstoque();
    $estoque->setId($id);
    $estoque->setNome($nome);
    $estoque->setCategoria($categoria);
    $estoque->setValor((float)$valor);
    $estoque->setImagem($imagemBase64); // Definir a imagem base64

    // Criar uma nova instância da BLL e atualizar o produto
    $bll = new bllMovEstoque();
    $bll->Update($estoque);

    // Redirecionar para uma página de sucesso ou exibir uma mensagem
    echo "Produto atualizado com sucesso!";
    header("Location: ../menuMain/indexMovEstoque.php");
    exit();
} else {
    // Caso seja uma requisição GET, preencher o formulário com os dados do produto
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $produto = (new bllMovEstoque())->SelectID($id);

        if (!$produto) {
            // Produto não encontrado, redirecionar ou exibir mensagem de erro
            echo "Produto não encontrado!";
            exit;
        }
    } else {
        // ID não fornecido, redirecionar ou exibir mensagem de erro
        echo "ID do produto não fornecido!";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Estoque</title>
    <link rel="stylesheet" href="./style.css">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap");
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
        EDITAR PRODUTO
    </span>
    <div class="formulario-content">
        <form action="editarMovEstoque.php" method="post" enctype="multipart/form-data">
            <div class="content-form">
                <input type="hidden" name="id" value="<?php echo $produto->getId(); ?>">
                <div class="nome-content">
                    <input type="text" name="nome" id="nome" placeholder="    Nome do produto" value="<?php echo $produto->getNome(); ?>" required>
                </div>
                <div class="categoria-content">
                    <input type="text" name="categoria" id="categoria" placeholder="    Categoria do produto" value="<?php echo $produto->getCategoria(); ?>" required>
                </div>
                <div class="valor-content">
                    <input type="number" name="valor" id="valor" step="0.01" placeholder="    Valor do produto" value="<?php echo $produto->getValor(); ?>" required>
                </div>
                <div class="imagem-content">
                    <label for="imagem" style="font-family: Outfit;">Imagem</label>
                    <input type="file" name="imagem" id="imagem">
                </div>
                <div class="button-content">
                    <button class="button-send" type="submit">Enviar</button>
                    <button class="button-clean" type="reset">Limpar</button>
                </div>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
