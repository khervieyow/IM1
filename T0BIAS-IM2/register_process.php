<?php
require_once('c0nnection.php'); // Ensure this file has the PDO connection setup

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Gather data from the registration form
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $address = $_POST['address'];
    $birthdate = $_POST['birthdate'];
    $gender = $_POST['gender'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hashing the password for security
    $role = $_POST['role'];
    $dateCreated = date('Y-m-d H:i:s');

    // Insert into database
    $sql = "INSERT INTO users (first_name, last_name, address, birthdate, gender, username, password, role, date_created)
            VALUES (:first_name, :last_name, :address, :birthdate, :gender, :username, :password, :role, :date_created)";
    
    $stmt = $pdo->prepare($sql);
    
    $stmt->bindParam(':first_name', $firstName);
    $stmt->bindParam(':last_name', $lastName);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':birthdate', $birthdate);
    $stmt->bindParam(':gender', $gender);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password); // Make sure this is hashed
    $stmt->bindParam(':role', $role);
    $stmt->bindParam(':date_created', $dateCreated);
    
    if ($stmt->execute()) {
        header("Location: login.php");
        exit();
    } else {
        echo "Registration failed.";
    }
}
?>
