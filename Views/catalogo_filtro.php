<?php
require_once 'header.php';

$produto = new Produto(nome_produto: $_REQUEST['filtro']);
$produtoDAO = new ProdutoDAO($pdo);

$retorno = $produtoDAO->buscarSubstring($produto);

// var_dump($produtoDAO->buscarTodos());

// var_dump($retorno);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
</head>

<body>
    <main class="col-md-9">

        <div class="row g-4">
            <?php
            if (empty($retorno)) {
                echo "Nenhum item adicionado";
            } else {
                foreach ($retorno as $produto) 
                // Imagem tem que referenciar o id do produto
                // IMG= ../Images/{$imagem do produto}
                // Link = ../produto.php?id_produto={$produto->id}
                echo
                "<div class='col-lg-4 col-md-6'>
                    <div class='card'>
                        <a href='produto.php?id_prod={$produto->id_produto}'>
                            <img src='../Images/camisetas/deidara-branca-c-1.webp' class='card-img-top' alt='Produto 1'>
                        </a>
                        <div class='card-body'>
                            <h5 class='card-title'>{$produto->nome_produto}</h5>
                            <p class='card-text'>R$ {$produto->preco_produto}</p>
                        </div>
                    </div>
                </div>";
            
            }
            
            ?>
        </div>
    </main>
</body>

</html>