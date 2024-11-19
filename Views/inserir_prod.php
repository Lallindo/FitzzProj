<?php
require_once "header.php";    

// Verificação de se o usuário é ADM 

$produto1 = new Produto(0, 10, 'Camisa', 'Camisa', 0, 0, 10, '');
$produto2 = new Produto(0, 20, 'Camiseta', 'Camiseta', 0, 0, 10, '');
$produto3 = new Produto(0, 30, 'Blusa Moletom', 'Blusa Moletom', 0, 0, 10, '');
$produto4 = new Produto(0, 40, 'Shorts', 'Shorts', 0, 0, 10, '');
$produto5 = new Produto(0, 50, 'Calça', 'Calça', 0, 0, 10, '');

$produto5->setEspec(0, 1, 10, '');
$produto5->setEspec(0, 2, 10, '');
$produto5->setEspec(0, 3, 10, '');
$produto5->setEspec(0, 4, 10, '');

$produto5->setEspec(1, 0, 10, '');
$produto5->setEspec(1, 1, 10, '');
$produto5->setEspec(1, 2, 10, '');
$produto5->setEspec(1, 3, 10, '');
$produto5->setEspec(1, 4, 10, '');

$produto5->setEspec(2, 0, 10, '');
$produto5->setEspec(2, 1, 10, '');
$produto5->setEspec(2, 2, 10, '');
$produto5->setEspec(2, 3, 10, '');
$produto5->setEspec(2, 4, 10, '');

$produto5->setEspec(3, 0, 10, '');
$produto5->setEspec(3, 1, 10, '');
$produto5->setEspec(3, 2, 10, '');
$produto5->setEspec(3, 3, 10, '');
$produto5->setEspec(3, 4, 10, '');

$produtoDAO = new ProdutoDAO($pdo);
$produtoDAO->inserir($produto5);