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

        <?php if(isset($_SESSION['message'])): ?>
            <div class="info-box">
                <div class="info-text">
                    <?= $_SESSION['message'] ?>
                </div>
                <div class="info-delete">×</div>
            </div>
            <?php unset($_SESSION['message']); ?>
        <?php endif ?>
        
        <div class="groups-header">
            <h2>GROUPS</h2>
            <?php if (isset($_SESSION['isLoggedIn'])) : ?>
                <form action="creategroup.php" method="POST">
                    <input type="text" name="name" placeholder="Enter group name">
                    <button type="submit" name="submit">New group</button>
                </form>
            <?php endif ?>
        </div>
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
                    <?php if ($_SESSION['username'] == $row['username']) : ?>
                        <a href="deletegroup.php?id=<?= $row['id'] ?>"><button id="delete-group">Delete</button></a>
                    <?php endif ?>
                </div>
            </a>
            <?php endforeach ?>
        </div>
    </div>

    <script>
        var infoBox = document.querySelector('.info-box');
        var deleteBtn = document.querySelector('.info-delete');

        deleteBtn.addEventListener("click", (e) => {infoBox.remove()});
    </script>
</body>
</html>
