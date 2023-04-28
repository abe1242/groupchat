<?php
    ini_set('display_errors', 'on');

    if(isset($_POST["submit"])) {
        $username =  $_POST['username'];
        $password = $_POST['password'];

        include "config.php";
        
        $sql = <<<QUERY
            SELECT * FROM `users` WHERE `username`='$username'
        QUERY;

        $result = $con->query($sql)->fetch_assoc();

        echo var_dump($con->affected_rows);
        if ($con->affected_rows == 1 && $result['passwd'] == $password) {
            $_SESSION["userid"] = $result['id'];
            $_SESSION["username"] = $username;
            header("Location: index.php");
        } else {
            die("You have entered wrong username or password");
        }
        
    }
?>