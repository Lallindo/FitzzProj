<?php
require_once 'header.php';

$usuarioDAO = new UsuarioDAO($pdo);
$enderecoDAO = new EnderecoDAO($pdo);
$telefoneDAO = new TelefoneDAO($pdo);
$produtoDAO = new ProdutoDAO($pdo);
$pedidoDAO = new PedidoDAO($pdo);
$itemDAO = new ItemDAO($pdo);
$especDAO = new EspecificacaoDAO($pdo);


if ($_REQUEST['tipo'] === 'user') {
    $id_usuario = $usuarioDAO->buscarTodos(new Usuario(0));
    $usuarioDAO->removerUsuario(new Usuario($id_usuario[$_REQUEST['id']]->id_usuario));
} else if ($_REQUEST['tipo'] === 'end') {
    $id_endereco = $enderecoDAO->buscarTodos(new Endereco(0));
    $usuarioDAO->removerEnd(new Usuario($id_endereco[$_REQUEST['id']]->id_usuario_endereco, id_endereco: $id_endereco[$_REQUEST['id']]->id_endereco));
} else if ($_REQUEST['tipo'] === 'tel') {
    $id_telefone = $telefoneDAO->buscarTodos(new Telefone(0));
    $usuarioDAO->removerTel(new Usuario($id_telefone[$_REQUEST['id']]->id_usuario_telefone,id_telefone: $id_telefone[$_REQUEST['id']]->id_telefone));
} else if ($_REQUEST['tipo'] === 'prod') {
    $id_produto = $produtoDAO->buscarTodos(new Produto(0));
    $produtoDAO->removerProduto(new Produto($id_produto[$_REQUEST['id']]->id_produto));
}  else if ($_REQUEST['tipo'] === 'ped') {
    $id_pedido = $pedidoDAO->buscarTodos(new Pedido(0));
    $pedidoDAO->removerPedido(new Pedido($id_pedido[$_REQUEST['id']]->id_pedido));
}  else if ($_REQUEST['tipo'] === 'item') {
    $id_item = $itemDAO->buscarTodos(new Item(0));
    $itemDAO->remover(new Item($id_item[$_REQUEST['id']]->id_item));
}  else if ($_REQUEST['tipo'] === 'esp') {
    $id_espec = $especDAO->buscarTodos(new Especificacao(0));
    $especDAO->removerEspec(new Especificacao($id_espec[$_REQUEST['id']]->id_espec));
}  

?>