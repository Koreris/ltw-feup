<?php

require_once 'sql/connection.php';

$validColumns = array(
  'id', 'name', 'location', 'cuisine_type', 'price_range'
);

function listRestaurants()
  //$orderBy = 'id', $ascending = true) 
  {
  global $db, $validColumns;
  //if (!in_array($orderBy, $validColumns)) {
  //    $orderBy = 'id';
  //}
  //if ($ascending) {
      $stmt = $db->prepare('SELECT * FROM restaurant');
      //ORDER BY {$orderBy} ASC');
      //$stmt->bindParam( )
      $stmt->execute();
  //}
  /*
  else {
      $stmt = $db->prepare('SELECT * FROM restaurant ORDER BY {$orderBy} DESC');
      //$stmt->execute();
  }*/
  //$stmt->execute();
  return $stmt->fetchAll();

}

function getRestaurant($restaurantId) {
  global $db;
  $stmt = $db->prepare('SELECT * FROM restaurant WHERE id = :id LIMIT 1');
  $stmt->bindParam(':id', $restaurantId, PDO::PARAM_INT);
  $stmt->execute();
  return $stmt->fetch();
}

function restaurantExists($restaurantId) {
  global $db;
  $stmt = $db->prepare('SELECT * FROM restaurant WHERE id = :id LIMIT 1');
  $stmt->bindParam(':id', $restaurantId, PDO::PARAM_INT);
  $stmt->execute();
  return ($stmt->fetch() !== false);
}

function insertRestaurant($name, $location, $description, $type, $range) {
  global $db;
  $stmt = $db->prepare(
      "INSERT INTO restaurant(name, location, description, cuisine_type, opening_time, closing_time, avg_rating, price_range)
       VALUES (:name, :location, :description, :type, :opening_time, :closing_time, :avg_rating, :range)"
  );
  $stmt->bindParam(':name', $name, PDO::PARAM_STR);
  $stmt->bindParam(':location', $location, PDO::PARAM_STR);
  $stmt->bindParam(':description', $description, PDO::PARAM_STR);
  $stmt->bindParam(':type', $type, PDO::PARAM_STR);
  $stmt->bindParam(':opening_time', $opening_time, PDO::PARAM_STR);
  $stmt->bindParam(':closing_time', $closing_time, PDO::PARAM_STR);
  $stmt->bindParam(':avg_rating', $avg_rating, PDO::PARAM_INT);
  $stmt->bindParam(':range', $range, PDO::PARAM_INT);
  return $stmt->execute() ? $stmt->fetch()['id'] : -1;
}

function deleteRestaurant($restaurantId, $username) {
  global $db;
  $restaurant = getRestaurant($restaurantId);
  if ($restaurant != null && $username == $restaurant['user_id']) {
    $stmt = $db->prepare('DELETE FROM restaurant WHERE user_id = :userId AND id = :id');
    $stmt->bindParam(':userId', $username, PDO::PARAM_STR);
    $stmt->bindParam(':id', $restaurantId, PDO::PARAM_INT);
    return $stmt->execute() ? true : false;
  }
  return false;
}

function listHighestRatedRestaurants() 
  {
    $avg_rating = 3.5;
    global $db, $validColumns;
  //if (!in_array($orderBy, $validColumns)) {
  //    $orderBy = 'id';
  //}
  //if ($ascending) {
      $stmt->execute();
  //}
  /*
  else {
      $stmt = $db->prepare('SELECT * FROM restaurant ORDER BY {$orderBy} DESC');
      //$stmt->execute();
  }*/
  //$stmt->execute();
  return $stmt->fetchAll();

}
?>
