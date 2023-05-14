<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete group</title>
</head>
<body>
    <?php
        session_start();

        include "config.php";

        if(isset($_GET['id'])) {
            $sql = <<<QUERY
                DELETE FROM `groups`
                WHERE `id` = {$_GET["id"]}
            QUERY;

            $con->query($sql);
            if ($con->affected_rows)
                $_SESSION['message'] = "Group deleted successfully";
            else
                $_SESSION['message'] = "Error: Group does not exist";
            
            header('Location: ' . $_SERVER['HTTP_REFERER']);

            $con->close();
        } else {
            die("Group id is not provided");
        }
    ?>
</body>
</html>