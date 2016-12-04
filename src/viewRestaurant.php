<h2>Restaurants</h2>
<?php
  include_once('sql/restaurant.php');

  $restaurant_id = $_GET['r'];

  $restaurant = getRestaurant($restaurant_id);

  echo '<article id="restaurant">';
  echo '<h3>'.$restaurant['name'].'</h3>';
  echo '<img src="https://s-media-cache-ak0.pinimg.com/originals/56/29/d5/5629d529bbaf9894b047b0bf031b03bd.jpg" alt="Image">';
  echo '<ul><li>Name: '.$restaurant['name'] .'</li>';
  echo '<li>Location: '.$restaurant['location'] .'</li>';
  echo '<li>Description: '.$restaurant['description'] .'</li>';
  echo '<li>Cuisine Type: '.$restaurant['cuisine_type'] .'</li>';
  echo '<li>Price Range: '.$restaurant['price_range'] .'</li>';
  echo '<li>Average Rating: '.$restaurant['avg_rating'] .'</li>';
  echo '<a href=index.php> BACK </a>';

  echo '</ul>';

  echo '</article>';

?>
