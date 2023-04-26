<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
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

        <?php include "header.php" ?>

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
                    <span class="group-owner">@<?= $row['username'] ?></span>
                </div>
            </a>
            <?php endforeach ?>
        </div>
    </div>
</body>
</html>
