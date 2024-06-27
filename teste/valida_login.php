<?php
session_start();

include_once 'C:/XAMPP/htdocs/mixtas/BLL/bllUserLogin.php';
include_once 'C:/XAMPP/htdocs/mixtas/MODEL/modelUserLogin.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);

    $bll = new \BLL\bllUserLogin();
    $objUsuario = $bll->SelectUserLogin($email);

    if ($objUsuario != null) {
        if (password_verify($senha, $objUsuario->getSenhaUser())) {
            // Extraímos o nome de usuário do email
            $nome_usuario = explode('@', $objUsuario->getEmailUser())[0];

            // Armazenamos o nome de usuário na sessão
            $_SESSION['nome_usuario'] = $nome_usuario;

            // Redireciona para a página de boas-vindas
            header('Location: welcome.php');
            exit();
        } else {
            // Redireciona de volta para o formulário com mensagem de erro
            header('Location: index.php?erro=senha');
            exit();
        }
    } else {
        // Redireciona de volta para o formulário com mensagem de erro
        header('Location: index.php?erro=email');
        exit();
    }
}
?>
