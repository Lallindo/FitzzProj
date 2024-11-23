<?php
require_once "header.php";
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
            <h1>CARRINHO</h1>
            <div class="produtos">
                <div class="produto">
                    <img src="../Images/camisetas/tlou-branca-c-2.webp" alt="Camiseta TLOU">
                    <p>01 Camiseta TLOU - Branca - M</p>
                </div>
                <div class="produto">
                    <img src="../Images//camisetas/demon-preta-f-1.webp" alt="Camiseta Hanzo">
                    <p>01 Camiseta DEMON - Preta - M</p>
                </div>
            </div>
            <div class="total">
                <p><strong>Total: R$148,00</strong></p>
            </div>
            <div class="pagamento">
                <h2>Modo de Pagamento:</h2>
                <div class="opcoes">
                    <label>
                        <img src="../Images/pix.png" alt="Pix">
                        <span>Pix</span>
                        <input type="radio" name="pagamento" value="pix" onclick="mostrarFormaPagamento('pix')">
                    </label>
                    <label>
                        <img src="../Images/boleto.png" alt="Boleto">
                        <span>Boleto</span>
                        <input type="radio" name="pagamento" value="boleto" onclick="mostrarFormaPagamento('boleto')">
                    </label>
                    <label>
                        <img src="../Images/cartão.png" alt="Cartão">
                        <span>Cartão</span>
                        <input type="radio" name="pagamento" value="cartao" onclick="mostrarFormaPagamento('cartao')">
                    </label>
                </div>
                <div id="forma-pagamento" class="forma-pagamento">
                <button class="btn" type="button">COMPRAR</button>
                </div>
            </div>
        </section>
    </main>
    <script src="../script/pagamento.js"></script>
</body>

</html>