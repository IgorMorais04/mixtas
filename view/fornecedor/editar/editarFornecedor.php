<?php
// Incluir os arquivos necessários
include_once 'C:/XAMPP/htdocs/mixtas/BLL/bllFornecedor.php';
include_once 'C:/XAMPP/htdocs/mixtas/MODEL/modelFornecedor.php';

use BLL\bllFornecedor;
use MODEL\fornecedor;

// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Receber os dados do formulário
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];

    // Criar uma nova instância do modelo
    $fornecedor = new fornecedor();
    $fornecedor->setId($id);
    $fornecedor->setNome($nome);
    $fornecedor->setEmail($email);
    $fornecedor->setTelefone($telefone);
    $fornecedor->setEndereco($endereco);

    // Criar uma nova instância da BLL e atualizar o fornecedor
    $bll = new bllFornecedor();
    $bll->Update($fornecedor);

    // Redirecionar para uma página de sucesso ou exibir uma mensagem
    echo "Fornecedor atualizado com sucesso!";
} else {
    // Caso seja uma requisição GET, preencher o formulário com os dados do fornecedor
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $fornecedor = (new bllFornecedor())->SelectID($id);

        if (!$fornecedor) {
            // Fornecedor não encontrado, redirecionar ou exibir mensagem de erro
            echo "Fornecedor não encontrado!";
            exit;
        }
    } else {
        // ID não fornecido, redirecionar ou exibir mensagem de erro
        echo "ID do fornecedor não fornecido!";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Fornecedor</title>
    <link rel="stylesheet" href="./style.css">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap");

        /* Estilos específicos para o formulário de edição de fornecedor */
        .nome-content input,
        .email-content input,
        .telefone-content input,
        .endereco-content input {
            width: 400px;
            height: 50px;
        }

        .specific-name-prop {
            position: relative;
            left: 520px;
            top: 80px;
            font-size: 23px;
            font-family: 'Outfit', sans-serif;
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
    <span class="specific-name-prop">
        EDITAR FORNECEDOR
    </span>
    <div class="formulario-content">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="content-form">
                <input type="hidden" name="id" value="<?php echo $fornecedor->getId(); ?>">
                <div class="nome-content">
                    <input type="text" name="nome" id="nome" placeholder="Nome do fornecedor" value="<?php echo $fornecedor->getNome(); ?>" required>
                </div>
                <div class="email-content">
                    <input type="email" name="email" id="email" placeholder="E-mail do fornecedor" value="<?php echo $fornecedor->getEmail(); ?>">
                </div>
                <div class="telefone-content">
                    <input type="tel" name="telefone" id="telefone" placeholder="Telefone do fornecedor" value="<?php echo $fornecedor->getTelefone(); ?>">
                </div>
                <div class="endereco-content">
                    <input type="text" name="endereco" id="endereco" placeholder="Endereço do fornecedor" value="<?php echo $fornecedor->getEndereco(); ?>">
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
