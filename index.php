<?php
session_start();
if (!isset($_SESSION["user"])) {
   header("Location: login.php");
}
$title = 'Internet Joke Database';
ob_start();
include 'templates/home.html.php';
$output = ob_get_clean();
include 'templates/layout.html.php';
?>
