<?php
require_once "header.php";

echo "<br><br><br><br><br><br><br><br>";

$usuario = new Usuario($_SESSION['user_id']);
$usuarioDAO = new UsuarioDAO($pdo);

$id_pedido = $usuarioDAO->buscarPedido($usuario)[0]->id_pedido;

$pedido = new Pedido($id_pedido);
$pedidoDAO = new PedidoDAO($pdo);

$retorno = $pedidoDAO->buscarItens($pedido);

var_dump($retorno);

if (empty($retorno)) {
    header('location: index.php');
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitzz - Finalizar pedido</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style_finalizar.css">

</head>

<body>

    <div id="menu-secundario">
        <img class="img_menu" src="../Images/caminhao-de-entrega.ico" alt="">
        <p style="margin: 5px 50px 0px 5px;">FRETE GRÁTIS ACIMA DE <b>R$150,00</b></p>
        <img class="img_menu" src="../Images/caixa.ico" alt="">
        <p style="margin: 5px 0px 0px 5px;">PARCELAMOS EM <b>3X</b> SEM JUROS</p>
    </div>

    <div id="banner">
        <img class="img_banner"
            src="../Images/index/fundo.png" alt="">
    </div>
    <main>
        <section class="carrinho">
            <h1>REVISE SEU PEDIDO</h1>
            <div class="produtos">
                <?php

                $especDAO = new EspecificacaoDAO($pdo);
                $produtoDAO = new ProdutoDAO($pdo);

                // SRC da imagem deve ser trocada pelo valor do banco
                foreach ($retorno as $pedido) {
                    $espec = $especDAO->buscarPorId(new Especificacao($pedido->id_espec_item))[0];
                    $produto = $produtoDAO->buscarPorId(new Produto($espec->id_prod_espec))[0];

                    if ($espec->cor_espec === '0') {
                        $cor = 'Preta';
                    } else if ($espec->cor_espec === '1') {
                        $cor = 'Branca';
                    } else if ($espec->cor_espec === '2') {
                        $cor = 'Azul';
                    } else {
                        $cor = 'Cinza';
                    }

                    if ($espec->tamanho_espec === '0') {
                        $tamanho = 'PP';
                    } else if ($espec->tamanho_espec === '1') {
                        $tamanho = 'P';
                    } else if ($espec->tamanho_espec === '2') {
                        $tamanho = 'M';
                    } else if ($espec->tamanho_espec === '3') {
                        $tamanho = 'G';
                    } else {
                        $tamanho = 'GG';
                    }

                    $valor_total = $pedido->quantidade_item * $produto->preco_produto;

                    $produto->preco_produto = number_format($produto->preco_produto, 2, ',', '.');
                    $valor_total = number_format($valor_total, 2, ',', '.');
                    // var_dump($item);
                    echo "
        <hr>
        <div class='item-carrinho'>
        
            <img src='../Images/camisetas/demon-preta-f-1.webp' alt='Camiseta DEMON' class='imagem-produto' />
            <div class='detalhes-produto'>
                <h2>{$produto->nome_produto}</h2>
                <p>{$cor} - {$tamanho}</p>
                <p>{$pedido->quantidade_item}x R$ {$produto->preco_produto}</p>
            </div>
            <div class='preco-produto'>R$ {$valor_total}</div>
            <button class='remover-item' value={$pedido->id_item}>🗑️</button>
        </div>
        <hr />";
                }

                ?>
            </div>
            <div class="total">
                <p id="valor-total" style="font-weight:bold">Total: R$148,00</p>
            </div>
            <div class="pagamento">
                <h2>Modo de Pagamento:</h2>
                <div class="opcoes">
                    <label>
                        <img src="../Images/pix.png" alt="Pix">
                        <span>Pix</span>
                        <input type="radio" class="radio-pag" name="pagamento" value="pix">
                    </label>
                    <label>
                        <img src="../Images/boleto.png" alt="Boleto">
                        <span>Boleto</span>
                        <input type="radio" class="radio-pag" name="pagamento" value="boleto">
                    </label>
                    <label>
                        <img src="../Images/cartão.png" alt="Cartão">
                        <span>Cartão</span>
                        <input type="radio" class="radio-pag" name="pagamento" value="cartao">
                    </label>
                </div>
                <div id="forma-pagamento" class="forma-pagamento">
                    <button id="btn-finalizar-compra" class="btn" type="submit">COMPRAR</button>
                </div>
            </div>
        </section>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../scripts/finalizarPag.js"></script>
</body>

</html>