<?php

session_start();

include_once('sql/connection.php');
include_once('sql/security.php');
include_once('sql/restaurant.php');

function generateResponse($msg, $request) {
  return array('msg' => $msg, 'request' => $request);
}

function actionInsert($obj) {
  $obj->name = strip_tags(trim($obj->name));
  $obj->location = strip_tags(trim($obj->location));
  $obj->description = strip_tags(trim($obj->description));

  //for integers

  if (empty($obj->name)) {
    return generateResponse("You didn't enter the restaurant name!", -1);
  }

  if (empty($obj->location)) {
    return generateResponse("You didn't enter the restaurant location!", -1);
  }

  if (empty($obj->description)) {
    return generateResponse("You didn't enter a description!", -1);
  }

  if (empty($obj->type)) {
    return generateResponse("You didn't enter a cuisine type!", -1);
  }

  if (checkInteger($obj->range, true)) {
    return generateResponse("You didn't enter a valid price range!", -1);
  }




  //echo($_POST['openHour']);

  if ($restaurantId < 0) {
    return generateResponse('This restaurant already exists!', -1);
  }

  // use $restaurantId to redirect to the newly created restaurant page
  return generateResponse('Added restaurant with success!', $restaurantId);
}

function actionDelete($obj) {

  if (restaurantExists($obj->id) === false) {
    return generateResponse('This restaurant does not exist!', false);
  }

  if (deleteRestaurant($obj->id, $obj->username) === false) {
    return generateResponse('Could not delete selected restaurant, database error?', false);
  }

   return generateResponse('Restaurant successfully deleted!', true);
}

function actionUpdate($obj) {
  return generateResponse('Not yet implemented!', false);
}

$data = file_get_contents('php://input');

if (isset($data)) {

  $obj = json_decode($data);

  switch($obj->type) {
  case 'insert':
    $result = actionInsert($obj);
    break;
  case 'delete':
    $result = actionDelete($obj);
    break;
  case 'update':
    $result = actionupdate($obj);
    break;
  }
}

echo json_encode($result);

?>
