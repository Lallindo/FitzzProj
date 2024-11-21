<?php
// Registro está funcionando
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

// ini_set("allow_url_fopen", 1);
// Habilita abertura de arquivos com a URL
// Era usado quando a API era chamada pelo PHP
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Styles/style.css">
    <link rel="stylesheet" href="../Styles/produto_Style.css">
    <link rel="stylesheet" href="../Styles/nav.css">
    <link rel="stylesheet" href="../Styles/cadastro.css">
    <link rel="stylesheet" href="../Styles/login.css">
    <link rel="stylesheet" href="../Styles/dados_pessoais.css">
    <link rel="stylesheet" href="../Styles/index.css">
    <!-- CDN do BootStrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <nav>
        <a href="index.php">
            <img class="logo_nav" src="../Images/logo.webp" alt="" draggable="false">
        </a>
        <ul id="menu">
            <li style="padding-bottom: 0.850rem;border-bottom-style: solid;border-bottom-width: 0.200rem;border-bottom-color: #FBD316;"><a href="index.php">HOME</a></li>
            <!-- NÃO CLIQUE NOS BOTOES AINDA -->
            <li><a href="catalogo_filtro.php?filtro=camiseta">CAMISETAS</a></li>
            <li><a href="catalogo_filtro.php?filtro=moletom">MOLETONS</a></li>
            <li><a href="catalogo_filtro.php?filtro=bermuda">BERMUDAS</a></li>
            <!-- NÃO CLIQUE NOS BOTOES AINDA -->
            
            <?php
                if(isset($_SESSION['user_id'])) {
                    echo "<li><a href='perfil.php'><img class='icone_menu' src='../Images/user.ico' alt='' draggable='false'></a></li>";
                } else {
                    echo "<li><a href='login.php'><img class='icone_menu' src='../Images/user.ico' alt='' draggable='false'></a></li>";
                }
            ?>
            
            <li><img class="icone_menu" src="../Images/shopping-cart.ico" alt="" draggable="false"></li>
            <li><img class="icone_menu" src="../Images/lupa.ico" alt="" draggable="false"></li>
        </ul>
    </nav>
    <!-- CDN do BootStrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>