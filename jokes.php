<?php
try {
    include 'includes/DatabaseConnection.php';
    include 'includes/DatabaseFunction.php';

    // $sql = 'SELECT joke.id, joketext, author.name AS author_name, email, jokedate, image, category.name AS category_name 
    //         FROM joke 
    //         INNER JOIN author ON authorid = author.id
    //         INNER JOIN category ON categoryid = category.id';
    $jokes = allJokes($pdo);
    $title = 'Joke List';
    $totalJokes = totalJokes($pdo);

    ob_start();
    include 'templates/public_jokes.html.php';
    $output = ob_get_clean();
} catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage();
}
include 'templates/layout.html.php';
?>
