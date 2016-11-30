<?php
  function verifyUserAccount($username, $password) {
    global $db;

    $stmt = $db->prepare('SELECT * FROM user WHERE username = ? AND password = ?');
    $stmt->execute(array($username, sha1($password)));

    return ($stmt->fetch() !== false);
  }

  function userExists($username, $email) {
    global $db;

    $stmt = $db->prepare('SELECT * FROM user WHERE username = ? AND email = ?');
    $stmt->execute(array($username, $email));

    return ($stmt->fetch() !== false);
  }

  function  insertUser($username, $password, $name, $email, $location, $nationality){
    global $db;

    $stmt = $db->prepare('INSERT INTO user(username, password, name, email, location, nationality) VALUES(?,?,?,?,?,?);');

    return (  $stmt->execute(array($username, sha1($password), $name, $email, $location, $nationality)) ) ? 0 : 1;
  }
?>
