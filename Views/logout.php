<?php
require_once "header.php";

if (isset($_SESSION['user_id'])) {
    // Tira os dados da sessão
    $_SESSION = [];
    // Destroi a sessão
    session_destroy();
    header('location: login.php');
}
