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
  $obj->cuisine_type = strip_tags(trim($obj->cuisine_type));
  $obj->price_range = strip_tags(trim($obj->price_range));

  //for integers

  if (empty($obj->user_id)) {
    return generateResponse("Invalid user!", -1);
  }

  if (empty($obj->name)) {
    return generateResponse("You didn't enter the restaurant name!", -1);
  }

  if (empty($obj->location)) {
    return generateResponse("You didn't enter the restaurant location!", -1);
  }

  if (empty($obj->description)) {
    return generateResponse("You didn't enter a description!", -1);
  }

  if (empty($obj->cuisine_type)) {
    return generateResponse("You didn't enter a cuisine type!", -1);
  }

  if (!checkInteger($obj->price_range, true)) {
    return generateResponse("You didn't enter a valid price range!", -1);
  }

  if (empty($obj->opening_time)) {
    return generateResponse("You didn't enter a opening time!", -1);
  }

  if (empty($obj->closing_time)) {
    return generateResponse("You didn't enter a closing time!", -1);
  }

  $restaurantId = insertRestaurant($obj->name, $obj->location, $obj->description, $obj->cuisine_type, $obj->opening_time, $obj->closing_time, $obj->price_range, $obj->user_id, $obj->urlPath);

  if ($restaurantId < 0) {
    return generateResponse('This restaurant already exists!', -1);
  }

  // use $restaurantId to redirect to the newly created restaurant page
  return generateResponse('Added restaurant with success!', $restaurantId);
}

function actionDelete($obj) {

  if (restaurantExists($obj->restaurant_id) === false) {
    return generateResponse('This restaurant does not exist!', false);
  }

  if (deleteRestaurant($obj->restaurant_id, $obj->user_id) === false) {
    return generateResponse('Could not delete selected restaurant, database error?', false);
  }

   return generateResponse('Restaurant successfully deleted!', true);
}

function actionUpdate($obj) {

  if (restaurantExists($obj->restaurant_id) === false) {
    return generateResponse('This restaurant does not exist!', false);
  }

  if (empty($obj->user_id)) {
    return generateResponse("Invalid user!", -1);
  }

  $obj->name = strip_tags(trim($obj->name));
  $obj->location = strip_tags(trim($obj->location));
  $obj->description = strip_tags(trim($obj->description));
  $obj->cuisine_type = strip_tags(trim($obj->cuisine_type));
  $obj->price_range = strip_tags(trim($obj->price_range));

  if (empty($obj->name)) {
    return generateResponse("You didn't enter the restaurant name!", -1);
  }

  if (empty($obj->location)) {
    return generateResponse("You didn't enter the restaurant location!", -1);
  }

  if (empty($obj->description)) {
    return generateResponse("You didn't enter a description!", -1);
  }

  if (empty($obj->cuisine_type)) {
    return generateResponse("You didn't enter a cuisine type!", -1);
  }

  if (!checkInteger($obj->price_range, true)) {
    return generateResponse("You didn't enter a valid price range!", -1);
  }

  if (empty($obj->opening_time)) {
    return generateResponse("You didn't enter a opening time!", -1);
  }

  if (empty($obj->closing_time)) {
    return generateResponse("You didn't enter a closing time!", -1);
  }

  if (updateRestaurant(
    $obj->restaurant_id,
    $obj->user_id,
    $obj->name,
    $obj->location,
    $obj->description,
    $obj->cuisine_type,
    $obj->opening_time,
    $obj->closing_time,
    $obj->price_range,
    $obj->urlPath) === false) {
      return generateResponse('Could not update selected restaurant, database error?', false);
    };

    return generateResponse('Restaurant information successfully updated!', true);
}

function allRestaurantsLocation($obj){
  $result = [];
  $variable = getRestaurantIdByLocation($obj->restaurantLocation);

  foreach ($variable as $key) {
    array_push($result, $key['restaurant_id']);
  }
  return $result;
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
    $result = actionUpdate($obj);
    break;
  case 'allRestaurants':
    $result = listRestaurants();
    break;
  case 'search_restaurant':
    $result = getRestaurantIdByName($obj->restaurantName)['restaurant_id'];
    break;
  case 'search_restaurant_location':
    $result = allRestaurantsLocation($obj);
    break;
  }
}
echo json_encode($result);

?>
