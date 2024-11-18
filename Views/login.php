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
        $_SESSION['user_is_adm'] = 0; // Se o usuário for ADM partes 
        header('location: index.php');
    } else {
        $msgErr = "Email ou senha incorretos!";
    } 

    var_dump($_SESSION['user_id']);
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
    
    <h1 class="text-center">Login</h1>
    
    <form class="row mx-5 align-items-center" method="post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        
        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required>
        <span class="span text-center"><?php echo $msgErr ?></span>

        <button class="my-2" type="submit">Login</button>
    </form> 
</body>
</html>