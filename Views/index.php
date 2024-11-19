<?php
require_once 'header.php';

$produtoDAO = new ProdutoDAO($pdo);
$allProd = $produtoDAO->buscarTodos();
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
                    <?php

                    foreach ($allProd as $produto) {
                        
                        $path = "../Images/" . $produto->imagem1_espec; 
                        echo "
                    <div class='col-lg-4 col-md-6'>
                        <div class='card'>
                            <img src='{$path}' class='card-img-top' alt='Produto 1'>
                            <div class='card-body text-center'>
                                <h5 class='card-title'>{$produto->nome_produto}</h5>
                                <p class='card-text'>R$ {$produto->preco_produto}</p>
                            </div>
                        </div>
                    </div>";
                    }
                    // <a href='produto.php?id_produto={$produto->id_produto}'>
                    // </a>
                    ?>
                    <main />
                </div>
        </div>
        <script src="../script/index_script.js"></script>
</body>

</html>