<?php
require_once "header.php";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitzz - Carrinho</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style_carrinho.css">

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

    <div id="carrinho">
        <h1>Carrinho</h1>
        <hr>
        <div class="item-carrinho">
            <img src="../Images/camisetas/tlou-branca-c-2.webp" alt="Camiseta TLOU" class="imagem-produto" />
            <div class="detalhes-produto">
                <h2>Camiseta TLOU</h2>
                <p>Branca - M</p>
                <p>1x R$74,00</p>
            </div>
            <div class="preco-produto">R$74,00</div>
            <button class="remover-item">🗑️</button>
        </div>
        <hr>
        <div class="item-carrinho">
            <img src="../Images/camisetas/demon-preta-f-1.webp" alt="Camiseta DEMON" class="imagem-produto" />
            <div class="detalhes-produto">
                <h2>Camiseta DEMON</h2>
                <p>Preta - M</p>
                <p>1x R$74,00</p>
            </div>
            <div class="preco-produto">R$74,00</div>
            <button class="remover-item">🗑️</button>
        </div>
        <hr />
        <div class="resumo-carrinho">
            <button class="btn-continuar"><a href="index.php">Continuar comprando</a></button>
            <button class="btn-finalizar"><a href="finalizar_compra.php">Finalizar compra</a></button>
            <span class="total-carrinho">Total: R$148,00</span>
        </div>
    </div>

</body>

</html>