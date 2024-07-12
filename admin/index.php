<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}

$title = 'Internet Joke Database';
ob_start();
include '../templates/home.html.php';
$output = ob_get_clean();
include '../templates/admin_layout.html.php';
?>
