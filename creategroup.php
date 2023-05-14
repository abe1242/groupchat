<?php
    if(isset($_POST["submit"])) {
        session_start();

        include "config.php";

        $groupname = $_POST['name'];
        $userid = $_SESSION['userid'];

        $sql = "INSERT INTO `groups`(`name`, `user_id`) VALUES('$groupname', $userid)";

        if ($groupname == "" || !$con->query($sql))
            $_SESSION['message'] = "Error: Could not create group";

        header('Location: ' . $_SERVER['HTTP_REFERER']);

        $con->close();
    }
?>