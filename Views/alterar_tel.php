<?php
require_once "header.php";

echo "<br><br><br><br><br><br><br><br>";

$usuarioDAO = new UsuarioDAO($pdo);
$telefones = $usuarioDAO->buscarTelefone(new Usuario($_SESSION['user_id']));
$telefone_mud = new Telefone($telefones[(int) $_REQUEST['id']]->id_telefone, $_REQUEST['value']);

$usuarioAlt = new Usuario($_SESSION['user_id'], '', '', '', '', '', '', $telefone_mud->getId(), $telefone_mud->getNum(), '', '', '', '', '');

$usuarioDAO->alterarTel($usuarioAlt);

header('location:perfil.php');
?>