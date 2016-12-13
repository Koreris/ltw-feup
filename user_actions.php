<?php
session_start();

include_once('sql/connection.php');
include_once('sql/user.php');
include_once('sql/utilities.php');

function actionLogin ($obj){
  $obj->userName = strip_tags(trim($obj->userName));
  $obj->passWord = strip_tags(trim($obj->passWord));

  if (empty($obj->userName)) {
    return generateResponse("You didn't enter the username!", "Denied");
  }
  if (empty($obj->passWord)) {
    return generateResponse("You didn't enter the password!", "Denied");
  }
  if (verifyUserAccount($obj->userName, $obj->passWord)){
    $_SESSION['username'] = $obj->userName;
    return generateResponse("Login successfully!", "Successfully");
  }
  else{
    return generateResponse("User or password incorrect!", "Denied");
  }

}

function actionLogout($obj){
  if (isset($_SESSION['username'])){
    session_unset();
    session_destroy();
    return generateResponse("Logout successfully!", "Successfully");
  }else {
    return generateResponse("No session to logout!", "Denied");
  }
}

function actionRegister($obj){
  $obj->userName = strip_tags(trim($obj->userName));
  $obj->passWord = strip_tags(trim($obj->passWord));
  $obj->name = strip_tags(trim($obj->name));
  $obj->email = strip_tags(trim($obj->email));
  $obj->location = strip_tags(trim($obj->location));
  $obj->nationality = strip_tags(trim($obj->nationality));

  if (empty($obj->userName)) {
    return generateResponse("You didn't enter the userName!", "Denied");
  }
  if (empty($obj->passWord)) {
    return generateResponse("You didn't enter the passWord!", "Denied");
  }
  if (empty($obj->name)) {
    return generateResponse("You didn't enter the name!", "Denied");
  }
  if (empty($obj->email)) {
    return generateResponse("You didn't enter the email!", "Denied");
  }
  if (empty($obj->location)) {
    return generateResponse("You didn't enter the location!", "Denied");
  }
  if (empty($obj->nationality)) {
    return generateResponse("You didn't enter the nationality!", "Denied");
  }

  if (userExists($obj->userName)){
    return generateResponse("This username already exists!", "Denied");
  }
  else if (insertUser($obj->userName, $obj->isOwner, $obj->isReviewer, $obj->passWord, $obj->name, $obj->email, $obj->location, $obj->nationality) == 0){
    return  generateResponse("Inserted with success!", "Successfully");
  }
}

function actionUpdate($obj){
  if (userExists($obj->userName)){
    if(upadateUser($obj->userName, $obj->isOwner, $obj->isReviewer, $obj->passWord, $obj->name, $obj->email, $obj->location, $obj->nationality))
      return generateResponse("Update with success!", "Successfully");
  }
}

$data = file_get_contents('php://input');// serve para ler todo o post gerado por uma pagina que chamou o arquivo php atual

if(isset($data)){
  $obj = json_decode($data); //parsing json data to php object

  switch($obj->type){
    case 'login':
    $result = actionLogin($obj);
    break;
    case 'logout':
    $result = actionLogout($obj);
    break;
    case 'register':
    $result = actionRegister($obj);
    break;
    case 'update':
    $result = actionUpdate($obj);
    break;
  }
}
echo json_encode($result);
?>
