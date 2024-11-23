<?php
require_once 'header.php';

var_dump($_SESSION);
var_dump($_COOKIE);

$usuarioDAO = new UsuarioDAO($pdo);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Usuário</title>
</head>
<body class="bg-light">

<a href="logout.php">LOGOUT</a>

<div class="menu_lateral">
        <span class="pedidos">Pedidos</span>
        <span class="dados">Meus Dados</span>
        <span class="enderecos">Endereços</span>
        <span class="celulares">Telefones</span>
    </div>

    <div id="conteudo">
        <h1>Dados Pessoais</h1>
        <form action="/dados_pessoais" method="post">
            <label for="nome">Nome Completo</label>
            <input class="inputs" type="text" id="nome" name="nome" placeholder="" required>

            <label for="nascimento">Data de Nascimento</label>
            <input class="inputs" type="text" id="nascimento" name="nascimento" placeholder="" required>

            <label for="cpf">CPF</label>
            <input class="inputs" type="text" id="cpf" name="cpf" placeholder="" required>

            <div class="botoes">
                <button class="btn_concluir" type="submit">Editar</button>
            </div>
        </form>
    </div>

<div class="container my-5">
    <h1 class="mb-4">Perfil do Usuário</h1>

    <!-- Informações básicas -->
    <div class="mb-4">
        <p><strong>Nome:</strong> <?= $_SESSION['user_name'] ?></p>
        <p><strong>Email:</strong> <?= $_SESSION['user_email'] ?></p>
    </div>

    <!-- Telefones -->
    <div class="mb-5">
        <h2 class="mb-3">Telefones</h2>
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Telefone</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    
                    foreach($usuarioDAO->buscarTelefone(new Usuario(id_usuario: $_SESSION['user_id'])) as $tel) {
                        echo 
                        "<tr>
                            <td>{$tel->numero_telefone}</td>
                            <td>    
                                <button class='btn btn-warning btn-sm'>Alterar</button>
                                <button class='btn btn-danger btn-sm'>Remover</button>
                            </td>
                        </tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Endereços -->
    <div class="mb-5">
        <h2 class="mb-3">Endereços</h2>
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Endereço</th>
                    <th>Bairro</th>
                    <th>Cidade</th>
                    <th>UF</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($usuarioDAO->buscarEndereco(new Usuario(id_usuario: $_SESSION['user_id'])) as $end) {
                        echo 
                        "<tr>
                            <td>{$end->rua_endereco}</td>
                            <td>{$end->bairro_endereco}</td>
                            <td>{$end->cidade_endereco}</td>
                            <td>{$end->estado_endereco}</td>
                            <td>    
                                <button class='btn btn-warning btn-sm'>Alterar</button>
                                <button class='btn btn-danger btn-sm'>Remover</button>
                            </td>
                        </tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Pedidos -->
    <div>
        <h2 class="mb-3">Pedidos</h2>
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID do Pedido</th>
                    <th>Data</th>
                    <th>Status</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($usuarioDAO->buscarPedido(new Usuario(id_usuario: $_SESSION['user_id'])) as $ped) {
                        echo 
                        "<tr>
                            <td>{$ped->id_pedido}</td>
                            <td>{$ped->id_endereco_pedido}</td>
                            <td>{$ped->datacriacao_pedido}</td>
                            <td>{$ped->status_pedido}</td> 
                        </tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>

