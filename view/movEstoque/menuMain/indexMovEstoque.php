<?php
// Incluir os arquivos necessários
include_once 'C:/XAMPP/htdocs/mixtas/BLL/bllMovEstoque.php';
include_once 'C:/XAMPP/htdocs/mixtas/MODEL/modelMovEstoque.php';

use BLL\bllMovEstoque;

// Criar uma instância da BLL e recuperar a lista de produtos
$bll = new bllMovEstoque();
$produtos = $bll->Select();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos em Estoque</title>
    <link rel="stylesheet" href="./style.css">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap");

        .container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            padding: 20px;
            margin-top: 80px;
        }

        .product-box {
            position: relative;
            /* Para posicionar as ações sobre a imagem */
            text-align: left;
            width: 200px;
            font-family: Outfit;
            cursor: pointer;
            margin-bottom: 30px; /* Adicionado para espaço entre os produtos */
            overflow: hidden; /* Para garantir que a imagem não ultrapasse a div */
        }

        .product-image-container {
            width: 100%;
            height: 200px;
            position: relative;
            /* Para posicionar as ações dentro deste container */
        }

        .product-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: opacity 0.2s ease; /* Transição de opacidade para suavizar a mudança */
        }

        .product-box:hover .product-image {
            opacity: 0.7; /* Reduz a opacidade da imagem ao passar o mouse */
        }

        .product-category {
            font-size: 12px;
            color: #888;
            margin: 8px 0;
        }

        .product-name {
            font-size: 16px;
            font-weight: 300;
            margin: 8px 0;
        }

        .product-price {
            font-size: 14px;
            color: #333;
        }

        .product-actions {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            /* Fundo escuro semi-transparente */
            display: flex;
            justify-content: center;
            align-items: center;
            opacity: 0;
            /* Inicialmente invisível */
            transition: opacity 0.3s ease;
            pointer-events: none;
            /* Para que não interfira nos cliques nos produtos */
        }

        .product-box:hover .product-actions {
            opacity: 1;
            /* Mostrar as ações quando o mouse estiver sobre o produto */
            pointer-events: auto;
            /* Habilita os eventos de clique quando visível */
        }

        .product-actions svg {
            width: 48px;
            height: 48px;
            margin: 5px;
            cursor: pointer;
        }

        .product-actions svg:hover {
            transform: scale(1.2); /* Efeito de escala para destacar o ícone */
        }

        .inserir-button{
            list-style: none;
            border: none;
            background-color: red;
            color: #fff;
            position:relative;
            top: 15px;
            width: 200px;
            height: 40px;
            right: 50px;
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
        PRODUTOS EM ESTOQUE
    </span>
    <button class="inserir-button" onclick="redirectPage()">
        Inserir Novo Produto
    </button>
    <script>
        function redirectPage() {
            window.location.href = '../inserir/inserirMovEstoque.php'
        }
    </script>
    <div class="container">
        <?php foreach ($produtos as $key => $produto) : ?>
            <div class="product-box" id="product-<?php echo $produto->getId(); ?>">
                <div class="product-image-container">
                    <?php if ($produto->getImagem()) : ?>
                        <img class="product-image" src="data:image/jpeg;base64,<?php echo $produto->getImagem(); ?>" alt="Imagem do Produto">
                    <?php else : ?>
                        <img class="product-image" src="placeholder-image-url" alt="Sem imagem">
                    <?php endif; ?>
                    <!-- Opções de ação (fora da imagem) -->
                    <div class="product-actions">
                        <svg class="edit-icon" data-product-id="<?php echo $produto->getId(); ?>" xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 0 24 24" width="48px" fill="#ffea80">
                            <path d="M0 0h24v24H0z" fill="none"/>
                            <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/>
                        </svg>
                        <svg class="delete-icon" data-product-id="<?php echo $produto->getId(); ?>" xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 0 24 24" width="48px" fill="#ff2929">
                            <path d="M0 0h24v24H0z" fill="none"/>
                            <path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/>
                        </svg>
                    </div>
                </div>
                <div class="product-category"><?php echo $produto->getCategoria(); ?></div>
                <div class="product-name"><?php echo $produto->getNome(); ?></div>
                <div class="product-price">R$ <?php echo number_format($produto->getValor(), 2, ',', '.'); ?></div>
            </div>
        <?php endforeach; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        // Função para redirecionar para a página de edição
        function editProduct(productId) {
            window.location.href = '../editar/editarMovEstoque.php?id=' + productId;
        }

        // Função para redirecionar para a página de deleção
        function deleteProduct(productId) {
            window.location.href = '../deletar/deletarMovEstoque.php?id=' + productId;
        }

        // Captura do clique nos ícones de edição e deleção
        document.querySelectorAll('.edit-icon').forEach(icon => {
            icon.addEventListener('click', function() {
                const productId = this.getAttribute('data-product-id');
                editProduct(productId);
            });
        });

        document.querySelectorAll('.delete-icon').forEach(icon => {
            icon.addEventListener('click', function() {
                const productId = this.getAttribute('data-product-id');
                deleteProduct(productId);
            });
        });
    </script>
</body>

</html>
