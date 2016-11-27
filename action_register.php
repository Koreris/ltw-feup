<?php
$db = new PDO('sqlite:sql/db.db');

$username = $_POST["username"]; 
$password = $_POST["password"]; 
$name = $_POST["name"]; 
$email = $_POST["email"]; 
$location = $_POST["location"]; 
$nationality = $_POST["nationality"]; 

$sha1pass = sha1($password);

$db->exec("INSERT INTO user VALUES (NULL,'$username','$sha1pass','$name','$email','$location','$nationality');"); 

header('Location: ' . $_SERVER['HTTP_REFERER']);

?>