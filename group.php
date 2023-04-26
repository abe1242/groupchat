<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <?php
        ini_set('display_errors', 'on');
                
        include 'config.php';

        if(isset($_GET['id'])) {
            $sql = <<<QUERY
                SELECT m.id message_id, m.message, m.post_date, u.name, u.id user_id FROM `messages` m
                INNER JOIN `users` u ON m.`user_id` = u.`id`
                WHERE m.`group_id` = ?
            QUERY;
            $stmt = $con->prepare($sql);
            $stmt->bind_param("i", $_GET['id']);
            $stmt->execute();
            $result = $stmt->get_result();
            $res = $result->fetch_all(MYSQLI_ASSOC);

            $stmt->close();
            $con->close();
        } else {
            die("Group id is not provided");
        }
        ?>

        <?php include "header.php" ?>
        <h2>Messages</h2>
        <div class="messages">
            <?php foreach ($res as $row): ?>
                <div class="message">
                    <div class="message-author"><?= $row['name'] ?></div>
                    <div class="message-text"><?= $row['message'] ?></div>
                </div><br>
            <?php endforeach ?>
            <div class="new-message">
                <form action="newmessage.php" method="POST" class="post-message">
                    <input type="text" name="message">
                    <input type="submit" value="Send">
                </form>
            </div>
        </div>
    </div>
</body>
</html>