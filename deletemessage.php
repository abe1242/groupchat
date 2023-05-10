<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete message</title>
</head>
<body>
    <?php
        include "config.php";

        if(isset($_GET['id'])) {
            $sql = <<<QUERY
                DELETE FROM `messages`
                WHERE `id` = {$_GET["id"]}
            QUERY;

            $con->query($sql);
            if ($con->affected_rows)
                echo "Message deleted successfully";
            else
                die("Error: Message does not exist");

            $con->close();
        } else {
            die("Message id is not provided");
        }
    ?>
</body>
</html>