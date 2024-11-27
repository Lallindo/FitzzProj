<?php
require_once 'header.php';

if ($_SESSION['user_is_adm'] != 1) {
    header('location: index.php');
}

$usuarioDAO = new UsuarioDAO($pdo);
$data = [];

if (($_REQUEST['table'] === 'users')) {
    $data = $usuarioDAO->buscarTodos(new Usuario($_SESSION['user_id']));
} else if ($_REQUEST['table'] === 'addresses') {
    $data = $usuarioDAO->buscarTodosEnd(new Usuario($_SESSION['user_id']));
} else if ($_REQUEST['table'] === 'phones') {
    $data = $usuarioDAO->buscarTodosTel(new Usuario($_SESSION['user_id']));
} else if ($_REQUEST['table'] === 'products') {
    $data = $usuarioDAO->buscarTodosPro(new Usuario($_SESSION['user_id']));
} else if ($_REQUEST['table'] === 'orders') {
    $data = $usuarioDAO->buscarTodosPed(new Usuario($_SESSION['user_id']));
} else if ($_REQUEST['table'] === 'items') {
    $data = $usuarioDAO->buscarTodosItem(new Usuario($_SESSION['user_id']));
} else if ($_REQUEST['table'] === 'specs') {
    $data = $usuarioDAO->buscarTodosEsp(new Usuario($_SESSION['user_id']));
};

function tableUser() {
    echo
    "<tr>
        <th>ID</th>
        <th>Nome</th>
        <th>CPF</th>
        <th>Email</th>
        <th>Data Criação</th>
        <th>Data Nascimento</th>
        <th>Ações</th>
    </tr>";
};

function buildTableUser($data, $i) {
    echo 
    "
    <tr id='tr-user-$i'>
        <td>$data->id_usuario</td>
        <td>$data->nomecomp_usuario</td>
        <td>$data->cpf_usuario</td>
        <td>$data->email_usuario</td>
        <td>$data->datacriacao_usuario</td>
        <td>$data->datanasc_usuario</td>
        <td>
            <button class='btn btn-warning btn-alt'>A</button>
            <button class='btn btn-danger btn-rem'>R</button>
        </td>
    </tr>";
};

function tableEnd() {
    echo
    "<tr>
        <th>ID</th>
        <th>ID Usuário</th>
        <th>Padrão</th>
        <th>Rua</th>
        <th>Bairro</th>
        <th>CEP</th>
        <th>Ações</th>
    </tr>";
};

function buildTableEnd($data, $i) {
    echo 
    "
    <tr  id='tr-end-$i'>
        <td>$data->id_endereco</td>
        <td>$data->id_usuario_endereco</td>
        <td>$data->padrao_endereco</td>
        <td>$data->rua_endereco</td>
        <td>$data->bairro_endereco</td>
        <td>$data->cep_endereco</td>
        <td>
            <button class='btn btn-warning btn-alt'>A</button>
            <button class='btn btn-danger btn-rem'>R</button>
        </td>
    </tr>";
};

function tableTel() {
    echo
    "<tr>
        <td>ID</td>
        <td>ID Usuário</td>
        <td>Número</td>
        <th>Ações</th>
    </tr>";
};

function buildTableTel($data, $i) {
    echo
    "<tr id='tr-tel-$i'>
        <td>$data->id_telefone</td>
        <td>$data->id_usuario_telefone</td>
        <td>$data->numero_telefone</td>
        <td>
            <button class='btn btn-warning btn-alt'>A</button>
            <button class='btn btn-danger btn-rem'>R</button>
        </td>
    </tr>";
};

function tableProd() {
    echo
    "<tr>
        <td>ID</td>
        <td>Preço</td>
        <td>Nome</td>
        <td>Desc</td>
        <th>Ações</th>
    </tr>";
};

function buildTableProd($data, $i) {
    echo
    "<tr id='tr-prod-$i'>
        <td>$data->id_produto</td>
        <td>$data->preco_produto</td>
        <td>$data->nome_produto</td>
        <td>$data->desc_produto</td>
        <td>
            <button class='btn btn-warning btn-alt'>A</button>
            <button class='btn btn-danger btn-rem'>R</button>
        </td>
    </tr>";
};

function tablePed() {
    echo
    "<tr>
        <td>ID</td>
        <td>ID Endereço</td>
        <td>ID Usuário</td>
        <td>Valor</td>
        <td>Tipo de Pagamento</td>
        <td>Status do Pagamento</td>
        <td>Data Criação</td>
        <th>Ações</th>
    </tr>";
};

function buildTablePed($data, $i) {
    echo
    "<tr id='tr-ped-$i'>
        <td>$data->id_pedido</td>
        <td>$data->id_endereco_pedido</td>
        <td>$data->id_usuario_pedido</td>
        <td>$data->valor_pedido</td>
        <td>$data->pagamento_pedido</td>
        <td>$data->status_pedido</td>
        <td>$data->datacriacao_pedido</td>
        <td>
            <button class='btn btn-warning btn-alt'>A</button>
            <button class='btn btn-danger btn-rem'>R</button>
        </td>
    </tr>";
};

