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
    $num = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_SPECIAL_CHARS);
    $rua = filter_input(INPUT_POST, 'rua', FILTER_SANITIZE_SPECIAL_CHARS);
    $bairro = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_SPECIAL_CHARS);
    $cidade = filter_input(INPUT_POST, 'cid', FILTER_SANITIZE_SPECIAL_CHARS);
    $estado = filter_input(INPUT_POST, 'est', FILTER_SANITIZE_SPECIAL_CHARS);

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
        0, $numero, 'E', $rua . ', ' . $num, $bairro, $cidade, $estado, $cepBD, 0
    );

    $usuarioDAO = new UsuarioDAO($pdo);

    $usuarioDAO->registrarUsuario($usuario);

    if (isset($_SESSION['saved_id'])) {
        header('location: add_carrinho.php');
    }

    var_dump($usuario);

    // -- Tirar os pontos e barras do CEP e CPF para adicionar no bd-- 
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./css/cadastro.css">
    <link rel="stylesheet" href="./css/nav.css">
</head>

<body>

    <div id="conteudo">
        <h1>Cadastro</h1>
        <form method="post">
            <label for="nome">Nome Completo</label>
            <input class="inputs" type="text" id="nome" name="nome" placeholder="Nome" required>

            <label for="dataNasc">Data de Nascimento</label>
            <input class="inputs" type="date" id="dataNasc" name="dataNasc" placeholder="dd/mm/aaaa" required>

            <label for="cpf">CPF</label>
            <input class="inputs" type="text" id="cpf" name="cpf" placeholder="123.456.789-00" maxlength="14" required>

            <label for="telefone">Celular</label>
            <input class="inputs" type="text" id="telefone" name="telefone" placeholder="(99) 99999-9999" required>

            <label for="email">E-mail</label>
            <input class="inputs" type="email" id="email" name="email" placeholder="E-mail" required>

            <label for="senha">Senha</label>
            <input class="inputs" type="password" id="senha" name="senha" placeholder="**********" required>

            <label for="checkSenha">Confirme a Senha</label>
            <input class="inputs" type="password" id="checkSenha" name="checkSenha" placeholder="**********" required>

            <label for="cep">CEP</label>
            <input class="inputs" type="text" id="cep" name="cep" placeholder="12345-000" maxlength="10" required>
            
            <label for="numero">Número</label>
            <input class="inputs" type="text" id="numero" name="numero" placeholder="" required>
            
            <label for="rua">Rua</label>
            <input class="inputs" type="text" id="rua" name="rua" placeholder="" required>

            <label for="bairro">Bairro</label>
            <input class="inputs" type="text" id="bairro" name="bairro" placeholder="" required>
            
            <label for="cid">Cidade</label>
            <input class="inputs" type="text" id="cid" name="cid" placeholder="" required>
            
            <label for="est">Estado</label>
            <input class="inputs" type="text" id="est" name="est" placeholder="" required>



            <div class="botoes">
                <button class="btn_proximo" type="submit" onclick="window.location.href='./cadastro2.html'">Proximo</button>
            </div>
        </form>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="../scripts/registro_ver.js"></script>
</body>

</html>