<?php
$host = "localhost";
$dbname = "heinzkk";
$username = "root";
$password = "";

try{
    $pdo = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $th) {
   die("Could not connect to database" .$th->getMessage());
}
?>