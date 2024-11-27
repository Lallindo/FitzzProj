<?php
require_once 'header.php';

if ($_SESSION['user_is_adm'] != 1) {
    header('location: index.php');
}

$usuarioDAO = new UsuarioDAO($pdo);
$usuario = new Usuario($_SESSION['user_id']);

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
};


function buildUser($dado)
{
    echo "
            <div class='mb-3'>
                <label for='nome' class='form-label'>Nome do Usuário</label>
                <input type='text' class='form-control' id='nome' value='$dado->nomecomp_usuario' required>
            </div>
            <div class='mb-3'>
                <label for='cpf' class='form-label'>CPF</label>
                <input type='text' class='form-control' id='cpf' value='$dado->cpf_usuario' required>
            </div>
            <div class='mb-3'>
                <label for='email' class='form-label'>Email</label>
                <input type='email' class='form-control' id='email' value='$dado->email_usuario' required>
            </div>
            <div class='mb-3'>
                <label for='senha' class='form-label'>Senha</label>
                <input type='password' class='form-control' id='senha' placeholder='Digite sua senha' required>
            </div>
            <div class='mb-3'>
                <label for='dataNascimento' class='form-label'>Data de Nascimento</label>
                <input type='date' class='form-control' id='dataNascimento' value='$dado->datanasc_usuario' required>
            </div>";
};

function buildEnd($dado) {
    echo "
            <div class='mb-3'>
                <label for='rua' class='form-label'>Rua</label>
                <input type='text' class='form-control' id='rua' value='$dado->rua_endereco' required>
            </div>
            <div class='mb-3'>
                <label for='bairro' class='form-label'>Bairro</label>
                <input type='text' class='form-control' id='CEP' value='$dado->bairro_endereco' required>
            </div>
            <div class='mb-3'>
                <label for='padrao' class='form-label'>É padrão</label>
                <input type='padrao' class='form-control' id='padrao' value='$dado->padrao_endereco' required>
            </div>
            <div class='mb-3'>
                <label for='cep' class='form-label'>CEP</label>
                <input type='text' class='form-control' id='cep' value='$dado->cep_endereco' maxlength='8' required>
            </div>
    ";
};

function buildTel($dado) {
    echo "
            <div class='mb-3'>
                <label for='num' class='form-label'>Número</label>
                <input type='text' class='form-control' id='num' value='$dado->numero_telefone' required>
            </div>
            ";
}

function buildProd($dado) {
    echo "
            <div class='mb-3'>
                <label for='nome' class='form-label'>Nome produto</label>
                <input type='text' class='form-control' id='nome' value='$dado->nome_produto' required>
            </div>
            <div class='mb-3'>
                <label for='preco' class='form-label'>Preço produto</label>
                <input type='number' class='form-control' id='preco' value='$dado->preco_produto' min='0' max='1000' required>
            </div>
            <div class='mb-3'>
                <label for='desc' class='form-label'>Descrição produto</label>
                <input type='textarea' class='form-control' id='desc' value='$dado->desc_produto'required>
            </div>
    ";
};

function buildPed($dado) {
    echo "
            <div class='mb-3'>
                <label for='status' class='form-label'>Status do Pedido</label>
                <input type='text' class='form-control' id='status' value='$dado->status_pedido'required>
            </div>
    ";
};

function buildItem($dado) {
    echo "
            <div class='mb-3'>
                <label for='quant' class='form-label'>Quantidade de itens</label>
                <input type='text' class='form-control' id='quant' value='$dado->quantidade_item'required>
            </div>
    ";
};

function buildEsp($dado) {
    echo "
            <div class='mb-3'>
                <label for='tam' class='form-label'>Tamanho da Especificação</label>
                <input type='text' class='form-control' id='tam' value='$dado->tamanho_espec' required>
            </div>
            <div class='mb-3'>
                <label for='cor' class='form-label'>Cor da Especificação</label>
                <input type='text' class='form-control' id='cor' value='$dado->cor_espec' required>
            </div>
            <div class='mb-3'>
                <label for='quant' class='form-label'>Quantidade da Especificação</label>
                <input type='text' class='form-control' id='quant' value='$dado->quantidade_espec' required>
            </div>
            <div class='mb-3'>
                <label for='img1' class='form-label'>Imagem 1</label>
                <input type='text' class='form-control' id='img1' value='$dado->imagem1_espec' required>
            </div>
            <div class='mb-3'>
                <label for='img2' class='form-label'>Imagem 2</label>
                <input type='text' class='form-control' id='img2' value='$dado->imagem2_espec' required>
            </div>
    ";
};

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
        <form>
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