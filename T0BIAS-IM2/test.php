<?php
session_start();

if(!isset($_SESSION[admin])){
    echo "You are not an Admin";
}else{
    echo "Welcome" .$SESSION['admin'] = "Heinz Khervie";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>