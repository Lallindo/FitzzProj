<?php
require_once "header.php";

var_dump($_REQUEST);
$usuarioDAO = new UsuarioDAO($pdo);
$enderecos = $usuarioDAO->buscarEndereco(new Usuario($_SESSION['user_id']));

if (sizeof($enderecos) <= 1) {
    header('location:perfil.php');
} else {
    $usuarioDAO->removerEnd(new Usuario(id_usuario: $_SESSION['user_id'], id_endereco: $enderecos[$_REQUEST['id']]->id_endereco));
}