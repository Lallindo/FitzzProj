<?php

require_once '../Models/conexao.php';
require_once '../Models/classes/especificacao.class.php';
require_once '../Models/classes/produto.class.php';
require_once '../Models/daos/produto.dao.php';

// if (!isset($_REQUEST['id_prod'])) {
//     $_REQUEST['id_prod'] = 11;
// }
$produto = new Produto($_REQUEST['id_prod']);
$produtoDAO = new ProdutoDAO($pdo);

$retorno = json_encode($produtoDAO->buscarEspecs($produto));
echo $retorno;
?>
