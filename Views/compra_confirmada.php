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
    <link rel="stylesheet" href="/css/style_confirmado.css">

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

    <main class="pedido-sucesso">
        <div class="container">
            <div class="icone-check">
                <img src="../Images//verifica.png" width="80px" height="80px" alt="Ícone de check">
            </div>
            <h1>Pedido realizado com sucesso!</h1>
            <p><strong>OBRIGADO PELA COMPRA.</strong></p>
            <button onclick="acompanharPedido()">Acompanhe seu pedido</button>
        </div>
    </main>

    <script>
        function acompanharPedido() {
            alert('Redirecionando você para o acompanhamento do pedido');
            window.location.href = "pedidos.html";
        }
    </script>
</body>
</html>