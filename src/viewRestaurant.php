<?php
  include_once('sql/restaurant.php');

  $restaurant_id = $_GET['r'];

  $restaurant = getRestaurant($restaurant_id);
  $comments = getRestaurantComments($restaurant_id);

  echo '<h2>'.$restaurant['name'].'</h2>';
  echo '<article id="restaurant">';
  echo '<img src="https://s-media-cache-ak0.pinimg.com/originals/56/29/d5/5629d529bbaf9894b047b0bf031b03bd.jpg" alt="Image">';
  echo '<ul><li><span>Name:</span> '.$restaurant['name'] .'</li>';
  echo '<li><span>Location:</span> '.$restaurant['location'] .'</li>';
  echo '<li><span>Description:</span> '.$restaurant['description'] .'</li>';
  echo '<li><span>Cuisine Type:</span> '.$restaurant['cuisine_type'] .'</li>';
  echo '<li><span>Price Range:</span> '.$restaurant['price_range'] .'</li>';
  echo '<li><span>Average Rating:</span> '.$restaurant['avg_rating'] .'</li>';
  echo '</ul>';
  echo '</article>';

  echo '<fieldset><legend>Comments:</legend>';
  echo '<ul>';
  foreach ($comments as $rest){
    echo '<li>';
    echo '<span id="commentText">'.$rest['comment_text'].'</span>';
    echo '<span id="commentDate">'.$rest['comment_date'].'</span>';
    echo '</li>';
  }
  echo '<ul>';
  echo '</fieldset>';

  echo '<div id="footRestaurant">';
  echo '<a href=index.php> BACK </a>';
  echo '</div>';
?>
