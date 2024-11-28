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
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Telefone</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody id="tel-body">
                    <?php
                    $i = 0;
                    foreach ($usuarioDAO->buscarTelefone(new Usuario(id_usuario: $_SESSION['user_id'])) as $tel) {
                        echo
                            "<tr id='tr-{$i}'>
                            <td>
                                <input id='inp-tel-{$i}' value='{$tel->numero_telefone}' type='tel' maxlength='11' class='form-control'>
                            </td>
                            <td>    
                                <button class='btn btn-success btn-sm add-tel'>Adicionar</button>
                                <button id='alt-tel-{$i}' class='btn btn-warning btn-sm alt-tel'>Alterar</button>
                                <button id='rem-tel-{$i}' class='btn btn-danger btn-sm rem-tel'>Remover</button>
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
                        <th>CEP</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 0;
                    foreach ($usuarioDAO->buscarEndereco(new Usuario(id_usuario: $_SESSION['user_id'])) as $end) {
                        echo
                        "<tr id='tr-end-{$i}'>
                            <td><input id='rua-end-{$i}' value='{$end->rua_endereco}' type='text' class='form-control'></td>
                            <td><input id='bairro-end-{$i}' value='{$end->bairro_endereco}' type='text' class='form-control'></td>
                            <td><input id='cep-end-{$i}' value='{$end->cep_endereco}' type='text' class='form-control' maxlength='11'></td>
                            <td>    
                                <button class='btn btn-success btn-sm add-end'>Adicionar</button>
                                <button id='alt-end-{$i}' class='btn btn-warning btn-sm alt-end'>Alterar</button>
                                <button id='rem-end-{$i}' class='btn btn-danger btn-sm rem-end'>Remover</button>
                            </td>
                        </tr>";
                        $i++;
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
                    foreach ($usuarioDAO->buscarPedido(new Usuario(id_usuario: $_SESSION['user_id'])) as $ped) {
                        echo
                            "<tr>
                            <td>{$ped->id_pedido}</td>
                            <td>{$ped->datacriacao_pedido}</td>
                            <td>{$ped->status_pedido}</td> 
                            <td>R$ {$ped->valor_pedido}</td> 
                        </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <a href="logout.php">LOGOUT</a>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../scripts/alterarDados.js"></script>
</body>

</html>