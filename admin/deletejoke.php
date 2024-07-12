<?php
include '../includes/DatabaseConnection.php';
include '../includes/DatabaseFunction.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    try {
        // Fetch the filename
        $sql = 'SELECT image FROM joke WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $image = $stmt->fetchColumn();

        // Delete the file from the server
        if ($image && file_exists('uploads/' . $image)) {
            unlink('uploads/' . $image);
        }

        // Delete the database entry
        $sql = 'DELETE FROM joke WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        header('Location: jokes.php');
        exit;
    } catch (PDOException $e) {
        echo 'Database error: ' . $e->getMessage();
    }
}
?>
