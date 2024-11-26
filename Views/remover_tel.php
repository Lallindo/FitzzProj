<?php
require_once 'header.php';

echo "<br><br><br><br><br><br>";

var_dump($_SESSION);
var_dump($_REQUEST);

$usuarioDAO = new UsuarioDAO($pdo);

$telefones = $usuarioDAO->buscarTelefone(new Usuario($_SESSION['user_id']));

if (sizeof($telefones) <= 1) {
    header('location:perfil.php');
} else {
    $usuarioAlt = new Usuario($_SESSION['user_id'], '', '', '', '', '', '', $telefones[(int) $_REQUEST['id']]->id_telefone, '', '', '', '', '', '', '', 0);
    $usuarioDAO->removerTel($usuarioAlt);
    var_dump($usuarioAlt);
}

header('location:perfil.php');
?>