<?php
require_once 'header.php';

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

    <!-- <div id="conteudo">
        <h1>Dados Pessoais</h1>
        <form action="/dados_pessoais" method="post">
            <label for="nome">Nome Completo</label>
            <input class="inputs" type="text" id="nome" name="nome" placeholder="" value="">

            <label for="nascimento">Data de Nascimento</label>
            <input class="inputs" type="text" id="nascimento" name="nascimento" placeholder="">

            <label for="cpf">CPF</label>
            <input class="inputs" type="text" id="cpf" name="cpf" placeholder="">

            <div class="botoes">
                <button class="btn_concluir" type="submit">Editar</button>
            </div>
        </form>
    </div> -->

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
        <button type="button" class="btn-primary">ADICIONAR</button>
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Telefone</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $i = 0;
                    foreach($usuarioDAO->buscarTelefone(new Usuario(id_usuario: $_SESSION['user_id'])) as $tel) {
                        echo 
                        "<tr>
                            <td><input id='inp-tel-{$i}' value='{$tel->numero_telefone}' type='tel' maxlength='11'></td>
                            <td>    
                                <button class='btn btn-success btn-sm alt-tel'>Adicionar</button>
                                <button id='tel-alt-{$i}' class='btn btn-warning btn-sm'>Alterar</button>
                                <button id='tel-rem-{$i}' class='btn btn-danger btn-sm'>Remover</button>
                            </td>
                        </tr>";
                    $i++;
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="../scripts/alterarDados.js"></script>
</body>
</html>