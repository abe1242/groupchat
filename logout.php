<?php
    session_start();

    ini_set('display_errors', 'on');

    if(isset($_POST["submit"])) {
        include "config.php";
        
        unset($_SESSION["userid"]);
        unset($_SESSION["username"]);
        unset($_SESSION["isLoggedIn"]);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
?>