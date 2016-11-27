<?php
$db = new SQLite3('sql/db.db');

$username = $_POST["username"]; 
$password = $_POST["password"]; 
$name = $_POST["name"]; 
$email = $_POST["email"]; 
$location = $_POST["location"]; 
$nationality = $_POST["nationality"]; 

$db->exec("INSERT INTO User VALUES (NULL,'$username','$password','$name','$email','$location','$nationality');"); 

?>