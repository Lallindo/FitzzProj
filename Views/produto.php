<?php
require_once 'header.php';

if ($_GET) {
    $produto = new Produto(id_produto: $_GET['id_produto']);
    $produtoDAO = new ProdutoDAO($pdo);

    $retorno = $produtoDAO->buscarPorId($produto)[0];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produto 1</title>
</head>

<body class="bg-light">

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitzz - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/pagina_produto.css">
    <link rel="stylesheet" href="./css/nav.css">
    <link rel="stylesheet" href="./css/footer.css">
</head>

<body>

    <div id="favoritos">
        <div>
            <button class="arrow left" onclick="previousImage()">&#8249;</button>
            <img id="main-image" src="./imagens/camisetas/deidara-branca-c-1.webp" alt="Camiseta TLOU Branca"
                draggable="false">
            <button class="arrow right" onclick="nextImage()">&#8250;</button>
        </div>
        <div class="titulo_img">

            <p>
            <div class="titulo_paginaProduto">
                <span class="nome_produto">Camiseta Deidara Branca</span>
                <br><img class="avaliacao" src="./imagens/index/estrelas.png" alt="" draggable="false">
            </div>
            <div class="cor_paginaProduto">
                <span class="nome_produto">Cor</span>
                <div class="colors">
                    <div class="color" style="background-color: #d3d3d3; border: 1px solid black;"></div>
                    <div class="color" style="background-color: #000000;"></div>
                    <div class="color" style="background-color: #ffffff; border: 1px solid black;"></div>
                </div>
            </div>
            <br><span class="preco_produto">R$74,00</span>
            <br><input type="number" value="1" min="1" max="99"><button class="add_cart">ADICIONAR AO
                CARRINHO</button><br>
            <span>Estoque: 50</span>
            </p>
            <h3>DESCRIÇÃO</h3>
            <h5>A FITZZ apresenta a mais avançada tecnologia<br>
                em Super DRY. Nossas camisetas combinam o<br>
                toque suave da poliamida com tecnologia de<br>
                alta absorção, ideal para quem adora um <br>
                treino internso. Agora, além de vestir seus <br>
                personagens favoritos, você pode treinar com <br>
                suas camisetas favoritos, sem sentir calor.
            </h5>
        </div>
    </div>

    <div class="msg_favorito_posicao">
        <p class="msg_favorito">
            PRODUTOS RELACIONADOS
        </p>
    </div>

    <div id="favoritos">

        <div class="titulo_img">
            <img src="./imagens/index/camiseta1.webp" alt="" draggable="false">
            <p>
                <span class="nome_produto">Camiseta TLOU Preta</span>
                <br><img class="avaliacao" src="./imagens/index/estrelas.png" alt="" draggable="false">
                <br><span class="preco_produto">R$74,00</span>
                <br><input type="number" value="1" min="1" max="99"><button class="add_cart">ADICIONAR AO
                    CARRINHO</button>
                <br><button class="view_produto">VER PRODUTO</button>
            </p>
        </div>

        <div class="titulo_img">
            <img src="./imagens/index/camiseta3.webp" alt="" draggable="false">
            <p>
                <span class="nome_produto">Camiseta Hanzo Cinza</span>
                <br><img class="avaliacao" src="./imagens/index/estrelas.png" alt="" draggable="false">
                <br><span class="preco_produto">R$74,00</span>
                <br><input type="number" value="1" min="1" max="99"><button class="add_cart">ADICIONAR AO
                    CARRINHO</button>
                <br><button class="view_produto">VER PRODUTO</button>
            </p>
        </div>



        <div class="titulo_img">
            <img src="./imagens/camisetas/demon-preta-f-1.webp" alt="" draggable="false">
            <p>
                <span class="nome_produto">Camiseta DemonS Preta</span>
                <br><img class="avaliacao" src="./imagens/index/estrelas.png" alt="" draggable="false">
                <br><span class="preco_produto">R$74,00</span>
                <br><input type="number" value="1" min="1" max="99"><button class="add_cart">ADICIONAR AO
                    CARRINHO</button>
                <br><button class="view_produto">VER PRODUTO</button>
            </p>
        </div>
    </div>

    <footer><img src="./imagens/logo_branca.webp" alt=""></footer>
    <script src="./javascript/pagina_produto.js"></script>
</body>

</html>

</body>

</html>