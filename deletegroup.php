<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        // ini_set('display_errors', 'on');

        include "config.php";

        if(isset($_GET['id'])) {
            $sql = <<<QUERY
                DELETE FROM `groups`
                WHERE `id` = {$_GET["id"]}
            QUERY;

            $con->query($sql);
            if ($con->affected_rows)
                echo "Group deleted successfully";
            else
                die("Error: Group does not exist");

            $con->close();
        } else {
            die("Group id is not provided");
        }
    ?>
</body>
</html>