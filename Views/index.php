<?php
require_once 'header.php';

$end = new Endereco(1);
$pedido = new Pedido(1, '', '', '', '', [], $end);
$pedidoDAO = new PedidoDAO($pdo);

var_dump($pedido->getEnd());
var_dump($pedidoDAO->buscarEndereco($pedido));


// $usuario = new Usuario(id_usuario: 1);
// $usuarioDAO = new UsuarioDAO($pdo);

// foreach($usuarioDAO->buscarEndereco($usuario) as $data) {
//     echo $data->id_endereco . '<br>';
//     echo $data->rua_endereco . '<br>';
// }


// ## USO DE ESPECIALIZAÇÕES ##
// $espec1 = new Especificacoes(id_espec: 1);
// $espec2 = new Especificacoes(id_espec: 4);
// $espec3 = new Especificacoes(id_espec: 7);

// $arrEspec = [$espec1, $espec2, $espec3];

// $especDAO = new EspecificacoesDAO($pdo);

// forEach($arrEspec as $dado) {
//     var_dump($especDAO->buscarPorId($dado));
// }

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Fitzz</title>
</head>

<body>
<script src="../scripts/script.js"></script>
</body>

</html>