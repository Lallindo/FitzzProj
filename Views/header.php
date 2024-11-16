<?php
session_start();
require_once '../models/conexao.php';

require_once '../models/classes/usuario.class.php';
require_once '../models/classes/telefone.class.php';
require_once '../models/classes/endereco.class.php';
require_once '../models/classes/produto.class.php';
require_once '../models/classes/especificacao.class.php';
require_once '../models/classes/item.class.php';
require_once '../models/classes/pedido.class.php';

require_once '../models/daos/usuario.dao.php';
require_once '../models/daos/telefone.dao.php';
require_once '../models/daos/endereco.dao.php';
require_once '../models/daos/produto.dao.php';
require_once '../models/daos/especificacao.dao.php';
require_once '../models/daos/item.dao.php';
require_once '../models/daos/pedido.dao.php';

ini_set("allow_url_fopen", 1);
// Habilita abertura de arquivos com a URL
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Styles/style.css">
    <!-- CDN do BootStrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Logo</a>
        </div>
    </nav>
    <!-- CDN do BootStrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>