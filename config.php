<?php
    $server = "localhost";
    $username = "root";
    $password = "mysql";
    $database = "groupchat";

    try {
        $con = new mysqli($server, $username, $password, $database);
    } catch(Exception $e) {
        die("Error: " . $e->getMessage());
    }
?>