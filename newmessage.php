<?php
    session_start();

    if(isset($_POST["submit"])) {
        include "config.php";
    
        $message = $_POST['message'];
        $group_id = $_POST['group-id'];
    
        $sql = <<<QUERY
            INSERT INTO `messages` (`message`, `post_date`, `group_id`, `user_id`)
            VALUES ('$message', NOW(), $group_id, {$_SESSION["userid"]})
        QUERY;
        echo $sql;
    
        if ($con->query($sql))
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        else
            echo "Error: Could not send message";
    
        $con->close();
    }
?>