<?php
include('coonnection.php');
session_start();

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare statement to fetch user details
    $users = $pdo->prepare("SELECT * FROM user WHERE username = :username");
    $users->execute(['username' => $username]);
    $result = $users->fetch();

    // Check if user exists and verify password
    if ($result && password_verify($password, $result['password'])) {
        $_SESSION['username'] = $result['username'];
        $_SESSION['first_name'] = $result['first_name'];
        $_SESSION['last_name'] = $result['last_name'];

        header('Location: index.php');
    } else {
        header('Location: login.php');
    }
}
?>
