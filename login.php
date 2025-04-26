<?php
session_start();
include('db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == "admin" && $password == "admin123") {
        $_SESSION['username'] = $username;
        header("Location: admin_dashboard.php");
    } else {
        echo "Invalid username or password.";
    }
}
?>