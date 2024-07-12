<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Internet Joke Database</title>
    <link rel="stylesheet" href="css/jokes.css">
</head>
<body>
    <header>
        <h1>Internet Joke Database</h1>
    </header>
    <main>
        <h2 style="margin-bottom: 10px;">Login</h2>
        <form action="login.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <br>
            <input type="submit" value="Login">
        </form>
        <?php if (isset($error)): ?>
            <p style="color: red;"><?= $error ?></p>
        <?php endif; ?>
    </main>
    <footer>&copy; IJDB 2023</footer>
</body>
</html>
