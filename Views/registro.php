<?php
require_once "header.php";

if ($_POST) {
    
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = password_hash($_POST['senha'], PASSWORD_BCRYPT);
    $dataNasc = date('Y/m/d', strtotime(filter_input(INPUT_POST, 'dataNasc', FILTER_SANITIZE_SPECIAL_CHARS)));
    $numero = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_SPECIAL_CHARS);
    $cep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_SPECIAL_CHARS);
    $num = filter_input(INPUT_POST, 'numEnd', FILTER_SANITIZE_SPECIAL_CHARS);
    $rua = filter_input(INPUT_POST, 'logr', FILTER_SANITIZE_SPECIAL_CHARS);
    $bairro = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_SPECIAL_CHARS);
    $cidade = filter_input(INPUT_POST, 'cid', FILTER_SANITIZE_SPECIAL_CHARS);
    $estado = filter_input(INPUT_POST, 'uf', FILTER_SANITIZE_SPECIAL_CHARS);

    // Feito para inserir apenas os números do cpf no banco
    $cpf1 = explode('.', $cpf);
    $cpf2 = explode('-', $cpf1[2]);
    $cpfBD = $cpf1[0] . $cpf1[1] . $cpf2[0] . $cpf2[1];

    $cep1 = explode('.', $cep);
    $cep2 = explode('-', $cep1[1]);
    $cepBD = $cep1[0] . $cep2[0] . $cep2[1];

    $usuario = new Usuario(
        0, $nome, $cpfBD, $email,
        $senha, date('Y/m/d'), $dataNasc, 
        $numero, 'E', $rua . ', ' . $num, $bairro, $cidade, $uf, $cepBD
    );

    $usuarioDAO = new UsuarioDAO($pdo);

    $usuarioDAO->registrarUsuario($usuario);

    var_dump($usuario);

    // -- Tirar os pontos e barras do CEP e CPF para adicionar no bd-- 
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de usuário</title>
</head>
<body>
    <h1 class="text-center">Registro</h1>

    <form class="row mx-5 align-items-center" method="POST">
        <label class="col-auto" for="nome">Nome:</label>
        <input type="text" name="nome" id="nome">

        <label class="col-auto" for="email">Email:</label>
        <input type="email" name="email" id="email">

        <label class="col-auto" for="cpf">CPF:</label>
        <input type="text" name="cpf" id="cpf" maxlength="14">
        <span class="spanError hidden" id="erCpf">Erro</span>
        <!-- JS para formatação -->

        <label class="col-auto" for="senha">Senha:</label>
        <input type="password" name="senha" id="senha">
        <span class="spanError hidden" id="erSenha">Erro</span>

        <label class="col-auto" for="senhaRep">Repita sua senha:</label>
        <input type="password" name="senhaRep" id="senhaRep">
        <span class="spanError hidden" id="erSenhaRep">Erro</span>
        <!-- Trocas as senhas para Password -->

        <label class="col-auto" for="dataNasc">Data de nascimento:</label>
        <input type="date" name="dataNasc" id="dataNasc">

        <label class="col-auto" for="telefone">Número de telefone:</label>
        <input type="tel" name="telefone" id="telefone">

        <label class="col-auto" for="cep">CEP:</label>
        <input type="text" name="cep" id="cep" maxlength="10">
        <span class="spanError hidden" id="erCep">Erro!</span>
        <!-- JS para formatação -->

        <label class="col-auto" for="numEnd">Número:</label>
        <input type="text" name="numEnd" id="numEnd">

        <label class="col-auto" for="logr">Endereço:</label>
        <input type="text" name="logr" id="logr" readonly>

        <label class="col-auto" for="bairro">Bairro:</label>
        <input type="text" name="bairro" id="bairro" readonly>

        <label class="col-auto" for="cid">Cidade:</label>
        <input type="text" name="cid" id="cid" readonly>

        <label class="col-auto" for="est">Estado:</label>
        <input type="text" name="est" id="est" readonly>

        <button class="btn btn-primary my-4" type="submit" id="btnSub">Registrar-se</button>
    </form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script type="text/javascript" src="../scripts/registro_ver.js"></script>
</body>
</html>