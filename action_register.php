<?php
$db = new PDO('sqlite:sql/db.db');

$username = $_POST["username"]; 
$password = $_POST["password"]; 
$name = $_POST["name"]; 
$email = $_POST["email"]; 
$location = $_POST["location"]; 
$nationality = $_POST["nationality"]; 


$hashed_pass = password_hash($password, PASSWORD_BCRYPT);

$db->exec("INSERT INTO user VALUES (NULL,'$username','$hashed_pass','$name','$email','$location','$nationality');"); 

header('Location: ' . 'index.php');

?>