function tableItem() {
    echo
    "<tr>
        <td>ID</td>
        <td>ID do Pedido</td>
        <td>ID da Especificação</td>
        <td>Quantidade</td>
        <th>Ações</th>
    </tr>";
};

function buildTableItem($data, $i) {
    echo
    "<tr id='tr-item-$i'>
        <td>$data->id_item</td>
        <td>$data->id_pedido_item</td>
        <td>$data->id_espec_item</td>
        <td>$data->quantidade_item</td>
        <td>
            <button class='btn btn-warning btn-alt'>A</button>
            <button class='btn btn-danger btn-rem'>R</button>
        </td>
    </tr>";
};

function tableEsp() {
    echo
    "<tr>
        <td>ID</td>
        <td>ID do Produto</td>
        <td>Cor</td>
        <td>Tamanho</td>
        <td>Quantidade</td>
        <td>Imagem1</td>
        <td>Imagem2</td>
        <th>Ações</th>
    </tr>";
};

function buildTableEsp($data, $i) {
    echo
    "<tr id='tr-esp-$i'>
        <td>$data->id_espec</td>
        <td>$data->id_prod_espec</td>
        <td>$data->cor_espec</td>
        <td>$data->tamanho_espec</td>
        <td>$data->quantidade_espec</td>
        <td>$data->imagem1_espec</td>
        <td>$data->imagem2_espec</td>
        <td>
            <button class='btn btn-warning btn-alt'>A</button>
            <button class='btn btn-danger btn-rem'>R</button>
        </td>
    </tr>";
};

?>
<!DOCTYPE html>
<html lang="pt-BR">
<br>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo</title>
    <link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-2.1.8/datatables.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <h1 class="text-center mb-4">Painel Administrativo</h1>
        
        <!-- Botões de Menu -->
        <div class="d-flex justify-content-center mb-4">
            <button class="btn btn-primary me-2" onclick="changeTable('users')">Usuários</button>
            <button class="btn btn-secondary me-2" onclick="changeTable('addresses')">Endereços</button>
            <button class="btn btn-success me-2" onclick="changeTable('phones')">Telefones</button>
            <button class="btn btn-warning me-2" onclick="changeTable('products')">Produtos</button>
            <button class="btn btn-danger me-2" onclick="changeTable('orders')">Pedidos</button>
            <button class="btn btn-primary me-2" onclick="changeTable('items')">Itens</button>
            <button class="btn btn-secondary" onclick="changeTable('specs')">Especificações</button>
        </div>

        <!-- Tabela -->
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead class="table-dark">
                    <?php 
                        if ($_REQUEST['table'] == 'users') {
                            tableUser();
                        } else if ($_REQUEST['table'] == 'addresses') {
                            tableEnd();
                        } else if ($_REQUEST['table'] == 'phones') {
                            tableTel();
                        } else if ($_REQUEST['table'] == 'products') {
                            tableProd();
                        } else if ($_REQUEST['table'] == 'orders') {
                            tablePed();
                        } else if ($_REQUEST['table'] == 'items') {
                            tableItem();
                        } else if ($_REQUEST['table'] == 'specs') {
                            tableEsp();
                        } ;
                    ?> 
                </thead>
                <tbody>
                    <?php 
                    $i = 0;
                        if ($_REQUEST['table'] == 'users') {
                            foreach($data as $user) {
                                buildTableUser($user, $i);
                                $i++;
                            };
                        } else if ($_REQUEST['table'] == 'addresses') {
                            foreach($data as $end) {
                                buildTableEnd($end, $i);
                                $i++;
                            };
                        } else if ($_REQUEST['table'] == 'phones') {
                            foreach($data as $tel) {
                                buildTableTel($tel, $i);
                                $i++;
                            };
                        } else if ($_REQUEST['table'] == 'products') {
                            foreach($data as $prod) {
                                buildTableProd($prod, $i);
                                $i++;
                            };
                        } else if ($_REQUEST['table'] == 'orders') {
                            foreach($data as $ped) {
                                buildTablePed($ped, $i);
                                $i++;
                            };
                        } else if ($_REQUEST['table'] == 'items') {
                            foreach($data as $item) {
                                buildTableItem($item, $i);
                                $i++;
                            };
                        } else if ($_REQUEST['table'] == 'specs') {
                            foreach($data as $esp) {
                                buildTableEsp($esp, $i);
                                $i++;
                            };
                        };
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-2.1.8/datatables.min.js"></script>
    <script>
        function changeTable(tableName) {
            window.location.href = "?table=" + tableName;
        }
        $('table').dataTable()
    </script>
    <script src="../scripts/alterarDados.js"></script>
</body>
</html>
