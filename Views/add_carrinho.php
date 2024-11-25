<?php
require_once "header.php";

// Usuário deve estar logado antes de fazer a compra, os dados do item feito podem ser salvos na session

var_dump($_REQUEST);

$produto = new Produto($_REQUEST['id_prod'], 0, '', '', $_REQUEST['cor_espec'], $_REQUEST['tam_espec'], $_REQUEST['quant_espec'], []);

// Dentro do $produto temos a Cor, Tamanho e Quantidade da compra

if (!isset($_SESSION['user_id'])) {
    $_SESSION['saved_item'] = $produto;
} else {
    // ProdutoDAO usado para conseguir o ID da especificação
    $produtoDAO = new ProdutoDAO($pdo);
    $id_espec = $produtoDAO->buscarEspecItem($produto)[0]->id_espec;
    // Criação do Item
    $item = new Item(0, $produto->getEspec()[0]->getQuant(), $id_espec);
    $itemDAO = new ItemDAO($pdo);
    // UsuarioDAO usado para conseguir o ID do endereço do usuário
    $usuarioDAO = new UsuarioDAO($pdo);
    $id_endereco = $usuarioDAO->buscarEndereco(new Usuario($_SESSION['user_id']))[0]->id_endereco;

    $pedido = new Pedido(
        0, 
        null, 
        null, 
        null, 
        0,
        $_SESSION['user_id'], 
        $item->getId(), 
        $item->getQuant(), 
        $item->getEspec()->getId(),
        $id_endereco
    );

    var_dump($pedido->getItem());
    $pedidoDAO = new PedidoDAO($pdo);

    $retorno = $pedidoDAO->buscarPedidoEmAberto($pedido);

    if (empty($retorno)) {
        $pedidoDAO->inserir($pedido);
        $pedidoDAO->inserirItem($pedido);
    } else {
        $pedidoDAO->inserirItem($pedido);
    }

    // Antes de inserir um item temos que saber se existe um pedido em aberto ou se devemos criar um novo

    // $itemDAO->inserir($item);
    // $id_item = $itemDAO->buscarIdAposInserido($item);

}



// Criar um item
// Adicionar ele ao pedido
?>