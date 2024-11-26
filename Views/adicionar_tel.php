<?php
require_once 'header.php';

echo "<br><br><br><br><br><br><br><br><br>";

var_dump($_REQUEST);

if (strlen($_REQUEST['value']) < 11) {
    header('location: perfil.php');
} else {
    $usuarioDAO = new UsuarioDAO($pdo);
    $usuario = new Usuario($_SESSION['user_id'], '', '', '', '', '', '', 0, $_REQUEST['value'], '', '', '', '', '', '', 0);
    $usuarioDAO->adicionarTel($usuario);
    header('location: perfil.php');
}



// $usuarioDAO->adicionarTel()

?>