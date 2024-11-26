<?php
// Login está funcionando
require_once "header.php";
$msgErr = '';
global $msgErr;

if ($_POST) {
    $usuario = new Usuario(email_usuario: $_POST['email'], senha_usuario: $_POST['senha']);
    $usuarioDAO = new UsuarioDAO($pdo);

    $pass = $usuario->getSenha();
    $user = $usuarioDAO->buscarPorEmail($usuario)[0];

    if(password_verify(
        $pass,
        $user->senha_usuario
        )
    ) {
        // Criação das variáveis de sessão
        $_SESSION['user_id'] = $user->id_usuario; // Salva o id do usuário
        $_SESSION['user_name'] = $user->nomecomp_usuario; // Salva o nome do usuário
        $_SESSION['user_email'] = $user->email_usuario; // Salva o nome do usuário
        $_SESSION['user_is_adm'] = 0; // Se o usuário for ADM partes 
        header('location: index.php');
    } else {
        $msgErr = "Email ou senha incorretos!";
    } 

    if (isset($_SESSION['saved_id'])) {
        header('location: add_carrinho.php');
    }
} 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    
<div id="conteudo">
        <img class="logoVertical" src="../Images/logoEmPe.png" alt="Logo">
        <h1>Entre ou Cadastre-se</h1>
        <form method="post">
            <label for="email">Email:</label>
            <input class="email" type="text" id="email" name="email" placeholder="E-mail" required>

            <label for="senha"></label>
            <input class="email" type="password" id="senha" name="senha" placeholder="Senha" required>

            <p>ou</p>

            <button class="btn_google" type="button">
                <img src="../Images/google.jpg" alt="Google Login">
            </button>

            <div class="botoes">
                <button class="btn_criarAcc" type="button" onclick="window.location.href='registro.php'">Criar conta</button>
                <button class="btn_entrar" type="submit">Entrar</button>
            </div>
        </form>
    </div>
</body>
</html>