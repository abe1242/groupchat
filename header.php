<header>
    <div class="container">
        <h1>Group chat</h1>
        <?php if (isset($_SESSION['isLoggedIn'])) : ?>
            <div>
                <span>Logged in as @<?= $_SESSION['username'] ?></span>
                <form action="logout.php" method="POST">
                    <button type="submit" name="submit">Logout</button>
                </form>
            </div>
        <?php else: ?>
            <div>
                <form action="login.php" method="POST">
                    <input type="text" name="username" placeholder="Username">
                    <input type="password" name="password" placeholder="Password">
                    <button type="submit" name="submit">Login</button>
                </form>
                <a href="register.php" target="_blank">Registration</a>
            </div>
        <?php endif ?>
    </div>
</header>