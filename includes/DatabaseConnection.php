<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=week4;charset=utf8mb4', 'root', '');
    $output = 'Database connection established.';
} catch (PDOException $e) {
    $output = 'Unable to connect to the database server: ' . $e->getMessage();
}
?>
