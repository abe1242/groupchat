<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style/index.css">
</head>
<body>
    <?php include "header.php" ?>
    <div class="container">
        <?php
            // ini_set('display_errors', 'on');
            
            include 'config.php';
            
            $sql = <<<QUERY
                SELECT `groups`.`name`, `groups`.`id`, `users`.`username` FROM `groups`
                INNER JOIN `users` ON `groups`.`user_id` = `users`.`id`
                ORDER BY `groups`.`name`;
            QUERY;
            $result = $con->query($sql)->fetch_all(MYSQLI_ASSOC);

            $con->close();
        ?>

        <h2>TOPICS</h2>
        <div class="groups">
            <?php foreach ($result as $row): ?>
            <a href="group.php?id=<?= $row['id']?>">
                <div class="group-details">
                    <div class="group-title">
                        <span class="group-logo">
                            <img src="https://source.unsplash.com/random/50x50/?<?= $row['name']?>">
                        </span>
                        <span class="group-name"><?= $row['name'] ?></span>
                    </div>
                    <?php if (isset($_SESSION['isLoggedIn'])) : ?>
                        <a href="deletegroup.php?id=<?= $row['id'] ?>"><button>Delete</button></a>
                    <?php endif ?>
                </div>
            </a>
            <?php endforeach ?>
        </div>
    </div>
</body>
</html>
