<header>
    <div class="container">
        <h1>Group chat</h1>
        <?php if (isset($_SESSION['isLoggedIn'])) : ?>
            <div>
                <span>Logged in as @<?= $_SESSION['username'] ?></span>
                <form action="logout.php" method="POST">
                    <input type="submit" name="submit" value="Logout">
                </form>
            </div>
        <?php else: ?>
            <div>
                <form action="login.php" method="POST">
                    <input type="text" name="username" placeholder="Username">
                    <input type="password" name="password" placeholder="Password">
                    <input type="submit" name="submit" value="Login">
                </form>
                <a href="register.php">Registration</a>
            </div>
        <?php endif ?>
    </div>
</header>