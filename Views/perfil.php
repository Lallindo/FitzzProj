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

