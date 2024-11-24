<?php
require_once 'header.php';
$pedido = new Pedido($_REQUEST['id_ped']);

$pedidoDAO = new PedidoDAO($pdo);
$retorno = $pedidoDAO->buscarPorId($pedido);

var_dump($retorno[0]->id_item_pedido);

$item = new Item($retorno[0]->id_item_pedido);
$itemDAO = new ItemDAO($pdo);

var_dump($item);

$itemDAO->remover($item);   
$pedidoDAO->remover($pedido);

header('location: carrinho.php');
?>