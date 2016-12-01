<?php

session_start();

include_once('sql/security.php');
include_once('sql/restaurant.php');

function generateResponse($msg, $request) {
  return array('msg' => $msg, 'request' => $request);
}

function actionInsert($obj) {
  trim($obj->name);
  trim($obj->location);
  trim($obj->description);
  strip_tags($obj->name);
  strip_tags($obj->location);
  strip_tags($obj->description);

  //for integers

  if (!checkString($obj->name, true)) {
    return generateResponse("You didn't enter the restaurant name!", -1);
  }

  if (!checkString($obj->location, true)) {
    return generateResponse("You didn't enter the restaurant location!", -1);
  }

  if (!checkString($obj->description, false)) {
    return generateResponse("You didn't enter a description!", -1);
  }

  if (!checkString($obj->type, true)) {
    return generateResponse("You didn't enter a cuisine type!", -1);
  }

  if (checkInteger($obj->range, true)) {
    return generateResponse("You didn't enter a price range!", -1);
  }

  $restaurantId = insertRestaurant($obj->name, $obj->location, $obj->description, $obj->type, $obj->range);

  if ($restaurantId < 0) {
    return generateResponse('This restaurant already exists!', -1);
  }

  // use $restaurantId to redirect to the newly created restaurant page
  return generateResponse('Inserted restaurant with success!', $restaurantId);
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