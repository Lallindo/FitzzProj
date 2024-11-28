<?php
require_once 'header.php';

$produtoDAO = new ProdutoDAO($pdo);
$allProd = $produtoDAO->buscarTodos(new Produto(0));
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Produtos</title>
</head>

<body class="bg-light">

    <div class="container my-5">
        <div class="row">
            <!-- Catálogo de Produtos -->
            <div id="menu-secundario">
                <img class="img_menu" src="../Images/caminhao-de-entrega.ico" alt="" draggable="false">
                <p style="margin: 5px 50px 0px 5px;">FRETE GRÁTIS ACIMA DE <b>R$150,00</b></p>
                <img class="img_menu" src="../Images//caixa.ico" alt="" draggable="false">
                <p style="margin: 5px 0px 0px 5px;">PARCELAMOS EM <b>3X</b> SEM JUROS</p>
            </div>

            <div id="banner">
                <img class="img_banner" src="../Images//index/fundo.webp" alt="" draggable="false">
                <p class="msg_banner" style="font-size: 2em;">
                    <img class="logoBranco" src="../Images//index/logoBranco.webp" alt="" draggable="false"><br>
                    CONFORTO E AUNTENTICIDADE<br>
                    Peças exclusivas<br>
                    <button class="btn_banner">COMPRE JÁ</button>
                </p>
                <div class="fundo_banner"></div>
            </div>

            <div id="produtos">
                <!-- Camiseta -->
                <div class="sub_titulo_img">
                    <a href="catalogo_filtro.php?filtro=camiseta">
                        <img src="../Images/index/camiseta1.webp" alt="" draggable="false">
                    </a>
                    <p>CAMISETAS</p>
                </div>

                <!-- Bermuda -->
                <div class="sub_titulo_img">
                    <a href="catalogo_filtro.php?filtro=bermuda">
                        <img src="../Images/index/bermuda1.webp" alt="" draggable="false">
                    </a>
                    <p>BERMUDAS</p>
                </div>

                <!-- Moletom -->
                <div class="sub_titulo_img">
                    <a href="catalogo_filtro.php?filtro=moletom">   
                        <img src="../Images/index/moletom1.webp" alt="" draggable="false">
                    </a>
                    <p>MOLETONS</p>
                </div>
            </div>

            <div class="msg_favorito_posicao">
                <p class="msg_favorito">
                    FAVORITOS DA FITZ<span class="msg_favorito-Z">Z</span>
                </p>
            </div>

            <div id="favoritos">
                <!-- Camiseta -->
                <div class="titulo_img">
                    <img src="../Images/index/camiseta2.webp" alt="" draggable="false">
                    <p>
                        <span class="nome_produto">Camiseta Deidara Branca</span>
                        <br><img class="avaliacao" src="../Images//index/estrelas.png" alt="" draggable="false">
                        <br><span class="preco_produto">R$74,00</span>
                        <br><input type="number" value="1" min="1" max="99"><button class="add_cart">ADICIONAR AO CARRINHO</button>
                        <br><button class="view_produto">VER PRODUTO</button>
                    </p>
                </div>

                <!-- Camiseta -->
                <div class="titulo_img">
                    <img src="../Images//index/camiseta3.webp" alt="" draggable="false">
                    <p>
                        <span class="nome_produto">Camiseta Hanzo Cinza</span>
                        <br><img class="avaliacao" src="../Images//index/estrelas.png" alt="" draggable="false">
                        <br><span class="preco_produto">R$74,00</span>
                        <br><input type="number" value="1" min="1" max="99"><button class="add_cart">ADICIONAR AO CARRINHO</button>
                        <br><button class="view_produto">VER PRODUTO</button>
                    </p>
                </div>

                <!-- Bermuda -->
                <div class="titulo_img">
                    <img src="../Images//index/bermuda2.webp" alt="" draggable="false">
                    <p>
                        <span class="nome_produto">Bermuda Tactel FITZZ</span>
                        <br><img class="avaliacao" src="../Images//index/estrelas.png" alt="" draggable="false">
                        <br><span class="preco_produto">R$79,90</span>
                        <br><input type="number" value="1" min="1" max="99"><button class="add_cart">ADICIONAR AO CARRINHO</button>
                        <br><button class="view_produto">VER PRODUTO</button>
                    </p>
                </div>
            </div>

            <footer><img src="../Images/logo_branca.webp" alt=""></footer>

</body>
<script src="../script/index_script.js"></script>
</body>

</html>