<?php
require_once 'header.php';
$id_item = $_REQUEST['id_item'];

$item = new Item($id_item);
$itemDAO = new ItemDAO($pdo);

$itemDAO->remover($item);

header('location: carrinho.php');
?>