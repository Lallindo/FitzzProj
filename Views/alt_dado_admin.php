<?php
require_once 'header.php';

if ($_SESSION['user_is_adm'] != 1) {
    header('location: index.php');
}

$usuarioDAO = new UsuarioDAO($pdo);
$produtoDAO = new ProdutoDAO($pdo);
$pedidoDAO = new PedidoDAO($pdo);
$usuario = new Usuario($_SESSION['user_id']);

function tratarImagem($img) {
    $image_file = $img;
    var_dump($image_file);
    $image_type = exif_imagetype($image_file['tmp_name']);
    $image_extension = image_type_to_extension($image_type, true);
    $image_name = bin2hex(random_bytes(16)) . $image_extension;
    move_uploaded_file($image_file['tmp_name'], '../Images/Produtos/' . $image_name);
    return $image_name;
}

if (($_REQUEST['tipo'] === 'user')) {
    $data = $usuarioDAO->buscarTodos(new Usuario($_SESSION['user_id']));
} else if ($_REQUEST['tipo'] === 'end') {
    $data = $usuarioDAO->buscarTodosEnd(new Usuario($_SESSION['user_id']));
} else if ($_REQUEST['tipo'] === 'tel') {
    $data = $usuarioDAO->buscarTodosTel(new Usuario($_SESSION['user_id']));
} else if ($_REQUEST['tipo'] === 'prod') {
    $data = $usuarioDAO->buscarTodosPro(new Usuario($_SESSION['user_id']));
} else if ($_REQUEST['tipo'] === 'ped') {
    $data = $usuarioDAO->buscarTodosPed(new Usuario($_SESSION['user_id']));
} else if ($_REQUEST['tipo'] === 'item') {
    $data = $usuarioDAO->buscarTodosItem(new Usuario($_SESSION['user_id']));
} else if ($_REQUEST['tipo'] === 'esp') {
    $data = $usuarioDAO->buscarTodosEsp(new Usuario($_SESSION['user_id']));
}
;

if ($_POST) {
    if (($_REQUEST['tipo'] === 'user')) {
        $usuarioDAO->alterarUsuario(new Usuario(id_usuario: $data[$_REQUEST['id']]->id_usuario, nomecomp_usuario: $_POST['nome'], cpf_usuario: $_POST['cpf'], email_usuario: $_POST['email'], datanasc_usuario: $_POST['dataNascimento'], admin: 0));
    } else if ($_REQUEST['tipo'] === 'end') {
        $usuarioDAO->alterarEnd(new Usuario(id_usuario: $data[$_REQUEST['id']]->id_usuario_endereco, id_endereco: $data[$_REQUEST['id']]->id_endereco, rua_end: $_POST['rua'], bairro_end: $_POST['bairro'], padrao_end: $_POST['padrao'], cep_end: $_POST['cep']));
    } else if ($_REQUEST['tipo'] === 'tel') {
        $usuarioDAO->alterarTel(new Usuario(id_usuario: $data[$_REQUEST['id']]->id_usuario_telefone, id_telefone: $data[$_REQUEST['id']]->id_telefone, numero_telefone: $_POST['num']));
    } else if ($_REQUEST['tipo'] === 'prod') {
        $produtoDAO->alterarProd(new Produto(id_produto: $data[$_REQUEST['id']]->id_produto, preco_produto: $_POST['preco'], nome_produto: $_POST['nome'], descricao_produto: $_POST['desc']));
    } else if ($_REQUEST['tipo'] === 'ped') {
        $pedidoDAO->alterarPed(new Pedido($data[$_REQUEST['id']]->id_pedido, status_pedido: $_POST['status']));
    } else if ($_REQUEST['tipo'] === 'item') {
        $pedidoDAO->alterarItem(new Pedido($data[$_REQUEST['id']]->id_pedido_item, id_item: $data[$_REQUEST['id']]->id_item, quant_item: $_POST['quant']));
    } else if ($_REQUEST['tipo'] === 'esp') {
        var_dump($_FILES);
        $produtoDAO->alterarEspec(new Produto($data[$_REQUEST['id']]->id_prod_espec, id_espec: $data[$_REQUEST['id']]->id_espec, cor_espec: $_POST['cor'], tamanho_espec: $_POST['tam'], quant_espec: $_POST['quant'], img1_espec: tratarImagem($_FILES['imagem1']), img2_espec: tratarImagem($_FILES['imagem2'])));
    }
    ;
}

function buildUser($dado)
{
    echo "
            <div class='mb-3'>
                <label for='nome' class='form-label'>Nome do Usuário</label>
                <input type='text' class='form-control' id='nome' name='nome' value='$dado->nomecomp_usuario' required>
            </div>
            <div class='mb-3'>
                <label for='cpf' class='form-label'>CPF</label>
                <input type='text' class='form-control' id='cpf' name='cpf' value='$dado->cpf_usuario' required>
            </div>
            <div class='mb-3'>
                <label for='email' class='form-label'>Email</label>
                <input type='email' class='form-control' id='email' name='email' value='$dado->email_usuario' required>
            </div>
            <div class='mb-3'>
                <label for='dataNascimento' class='form-label'>Data de Nascimento</label>
                <input type='date' class='form-control' id='dataNascimento' name='dataNascimento' value='$dado->datanasc_usuario' required>
            </div>";
}
;

