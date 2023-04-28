<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Group</title>
    <link rel="stylesheet" href="style/index.css">
</head>
<body>
    <?php include "header.php" ?>
    <div class="container">
        <?php
        ini_set('display_errors', 'on');
                
        include 'config.php';

        if(isset($_GET['id'])) {
            $group_name = $con->query("SELECT name FROM `groups` WHERE `id` = {$_GET['id']}")->fetch_assoc()["name"];

            $sql = <<<QUERY
                SELECT m.id message_id, m.message, m.post_date, u.name, u.id user_id, g.name group_name FROM `messages` m
                INNER JOIN `users` u ON m.`user_id` = u.`id`
                INNER JOIN `groups` g ON m.`group_id` = g.`id`
                WHERE m.`group_id` = {$_GET['id']}
            QUERY;
            $result = $con->query($sql);
            $res = $result->fetch_all(MYSQLI_ASSOC);

            $con->close();
        } else {
            die("Group id is not provided");
        }
        ?>

        <h2><?= $group_name ?></h2>
        <div class="messages">
            <?php foreach ($res as $row): ?>
                <div class="message">
                    <div class="message-author"><?= $row['name'] ?></div>
                    <div class="message-text"><?= $row['message'] ?></div>
                </div><br>
            <?php endforeach ?>
            <div class="new-message">
                <form action="newmessage.php" method="POST" class="post-message">
                    <?php if (isset($_SESSION["isLoggedIn"])) : ?>
                        <input type="text" name="message" placeholder="Send a message">
                        <input type="submit" value="Send">
                    <?php else : ?>
                        <input type="text" name="message" placeholder="Login to send message" disabled>
                        <input type="submit" value="Send" disabled>
                    <?php endif ?>
                </form>
            </div>
        </div>
    </div>
</body>
</html>