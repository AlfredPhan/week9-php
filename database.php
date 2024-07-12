<?php

$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "week4";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if (!$conn) {
    die("Something went wrong;");
}

?>