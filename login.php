<?php
    session_start();

    if(isset($_POST["submit"])) {
        $uname =  $_POST['username'];
        $passwd = $_POST['password'];

        include "config.php";
        
        $sql = <<<QUERY
            SELECT * FROM `users` WHERE `username`='$uname'
        QUERY;

        $result = $con->query($sql)->fetch_assoc();

        if ($result && $result['passwd'] == $passwd) {
            $_SESSION["userid"] = $result['id'];
            $_SESSION["username"] = $uname;
            $_SESSION["isLoggedIn"] = "true";
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } else {
            die("You have entered wrong username or password");
        }
        
    }
?>