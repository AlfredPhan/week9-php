<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?></title>
    <link rel="stylesheet" href="../css/jokes.css">
</head>
<body>
    <header id="admin" style="background-color: #666fd2;">
        <h1>Internet Joke Database Admin Area <br/>
            Manage jokes, categories and authors</h1></header>
    <nav>
    <ul>
        <li><a href="../admin/jokes.php">Jokes List</a></li>
        <li><a href="../admin/addjoke.php">Add a new joke</a></li>
        <!-- <li><a href="../index.php">Public Site</a></li> -->
        <!-- <li><a href="addjoke.php">Add a new joke</a></li> -->
        <!-- <li><a href="addimg.php">Add new joke & image to list</a></li> -->
        <!-- <li><a href="images.php">Image List</a></li> -->
        <li><a href="../logout.php">Logout</a></li>
    </ul>
    </nav>

    <main>
        <?=$output?>
    </main>
    <footer>&copy; IJDB 2023</footer>
</body>
</html>