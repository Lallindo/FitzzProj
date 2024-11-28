<?php
require_once "header.php";

// Verificação de se o usuário é ADM 
if ($_SESSION['user_is_adm'] != 1) {
    header('location: index.php');
} 

$produtoDAO = new ProdutoDAO($pdo); 

function tratarImagem($img) {
    $image_file = $img;
    var_dump($image_file);
    $image_type = exif_imagetype($image_file['tmp_name']);
    $image_extension = image_type_to_extension($image_type, true);
    $image_name = bin2hex(random_bytes(16)) . $image_extension;
    move_uploaded_file($image_file['tmp_name'], '../Images/Produtos/' . $image_name);
    return $image_name;
}

if ($_POST) {
    echo '<br><br><br>';
    $img_id = [];
    foreach($_FILES as $img) {
        if (empty($img['error'])) {
            $img_id[] = tratarImagem($img);
        }
    }
    var_dump($img_id);
    $produto = new Produto(0, $_POST['preco'], $_POST['nome'], $_POST['descricao'], 0, 0, 0, $_POST['inp-0-0'], $img_id[0], $img_id[1]);
    for ($i = 0; $i < 4; $i++) {
        for ($j = 0; $j < 5; $j++) {
            if ($i != 0 && $j == 0) {
                $produto->setEspec($i, $j, $_POST["inp-$i-$j"],  $img_id[$i*2], $img_id[($i*2)+1]);
                $j++;
            }
            if ($i == 0 && $j == 0) {
                $j++;
            }
            $produto->setEspec($i, $j, $_POST["inp-$i-$j"],  '', '');
        }
    }
    $produtoDAO->inserir($produto);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Adicionar produto</title>
    </head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Formulário de Cadastro</h1>
        <form method="POST" enctype="multipart/form-data">
            <!-- Campo Nome -->
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome">
            </div>

            <!-- Campo Preço -->
            <div class="mb-3">
                <label for="preco" class="form-label">Preço</label>
                <input type="number" class="form-control" id="preco" name="preco" placeholder="Digite o preço"
                    step="0.01">
            </div>

            <!-- Campo Descrição -->
            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea class="form-control" id="descricao" name="descricao" rows="3"
                    placeholder="Digite a descrição"></textarea>
            </div>

            <div class="mb-3">
                <h5>Quantidades Cor Preta</h5>
                <tr>
                    <td><input type="text" id="inp-0-0" name="inp-0-0" placeholder="Quantidade PP"></td>
                    <td><input type="text" id="inp-0-1" name="inp-0-1" placeholder="Quantidade P"></td>
                    <td><input type="text" id="inp-0-2" name="inp-0-2" placeholder="Quantidade M"></td>
                    <td><input type="text" id="inp-0-3" name="inp-0-3" placeholder="Quantidade G"></td>
                    <td><input type="text" id="inp-0-4" name="inp-0-4" placeholder="Quantidade GG"></td>
                </tr>
            </div>

            <div class="mb-3">
                <h5>Quantidades Cor Branca</h5>
                <tr>
                    <td><input type="text" id="inp-1-0" name="inp-1-0" placeholder="Quantidade PP"></td>
                    <td><input type="text" id="inp-1-1" name="inp-1-1" placeholder="Quantidade P"></td>
                    <td><input type="text" id="inp-1-2" name="inp-1-2" placeholder="Quantidade M"></td>
                    <td><input type="text" id="inp-1-3" name="inp-1-3" placeholder="Quantidade G"></td>
                    <td><input type="text" id="inp-1-4" name="inp-1-4" placeholder="Quantidade GG"></td>
                </tr>
            </div>

            <div class="mb-3">
                <h5>Quantidades Cor Cinza</h5>
                <tr>
                    <td><input type="text" id="inp-2-0" name="inp-2-0" placeholder="Quantidade PP"></td>
                    <td><input type="text" id="inp-2-1" name="inp-2-1" placeholder="Quantidade P"></td>
                    <td><input type="text" id="inp-2-2" name="inp-2-2" placeholder="Quantidade M"></td>
                    <td><input type="text" id="inp-2-3" name="inp-2-3" placeholder="Quantidade G"></td>
                    <td><input type="text" id="inp-2-4" name="inp-2-4" placeholder="Quantidade GG"></td>
                </tr>
            </div>

            <div class="mb-3">
                <h5>Quantidades Cor Azul</h5>
                <tr>
                    <td><input type="text" id="inp-3-0" name="inp-3-0" placeholder="Quantidade PP"></td>
                    <td><input type="text" id="inp-3-1" name="inp-3-1" placeholder="Quantidade P"></td>
                    <td><input type="text" id="inp-3-2" name="inp-3-2" placeholder="Quantidade M"></td>
                    <td><input type="text" id="inp-3-3" name="inp-3-3" placeholder="Quantidade G"></td>
                    <td><input type="text" id="inp-3-4" name="inp-3-4" placeholder="Quantidade GG"></td>
                </tr>
            </div>  

            <!-- Campos de Upload de Imagens -->
            <div class="mb-3">
                <label class="form-label">Upload de Imagens</label>
                <div class="row">
                    <!-- Repetição de campos de upload -->
                    <?php for ($i = 1; $i <= 8; $i++): ?>
                        <div class="col-md-6 mb-3">
                            <label for="imagem<?php echo $i; ?>" class="form-label">Imagem <?php echo $i; ?></label>
                            <input type="file" class="form-control" id="imagem<?php echo $i; ?>"
                                name="imagem<?php echo $i; ?>">
                        </div>
                    <?php endfor; ?>
                </div>
            </div>

            <!-- Botão de Envio -->
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
</body>

</html>