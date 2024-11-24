<?php
require_once "header.php";

// Usuário deve estar logado antes de fazer a compra, os dados do item feito podem ser salvos na session

var_dump($_REQUEST);

$produto = new Produto(
    $_REQUEST['id_prod'],
    0,
    '',
    '',
    $_REQUEST['cor_espec'],
    $_REQUEST['tam_espec'],
    $_REQUEST['quant_espec'],
    []
);
$produtoDAO = new ProdutoDAO($pdo);
$especPedido = $produto->getEspec()[0];
$especBanco = $produtoDAO->buscarEspecItem($produto);
$item = new Item(0, $especPedido->getQuant(), $especBanco[0]->id_espec);
// Tudo acima deve ser feito mesmo se o usuário não estiver logado

if (!isset($_SESSION['user_id'])) {    
    $_SESSION['saved_item'] = $item;
} else {
    // Apenas se ele estiver logado o código seguinte deve rodar
    $itemDAO = new ItemDAO($pdo);
    $itemDAO->inserir($item);
    $usuario = new Usuario($_SESSION['user_id']);
    $usuarioDAO = new UsuarioDAO($pdo);
    
    $pedido = new Pedido
    (0, 
    null, 
    null, 
    null, 
    $_SESSION['user_id'], 
    $itemDAO->buscarIdAposInserido($item),
    $usuarioDAO->buscarEndereco($usuario)[0]
    );
    
    var_dump($pedido);
    
    $pedidoDAO = new PedidoDAO($pdo);
    
    $pedidoDAO->inserir($pedido);
}

// $pedido = new Pedido(0, null, null, date(), $_SESSION['user_id'],)


// Criar um item
// Adicionar ele ao pedido
?>