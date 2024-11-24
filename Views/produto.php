<?php
require_once 'header.php';

$produto = new Produto(id_produto: (int) $_REQUEST['id_prod']);
$produtoDAO = new ProdutoDAO($pdo);
$retorno = $produtoDAO->buscarPorId($produto)[0];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produto <?= $retorno->nome_produto ?></title>
</head>

<body class="bg-light">
    <?php
    echo "<input type='hidden' id='inpId' value={$retorno->id_produto}>";
    ?>
    <div id="favoritos">
        <div>
            <button class="arrow left" onclick="previousImage()">&#8249;</button>
            <img id="main-image" src="../Images/camisetas/deidara-branca-c-1.webp" alt="Camiseta TLOU Branca"
                draggable="false">
            <button class="arrow right" onclick="nextImage()">&#8250;</button>
        </div>
        <orm class="titulo_img">

            <p>
            <div class="titulo_paginaProduto">
                <span class="nome_produto"><?= $retorno->nome_produto ?></span>
                <br><img class="avaliacao" src="../Images/index/estrelas.png" alt="" draggable="false">
            </div>
            <div class="cor_paginaProduto">
                <span class="nome_produto">Cor</span>
                <div class="colors">
                    <div class="color" style="background-color: #d3d3d3; border: 1px solid black;"></div>
                    <div class="color" style="background-color: #000000;"></div>
                    <div class="color" style="background-color: #ffffff; border: 1px solid black;"></div>
                </div>
            </div>
            <br><span class="preco_produto">R$ <?= $retorno->preco_produto ?> </span>
            <div>
                <button id="Cor1" name="Cor1" class="btnCor" type="button" value="0">COR1</button>
                <button id="Cor2" name="Cor2" class="btnCor" type="button" value="1">COR2</button>
                <button id="Cor3" name="Cor3" class="btnCor" type="button" value="2">COR3</button>
                <button id="Cor4" name="Cor4" class="btnCor" type="button" value="3">COR4</button>
            </div>
            <div>
                <button id="PP" class="btnTam" name="PP" type="button" value="0">PP</button>
                <button id="P" class="btnTam" name="P" type="button" value="1">P</button>
                <button id="M" class="btnTam" name="M" type="button" value="2">M</button>
                <button id="G" class="btnTam" name="G" type="button" value="3">G</button>
                <button id="GG" class="btnTam" name="GG" type="button" value="4">GG</button>
            </div>
            <br><input id="quantCompra" name="quantCompra" type="number" value="1" min="1" max="99">
            <button id="btnCart" class="add_cart">
                ADICIONAR AO CARRINHO</button><br>
            </p>
            </form>
            <h3>DESCRIÇÃO</h3>
            <h5>
                <?= $retorno->desc_produto ?>
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

    <footer><img src="../Images/logo_branca.webp" alt=""></footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../scripts/setTam.js"></script>
</body>

</html>