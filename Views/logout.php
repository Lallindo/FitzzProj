<?php
if (isset($_SESSION['user_id'])) {
    $_SESSION['user_id'] = null;
    $_COOKIE['PHPSESSID'] = null;
    session_destroy();    
    header('location: login.php');
} else {
    header('location: perfil.php');
}

