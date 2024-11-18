<?php
if (isset($_REQUEST['func']) && session_start()) {
    session_destroy();
    header('location: login.php');
}

