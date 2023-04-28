<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register new user</title>
    <link rel="stylesheet" href="style/register.css">
</head>
<body>
    <?php if(isset($_POST["submit"])) : ?>
        <?php
            include "config.php";

            $fullname = $_POST['name'];
            $uname = $_POST['uname'];
            $passwd = $_POST['passwd'];

            $sql = "INSERT INTO `users`(`name`, `username`, `passwd`) VALUES('$fullname', '$uname', '$passwd')";

            if ($con->query($sql))
                echo "User registered successfully";
            else
                echo "Error: Username already taken";

            $con->close();
        ?>
    <?php else : ?>
        <div class="container">
            <h1>Register</h1>
            <form action="register.php" method="POST" id="form">
                <label for="name">Full Name</label><br>
                <input type="text" id="name" name="name"><br>
                <label for="uname">Username</label><br>
                <input type="text" id="uname" name="uname"><br>
                <label for="passwd">Password</label><br>
                <input type="password" id="passwd" name="passwd"><br>
                <input type="submit" name="submit" id="submit" value="Submit">
            </form>
        </div>
    <?php endif ?>

    <script>
        document.getElementById("form").addEventListener("submit", (e) => {
            var form = document.getElementById("form");
            var name = form.name.value;
            var uname = form.uname.value;
            var passwd = form.passwd.value;

            if (!(name && uname && passwd)) {
                e.preventDefault();
                alert("Fill all the fields");
            }
        });
    </script>
</body>
</html>