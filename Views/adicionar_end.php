<?php
require_once 'header.php';

var_dump($_REQUEST);
$usuarioDAO = new UsuarioDAO($pdo);

ini_set("allow_url_fopen", 1);

$retorno = json_decode(file_get_contents("https://viacep.com.br/ws/{$_REQUEST['cep']}/json/"));

if ($retorno->erro) {
    header('location:perfil.php');
} else {
    $usuario = new Usuario($_SESSION['user_id']);

}



?>