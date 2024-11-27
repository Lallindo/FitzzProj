<?php
require_once "header.php";

var_dump($_REQUEST);
$usuarioDAO = new UsuarioDAO($pdo);
$enderecos = $usuarioDAO->buscarEndereco(new Usuario($_SESSION['user_id']));

ini_set("allow_url_fopen", 1);

$retorno = json_decode(file_get_contents("https://viacep.com.br/ws/{$_REQUEST['cep']}/json/"));

if ($retorno->erro) {
    header('location:perfil.php');
} else {
    $usuarioDAO->alterarEnd(new Usuario(id_usuario: $_SESSION['user_id'], id_endereco: $enderecos[$_REQUEST['id']]->id_endereco, padrao_end:0, rua_end: $_REQUEST['rua'], bairro_end: $_REQUEST['bairro'], cidade_end: $retorno->localidade, estado_end: $retorno->uf, cep_end: $_REQUEST['cep']));
}