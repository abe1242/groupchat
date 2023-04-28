<?php
    if(isset($_POST["submit"])) {
        session_start();

        include "config.php";

        $groupname = $_POST['name'];
        $userid = $_SESSION['userid'];

        $sql = "INSERT INTO `groups`(`name`, `user_id`) VALUES('$groupname', $userid)";

        if ($con->query($sql))
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        else
            echo "Error: Could not create group";

        $con->close();
    }
?>