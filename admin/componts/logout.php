<?php
    session_start();
    unset($_SESSION['IS_LOGIN']);
    header('Location:../login.php');
    die();
?>