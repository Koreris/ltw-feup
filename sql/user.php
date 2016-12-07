<?php

require_once 'sql/connection.php';

function listCommentsByUser($userId){
  global $db;
  $stmt = $db->prepare(
    'SELECT * FROM comment
    WHERE user_id = :userId
    ORDER BY comment_date ASC'
  );

  $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
  $stmt->execute();
  return $stmt->fetchAll();
}

function verifyUserAccount($username, $password) {
  global $db;

  $stmt = $db->prepare('SELECT * FROM user WHERE username = ? AND password = ?');
  $stmt->execute(array($username, sha1($password)));

  return ($stmt->fetch() !== false);
}

function userExists($username, $email) {
  global $db;

  $stmt = $db->prepare('SELECT * FROM user WHERE username = :username AND email = :email');
  $stmt->bindParam(':username', $username, PDO::PARAM_STR);
  $stmt->bindParam(':$email', $email, PDO::PARAM_STR);
  $stmt->execute();

  return ($stmt->fetch() !== false);
}

function  insertUser($username, $password, $is_owner, $is_reviewer, $name, $email, $location, $nationality){
  global $db;

  $stmt = $db->prepare('INSERT INTO user(username, password, is_owner, is_reviewer, name, email, location, nationality) VALUES(?,?,?,?,?,?,?,?);');

  return (  $stmt->execute(array($username, sha1($password), $is_owner, $is_reviewer, $name, $email, $location, $nationality)) ) ? 0 : 1;
}

/*
function userExists($username, $email) {
global $db;

$stmt = $db->prepare('SELECT * FROM user WHERE username = ? AND email = ?');
$stmt->execute(array($username, $email));

return ($stmt->fetch() !== false);
}
*/
//TODO
/*
function  insertUser($username, $password, $is_owner, $is_reviewer, $name, $email, $location, $nationality){
global $db;
$hashed_pass = password_hash($password, PASSWORD_BCRYPT); //TODO
$stmt = $db->prepare('INSERT INTO user(username, password, is_owner, is_reviewer, name, email, location, nationality)
VALUES(:username, :password, :is_owner , :is_reviewer , :name, :email, :location, :nationality);');
$stmt->bindParam(':username', $username, PDO::PARAM_STR);
$stmt->bindParam(':password', sha1($password), PDO::PARAM_STR);
$stmt->bindParam(':is_owner', $is_owner, PDO::PARAM_BOOL);
$stmt->bindParam(':is_reviewer', $is_reviewer, PDO::PARAM_BOOL);
$stmt->bindParam(':name', $name, PDO::PARAM_STR);
$stmt->bindParam(':email', $email, PDO::PARAM_STR);
$stmt->bindParam(':location', $location, PDO::PARAM_STR);
$stmt->bindParam(':nationality', $nationality, PDO::PARAM_STR);

return  ($stmt->execute() ? 0 : 1);
}
*/

/*
function verifyUserAccount($username, $password) {
global $db;
$hashed_pass = password_hash($password, PASSWORD_BCRYPT);//TODO

$stmt = $db->prepare('SELECT * FROM user WHERE username = :username AND password = :password');
$stmt->bindParam(':username', $username, PDO::PARAM_STR);
//$stmt->bindParam(':password', sha1($password), PDO::PARAM_STR);
$stmt->bindParam(':password', sha1($password), PDO::PARAM_STR);
$stmt->execute();

return ($stmt->fetch() !== false);
}
*/
?>
