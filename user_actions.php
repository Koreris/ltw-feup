<?php
session_start();

include_once('sql/connection.php');
include_once('sql/utilities.php');

$data = file_get_contents('php://input');// serve para ler todo o post gerado por uma pagina que chamou o arquivo php atual

if(isset($data)){
  $obj = json_decode($data); //parsing json data to php object

  switch($obj->type){
		case 'login':
          if (verifyUserAccount($obj->userName, $obj->passWord)){
            $result['msg'] = 'Login successfully';
            $result['request'] = 'successfully';
            $_SESSION['username'] = $obj->userName;
          }
          else{
            $result['msg'] = 'User or password incorrect';
            $result['request'] = 'denied';
          }
          break;
    case 'logout':
          if (isset($_SESSION['username'])){
            session_unset();
            session_destroy();
            $result['msg'] = 'Logout successfully';
            $result['request'] = 'successfully';
          }else {
            $result['msg'] = 'No session to logout';
            $result['request'] = 'denied';
          }
          break;
    case 'register':
          if (userExists($obj->userName, $obj->email)){
            $result['msg'] = 'This username already exists';
            $result['request'] = 'denied';
          }else if (insertUser($obj->userName, $obj->passWord, $obj->name, $obj->email, $obj->location, $obj->nationality) == 0){
            $result['msg'] = 'Inserted with success ';
            $result['request'] = 'successfully';
          }
          break;
    }
}
echo json_encode($result);
?>
