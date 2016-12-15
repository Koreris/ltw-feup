<?php
include_once('sql/connection.php');
include_once('sql/restaurant.php');
include_once('sql/utilities.php');


function actionInsertReview($obj){
  $review = insertReview($obj->restaurantId, $obj->userId, $obj->reviewText, $obj->reviewDate, $obj->ratingValue, $obj->priceRange);
  if ( $review < 0)
    return generateResponse('algo aconteceu!!', 'denied');

  return generateResponse('Added review with success!!', 'successfully');
}

function actionInsertComment($obj){
  $comment = insertComment($obj->userId, $obj->reviewId, $obj->commentDate, $obj->commentText);
  if ($comment < 0)
    return generateResponse('algo aconteceu!!', 'denied');

  return generateResponse('Added comment with success!!', 'successfully');
}

$data = file_get_contents('php://input');

if (isset($data)) {

  $obj = json_decode($data);

  switch($obj->type) {
  case 'addReview':
    $result = actionInsertReview($obj);
    break;
  case 'addComment':
    $result = actionInsertComment($obj);
    break;
  }
}
echo json_encode($result);

?>
