<?php

require_once 'sql/connection.db';

$validColumns = array(
  'id', 'name', 'location', 'cuisine_type', 'price_range'
);

function listRestaurants($orderBy = 'id', $ascending = true) {
  global $db;
  if (!in_array($orderBy, $validColumns)) {
      $orderBy = 'id';
  }
  if ($ascending) {
      return $db->execute("SELECT * FROM restaurant ORDER BY {$orderBy} ASC")->fetchAll();
  }
  else {
      return $db->execute("SELECT * FROM restaurant ORDER BY {$orderBy} DESC")->fetchAll();
  }
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
      "INSERT INTO restaurant(name, location, description, cuisine_type, price_range)
       VALUES (:name, :location, :description, :type, :range)"
  );
  $stmt->bindParam(':name', $name, PDO::PARAM_STR);
  $stmt->bindParam(':location', $location, PDO::PARAM_STR);
  $stmt->bindParam(':description', $description, PDO::PARAM_STR);
  $stmt->bindParam(':type', $type, PDO::PARAM_STR);
  $stmt->bindParam(':range', $range, PDO::PARAM_STR);
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
?>