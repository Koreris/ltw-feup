<?php
$db = new SQLite3('db.db');

$username = $_POST["username"]; 
$password = $_POST["password"]; 
$name = $_POST["name"]; 
$email = $_POST["email"]; 
$location = $_POST["location"]; 
$nationality = $_POST["nationality"]; 

$db->exec("INSERT INTO user VALUES (NULL,'$username','$password','$name','$email','$location','$nationality');"); 

?>