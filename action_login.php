<?php
session_start();

include_once('sql/connection.php');
include_once('sql/getUsers.php');

if (userExists($_POST['username'], $_POST['password']))
  $_SESSION['username'] = $_POST['username'];  

header('Location: ' . $_SERVER['HTTP_REFERER']);
?>