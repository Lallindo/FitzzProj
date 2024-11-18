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
                    
                
                var_dump($usuarioDAO->buscarPorId(new Usuario(id_usuario: $_SESSION['user_id'])));

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
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Rua das Flores, 123, São Paulo - SP</td>
                    <td><button class="btn btn-danger btn-sm">Remover</button></td>
                </tr>
                <tr>
                    <td>Avenida Central, 456, Rio de Janeiro - RJ</td>
                    <td><button class="btn btn-danger btn-sm">Remover</button></td>
                </tr>
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
                <tr>
                    <td>#1234</td>
                    <td>2024-11-01</td>
                    <td><span class="badge bg-success">Concluído</span></td>
                    <td>R$ 150,00</td>
                </tr>
                <tr>
                    <td>#1235</td>
                    <td>2024-11-10</td>
                    <td><span class="badge bg-warning">Em processamento</span></td>
                    <td>R$ 200,00</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>

