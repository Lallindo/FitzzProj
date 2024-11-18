<?php
require_once 'header.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Produtos</title>

</head>
<body class="bg-light">

<div class="container my-5">
    <div class="row">
        <!-- Barra de Navegação Lateral -->
        <aside class="col-md-3">
            <h4 class="mb-4">Filtros</h4>
            <ul class="list-group">
                <li class="list-group-item"><a href="#" class="text-decoration-none">Categoria 1</a></li>
                <li class="list-group-item"><a href="#" class="text-decoration-none">Categoria 2</a></li>
                <li class="list-group-item"><a href="#" class="text-decoration-none">Categoria 3</a></li>
                <li class="list-group-item"><a href="#" class="text-decoration-none">Promoções</a></li>
            </ul>
        </aside>

        <!-- Catálogo de Produtos -->
        <main class="col-md-9">
            <div class="row g-4">
                <!-- Produto 1 -->
                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <a href="produto.php?id_produto=1">
                            <img src="https://via.placeholder.com/300" class="card-img-top" alt="Produto 1">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">Produto 1</h5>
                            <p class="card-text">R$ 50,00</p>
                        </div>
                    </div>
                </div>
                <!-- Produto 2 -->
                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <img src="https://via.placeholder.com/300" class="card-img-top" alt="Produto 2">
                        <div class="card-body">
                            <h5 class="card-title">Produto 2</h5>
                            <p class="card-text">R$ 75,00</p>
                        </div>
                    </div>
                </div>
                <!-- Produto 3 -->
                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <img src="https://via.placeholder.com/300" class="card-img-top" alt="Produto 3">
                        <div class="card-body">
                            <h5 class="card-title">Produto 3</h5>
                            <p class="card-text">R$ 120,00</p>
                        </div>
                    </div>
                </div>
                <!-- Produto 4 -->
                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <img src="https://via.placeholder.com/300" class="card-img-top" alt="Produto 4">
                        <div class="card-body">
                            <h5 class="card-title">Produto 4</h5>
                            <p class="card-text">R$ 30,00</p>
                        </div>
                    </div>
                </div>
                <!-- Produto 5 -->
                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <img src="https://via.placeholder.com/300" class="card-img-top" alt="Produto 5">
                        <div class="card-body">
                            <h5 class="card-title">Produto 5</h5>
                            <p class="card-text">R$ 60,00</p>
                        </div>
                    </div>
                </div>
                <!-- Produto 6 -->
                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <img src="https://via.placeholder.com/300" class="card-img-top" alt="Produto 6">
                        <div class="card-body">
                            <h5 class="card-title">Produto 6</h5>
                            <p class="card-text">R$ 85,00</p>
                        </div>
                    </div>
                </div>
                <!-- Produto 7 -->
                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <img src="https://via.placeholder.com/300" class="card-img-top" alt="Produto 7">
                        <div class="card-body">
                            <h5 class="card-title">Produto 7</h5>
                            <p class="card-text">R$ 110,00</p>
                        </div>
                    </div>
                </div>
                <!-- Produto 8 -->
                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <img src="https://via.placeholder.com/300" class="card-img-top" alt="Produto 8">
                        <div class="card-body">
                            <h5 class="card-title">Produto 8</h5>
                            <p class="card-text">R$ 25,00</p>
                        </div>
                    </div>
                </div>
                <!-- Produto 9 -->
                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <img src="https://via.placeholder.com/300" class="card-img-top" alt="Produto 9">
                        <div class="card-body">
                            <h5 class="card-title">Produto 9</h5>
                            <p class="card-text">R$ 95,00</p>
                        </div>
                    </div>
                </div>
                <!-- Produto 10 -->
                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <img src="https://via.placeholder.com/300" class="card-img-top" alt="Produto 10">
                        <div class="card-body">
                            <h5 class="card-title">Produto 10</h5>
                            <p class="card-text">R$ 40,00</p>
                        </div>
                    </div>
                </div>
                <!-- Produto 11 -->
                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <img src="https://via.placeholder.com/300" class="card-img-top" alt="Produto 11">
                        <div class="card-body">
                            <h5 class="card-title">Produto 11</h5>
                            <p class="card-text">R$ 70,00</p>
                        </div>
                    </div>
                </div>
                <!-- Produto 12 -->
                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <img src="https://via.placeholder.com/300" class="card-img-top" alt="Produto 12">
                        <div class="card-body">
                            <h5 class="card-title">Produto 12</h5>
                            <p class="card-text">R$ 65,00</p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

</body>
</html>
