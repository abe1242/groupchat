<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Group</title>
    <link rel="stylesheet" href="style/index.css">
    <style>
        .message.<?= $_SESSION['username'] ?> .message-text {
            color: black;
            background: #e8ffec;
        }
    </style>
</head>
<body>
    <?php include "header.php" ?>
    <div class="container">
        <?php
        ini_set('display_errors', 'on');
                
        include 'config.php';

        if(isset($_GET['id'])) {
            $res = $con->query("SELECT * FROM `groups` WHERE `id` = {$_GET['id']}")->fetch_assoc();
            $group_id = $res["id"];
            $group_name = $res["name"];

            $sql = <<<QUERY
                SELECT m.id message_id, m.message, m.post_date, u.name, u.username, u.id user_id, g.name group_name FROM `messages` m
                INNER JOIN `users` u ON m.`user_id` = u.`id`
                INNER JOIN `groups` g ON m.`group_id` = g.`id`
                WHERE m.`group_id` = {$_GET['id']}
                ORDER BY m.post_date
            QUERY;

            $res = $con->query($sql)->fetch_all(MYSQLI_ASSOC);

            $con->close();
        } else {
            die("Group id is not provided");
        }
        ?>

        <h2><?= $group_name ?></h2>
        <div class="messages">
            <?php foreach ($res as $row): ?>
                <div class="message <?= $row['username'] ?>">
                    <?php if (!(isset($_SESSION["isLoggedIn"]) && $_SESSION["username"] == $row['username'])) : ?>
                        <div class="message-author"><?= $row['name'] ?></div>
                    <?php endif ?>
                    <div class="message-text"><?= $row['message'] ?></div>
                </div><br>
            <?php endforeach ?>
            <div class="new-message">
                <form action="newmessage.php" method="POST" class="post-message">
                    <input type="text" name="group-id" value="<?= $group_id ?>" hidden>
                    <?php if (isset($_SESSION["isLoggedIn"])) : ?>
                        <input type="text" name="message" id="input-message" placeholder="Message">
                        <input type="submit" name="submit" id="send-message" value="">
                    <?php else : ?>
                        <input type="text" name="message" placeholder="Login to send message" disabled>
                        <input type="submit" name="submit" value="" id="send-message" disabled>
                    <?php endif ?>
                </form>
            </div>
        </div>
    </div>
</body>
</html>