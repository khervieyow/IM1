<?php

$host = "localhost";
$user = "root";
$password = "";
$dbname = "heinzkk";

//data source name
$db = "mysql:host=$host;dbname=$dbname";
//PDO instance
$connection = new PDO($db,$user,$password);
$connection->setAttribute
(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);


// $id = 3;
$first_name = "HeinzK";
$last_name = "Tobias";
$age = 20;
$gender = "Male";

// $sql = "DELETE FROM tableni WHERE id =?";
// $stmt = $connection->prepare($sql);
// $stmt->execute([$id]);


 $sql = "INSERT INTO tableni(`first_name`,`last_name`,`age`,`gender`) VALUES(?,?,?,?)";
 $stmt = $connection->prepare($sql);
 $stmt->execute([$first_name,$last_name,$age,$gender]);

//  $sql = "UPDATE tableni SET first_name = :first_name,
//  last_name = :last_name,age = :age,gender = :gender WHERE
//  id = :id";
//  $stmt = $connection->prepare($sql);
//  $stmt->execute(['first_name' => $first_name, 'last_name' =>
//  $last_name,'age'=> $age,'gender' => $gender,'id' => $id]);

 $stmt = $connection->query("SELECT * FROM tableni");
 while($row = $stmt->fetch()){
     echo $row['id']."-".$row['first_name']." ". $row
     ['last_name']." ".$row['age']." ".$row['gender']."<br>";
 }
?>