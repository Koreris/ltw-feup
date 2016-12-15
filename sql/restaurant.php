<?php

require_once 'sql/connection.php';

$validColumns = array(
  'id', 'name', 'location', 'cuisine_type', 'price_range'
);

function listRestaurants()
{
  global $db;
  $stmt = $db->prepare('SELECT * FROM restaurant');
  $stmt->execute();
  return $stmt->fetchAll();
}

function getRestaurantIdByName($restaurantName) {
  global $db;
  $stmt = $db->prepare('SELECT * FROM restaurant WHERE restaurant.name  = :restaurantName');
  $stmt->bindParam(':restaurantName', $restaurantName, PDO::PARAM_STR);
  $stmt->execute();

  return   $stmt->fetch();
}

function getRestaurant($restaurantId) {
  global $db;
  $stmt = $db->prepare('SELECT restaurant.*, AVG(review.rating) AS avg_rating FROM restaurant
  LEFT JOIN review ON review.restaurant_id = restaurant.restaurant_id
  WHERE restaurant.restaurant_id  = :restaurantId
  GROUP BY review.restaurant_id
  ');
  $stmt->bindParam(':restaurantId', $restaurantId, PDO::PARAM_INT);
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

function insertRestaurant($name, $location, $description, $cuisine_type, $opening_time, $closing_time, $price_range) {
  global $db;
  //insert into user the is_owner
  $stmt = $db->prepare('INSERT INTO restaurant(name, location, description, cuisine_type, price_range, opening_time, closing_time)
    VALUES (:name, :location, :description, :cuisine_type, :opening_time, :closing_time, :price_range)');
  $stmt->bindParam(':name', $name, PDO::PARAM_STR);
  $stmt->bindParam(':location', $location, PDO::PARAM_STR);
  $stmt->bindParam(':description', $description, PDO::PARAM_STR);
  $stmt->bindParam(':cuisine_type', $cuisine_type, PDO::PARAM_STR);
  $stmt->bindParam(':opening_time', $opening_time, PDO::PARAM_STR);
  $stmt->bindParam(':closing_time', $closing_time, PDO::PARAM_STR);
   $stmt->bindParam(':price_range', $price_range, PDO::PARAM_INT);
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

function listHighestRatedRestaurants(){
  global $db;
  $stmt = $db->prepare(
    'SELECT restaurant.*, AVG(review.rating) AS avg_rating FROM restaurant
    LEFT JOIN review ON review.restaurant_id = restaurant.restaurant_id
    GROUP BY review.restaurant_id
    ORDER BY avg_rating DESC
    LIMIT 5;'
  );
  $stmt->execute();
  return $stmt->fetchAll();

}

function getRestaurantComments($restaurantId){
  global $db;
  $stmt = $db->prepare(
    'SELECT comment.* FROM comment
     LEFT JOIN review ON review.restaurant_id = :restaurantId
     WHERE comment.review_id = review.review_id
     ORDER BY comment.comment_date ASC'
  );
  $stmt->bindParam(':restaurantId', $restaurantId, PDO::PARAM_INT);
  $stmt->execute();
  return $stmt->fetchAll();
}

function getRestaurantReviews($restaurantId)
{
  global $db;
  $stmt = $db->prepare(
    'SELECT review.* FROM review
    WHERE review.restaurant_id = :restaurantId
    ORDER BY review.review_date ASC'
  );
  $stmt->bindParam(':restaurantId', $restaurantId, PDO::PARAM_INT);
  $stmt->execute();
  return $stmt->fetchAll();
}
function insertReview($restaurantId, $userId, $reviewText, $reviewDate, $ratingValue, $priceRange){
  global $db;

  $stmt = $db->prepare('INSERT INTO review (restaurant_id, user_id, review_text, review_date, rating, price_range) VALUES (?, ?, ?, ?, ?, ?)');
  $result =  ($stmt->execute(array($restaurantId, $userId, $reviewText, $reviewDate, $ratingValue, $priceRange)) ) ? 0 : 1;
  $reviewId = $db->lastInsertId();

  $stmt = $db->prepare('INSERT INTO restaurantReviews (restaurant_id, review_id) VALUES (?, ?)');
  $stmt->execute(array($restaurantId, $reviewId));

  $stmt = $db->prepare('INSERT INTO userReviews (user_id, review_id) VALUES (?, ?)');
  $stmt->execute(array($userId, $reviewId));

  return $result;
}

function insertComment($userId, $reviewId, $commentDate, $commentText){
  global $db;

  $stmt = $db->prepare('INSERT INTO comment (user_id,	review_id, comment_date,	comment_text) VALUES (?,?,?,?)');

  return ($stmt->execute(array($userId, $reviewId, $commentDate, $commentText)) ) ? 0: 1;
}

?>
