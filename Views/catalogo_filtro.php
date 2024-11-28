<?php
require_once 'header.php';

$produto = new Produto(nome_produto: $_REQUEST['filtro']);
$produtoDAO = new ProdutoDAO($pdo);
$retorno = $produtoDAO->buscarSubstring($produto);
$img = [];
foreach($retorno as $prod) {
    $produto = new Produto($prod->id_produto);
    $img[] = $produtoDAO->buscarImagens($produto);
}
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
                $i = 0;
                foreach ($retorno as $produto) {
                    // Imagem tem que referenciar o id do produto
                    // IMG= ../Images/{$imagem do produto}
                    // Link = ../produto.php?id_produto={$produto->id}
                    echo
                    "<div class='col-lg-4 col-md-6'>
                        <div class='card'>
                            <a href='produto.php?id_prod={$produto->id_produto}'>
                                <img src='../Images/Produtos/{$img[$i][0]->imagem1_espec}' style='height:400px; width:439px;' class='card-img-top' alt='Produto 1'>
                            </a>
                            <div class='card-body'>
                                <h5 class='card-title'>{$produto->nome_produto}</h5>
                                <p class='card-text'>R$ {$produto->preco_produto}</p>
                            </div>
                        </div>
                    </div>";
                    $i++;
                }

            }
            
            ?>
        </div>
    </main>
</body>

</html>