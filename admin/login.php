<?php
session_start();

$valid_username = 'admin';
$valid_password = '123';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == $valid_username && $password == $valid_password) {
        $_SESSION['loggedin'] = true;
        header('Location: ../admin/index.php');
        exit;
    } else {
        $error = 'Invalid username or password';
        include '../templates/admin_login.html.php';
    }
} else {
    include '../templates/admin_login.html.php';
}
