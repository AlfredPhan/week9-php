<?php 
if (isset($_POST['joketext'])) {
    try {
        include '../includes/DatabaseConnection.php';
        include '../includes/DatabaseFunction.php';

        $sql = 'INSERT INTO joke SET
            joketext = :joketext,
            jokedate = CURDATE(),
            authorid = :authorid,
            categoryid = :categoryid';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':joketext', $_POST['joketext']);
        $stmt->bindValue(':authorid', $_POST['authors']); 
        $stmt->bindValue(':categoryid', $_POST['categories']); 
        $stmt->execute();
        header('Location: jokes.php');
        exit();
    } catch (PDOException $e) {
        $title = 'An error has occurred';
        $output = 'Database error: ' . $e->getMessage();
    }
} else { 
    include '../includes/DatabaseConnection.php';
    $title = 'Add a new joke';
    $sql_a = 'SELECT * FROM author';
    $authors = $pdo->query($sql_a);
    $sql_c = 'SELECT * FROM category';
    $catagories = $pdo->query($sql_c);
    ob_start();
    include '../templates/addjoke.html.php';
    $output = ob_get_clean();
}
include '../templates/admin_layout.html.php';
