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

    <div class="container my-5">
        <div class="row">
            <!-- Imagens do Produto -->
            <div class="col-md-6">
                <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://via.placeholder.com/600x400" class="d-block w-100" alt="Imagem Produto 1 - 1">
                        </div>
                        <div class="carousel-item">
                            <img src="https://via.placeholder.com/600x400" class="d-block w-100" alt="Imagem Produto 1 - 2">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Anterior</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Próximo</span>
                    </button>
                </div>
            </div>

            <!-- Informações do Produto -->
            <div class="col-md-6">
                <h1 class="mb-3"><?= $retorno->nome_produto ?></h1>
                <p class="lead text-success">R$ <?= $retorno->preco_produto ?></p>
                <div class="mb-3">
                    <!-- Seleção de Cores -->
                    <div class="mb-3">
                        <label class="form-label d-block">Escolha uma cor:</label>
                        <div class="d-flex gap-2">
                            <button class="btn" style="background-color: red;" title="Vermelho"></button>
                            <button class="btn" style="background-color: blue;" title="Azul"></button>
                            <button class="btn" style="background-color: green;" title="Verde"></button>
                            <button class="btn" style="background-color: black;" title="Preto"></button>
                        </div>
                    </div>

                </div>
                <div class="mb-3">
                    <!-- Seleção de Cores -->
                    <div class="mb-3">
                        <label class="form-label d-block">Escolha uma cor:</label>
                        <div class="d-flex gap-2">
                            <button class="btn btn-primary">PP</button>
                            <button class="btn btn-primary">P</button>
                            <button class="btn btn-primary">M</button>
                            <button class="btn btn-primary">G</button>
                            <button class="btn btn-primary">GG</button>
                        </div>
                    </div>

                </div>
                <p>
                    <?= $retorno->desc_produto ?>
                </p>
                <button class="btn btn-primary btn-lg w-100">Comprar Agora</button>
            </div>
        </div>
    </div>

</body>

</html>