function buildEnd($dado)
{
    echo "
            <div class='mb-3'>
                <label for='rua' class='form-label'>Rua</label>
                <input type='text' class='form-control' id='rua' name='rua' value='$dado->rua_endereco' required>
            </div>
            <div class='mb-3'>
                <label for='bairro' class='form-label'>Bairro</label>
                <input type='text' class='form-control' id='bairro' name='bairro' value='$dado->bairro_endereco' required>
            </div>
            <div class='mb-3'>
                <label for='padrao' class='form-label'>É padrão</label>
                <input type='padrao' class='form-control' id='padrao' name='padrao' value='$dado->padrao_endereco' required>
            </div>
            <div class='mb-3'>
                <label for='cep' class='form-label'>CEP</label>
                <input type='text' class='form-control' id='cep' name='cep' value='$dado->cep_endereco' maxlength='8' required>
            </div>
    ";
}
;

function buildTel($dado)
{
    echo "
            <div class='mb-3'>
                <label for='num' class='form-label'>Número</label>
                <input type='text' class='form-control' id='num' name='num' value='$dado->numero_telefone' required>
            </div>
            ";
}

function buildProd($dado)
{
    echo "
            <div class='mb-3'>
                <label for='nome' class='form-label'>Nome produto</label>
                <input type='text' class='form-control' id='nome' name='nome' value='$dado->nome_produto' required>
            </div>
            <div class='mb-3'>
                <label for='preco' class='form-label'>Preço produto</label>
                <input type='number' class='form-control' id='preco' name='preco' value='$dado->preco_produto' min='0' max='1000' required>
            </div>
            <div class='mb-3'>
                <label for='desc' class='form-label'>Descrição produto</label>
                <input type='textarea' class='form-control' id='desc' name='desc' value='$dado->desc_produto'required>
            </div>
    ";
}
;

function buildPed($dado)
{
    echo "
            <div class='mb-3'>
                <label for='status' class='form-label'>Status do Pedido</label>
                <input type='text' class='form-control' id='status' name='status' value='$dado->status_pedido'required>
            </div>
    ";
}
;

function buildItem($dado)
{
    echo "
            <div class='mb-3'>
                <label for='quant' class='form-label'>Quantidade de itens</label>
                <input type='text' class='form-control' id='quant' name='quant' value='$dado->quantidade_item'required>
            </div>
    ";
}
;

function buildEsp($dado)
{
    echo "
            <div class='mb-3'>
                <label for='tam' class='form-label'>Tamanho da Especificação</label>
                <input type='text' class='form-control' id='tam' name='tam' value='$dado->tamanho_espec' required>
            </div>
            <div class='mb-3'>
                <label for='cor' class='form-label'>Cor da Especificação</label>
                <input type='text' class='form-control' id='cor' name='cor' value='$dado->cor_espec' required>
            </div>
            <div class='mb-3'>
                <label for='quant' class='form-label'>Quantidade da Especificação</label>
                <input type='text' class='form-control' id='quant' name='quant' value='$dado->quantidade_espec' required>
            </div>
            <div class='mb-3'>
                <label for='imagem1' class='form-label'>Imagem 1 </label>
                <input type='file' class='form-control' id='imagem1' name='img1' value='$dado->imagem1_espec'>
            </div>
            <div class='mb-3'>
                <label for='imagem2' class='form-label'>Imagem 2 </label>
                <input type='file' class='form-control' id='imagem2' name='img2' value='$dado->imagem2_espec'>
            </div>
    ";
}
;

?>
<!DOCTYPE html>
<html lang="pt-br">
<br>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Dado</title>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulário</title>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>

<body>
    <div class="container mt-5">
        <!-- https://pqina.nl/blog/image-upload-with-php/ -->
        <form method="post" enctype="multipart/form-data">
            <?php
            if ($_REQUEST['tipo'] == 'user') {
                buildUser($data[$_REQUEST['id']]);
            } else if ($_REQUEST['tipo'] == 'end') {
                buildEnd($data[$_REQUEST['id']]);
            } else if ($_REQUEST['tipo'] == 'tel') {
                buildTel($data[$_REQUEST['id']]);
            } else if ($_REQUEST['tipo'] == 'prod') {
                buildProd($data[$_REQUEST['id']]);
            } else if ($_REQUEST['tipo'] == 'ped') {
                buildPed($data[$_REQUEST['id']]);
            } else if ($_REQUEST['tipo'] == 'item') {
                buildItem($data[$_REQUEST['id']]);
            } else if ($_REQUEST['tipo'] == 'esp') {
                buildEsp($data[$_REQUEST['id']]);
            }
            ?>
            <button type='submit' class='btn btn-primary'>Enviar</button>
        </form>
    </div>
</body>

</html>