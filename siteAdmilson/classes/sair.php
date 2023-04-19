<?php
    session_start();
    ob_start();
    unset($_SESSION['id'], $_SESSION['nome']);

    $_SESSION['logout'] = true;
    header('location:../login.php');
?>