<?php
include '../includes/DatabaseConnection.php';

try {
    if (isset($_POST['joketext'])) {
        $sql = 'UPDATE joke SET joketext = :joketext, categoryid = :categoryid, authorid = :authorid WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':joketext', $_POST['joketext']);
        $stmt->bindValue(':categoryid', $_POST['categories']);
        $stmt->bindValue(':authorid', $_POST['authors']);
        $stmt->bindValue(':id', $_POST['jokeid']);
        $stmt->execute();
        header('Location: jokes.php');
        exit();
    } else {
        $sql = 'SELECT * FROM joke WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $_GET['id']);
        $stmt->execute();
        $joke = $stmt->fetch();

        $sql_c = 'SELECT * FROM category';
        $categories = $pdo->query($sql_c);

        $sql_a = 'SELECT * FROM author';
        $authors = $pdo->query($sql_a);

        $title = "Edit Joke";
        ob_start();
        include '../templates/editjoke.html.php';
        $output = ob_get_clean();
    }
} catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Error editing joke: ' . $e->getMessage();
}

include '../templates/admin_layout.html.php';
?>
