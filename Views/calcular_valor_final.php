<?php
require_once 'header.php';
var_dump($_SESSION);
var_dump($_REQUEST);

$valor_total = 0.0;

$usuario = new Usuario($_SESSION['user_id']);
$usuarioDAO = new UsuarioDAO($pdo);

$pedido = new Pedido($usuarioDAO->buscarPedido($usuario)[0]->id_pedido);
$pedidoDAO = new PedidoDAO($pdo);

$itens = $pedidoDAO->buscarItens($pedido);
$itemDAO = new ItemDAO($pdo);

$especDAO = new EspecificacaoDAO($pdo);
$produtoDAO = new ProdutoDAO($pdo);

foreach($itens as $item) {
    // $especDAO->buscarPorId($item->id_espec_item
    $id_produto = $especDAO->buscarPorId(new Especificacao($item->id_espec_item))[0]->id_prod_espec;
    $valor_produto = (float) $produtoDAO->buscarPorId(new Produto($id_produto))[0]->preco_produto;
    $valor_total += $valor_produto * $item->quantidade_item;
}


// $

var_dump($valor_total);

$pedido->setValor(10);

var_dump($pedido);


?>