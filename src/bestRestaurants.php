
<h2>Restaurants</h2>
<?php
  include_once('sql/restaurant.php');

  $result = listHighestRatedRestaurants();

  foreach ($result as $rest){
    echo '<article id="restaurant">';
    echo '<h3>'.$rest['name'].'</h3>';
    echo '<img src="https://s-media-cache-ak0.pinimg.com/originals/56/29/d5/5629d529bbaf9894b047b0bf031b03bd.jpg" alt="Image">';
    echo '<ul><li>Name: '.$rest['name'] .'</li>';
    echo '<li>Location: '.$rest['location'] .'</li>';
    echo '<li>Description: '.$rest['description'] .'</li>';
    echo '<li>Cuisine Type: '.$rest['cuisine_type'] .'</li>';
    echo '<li>Price Range: '.$rest['price_range'] .'</li>';
    echo '<li>Average Rating: '.$rest['avg_rating'] .'</li>';
    echo '</ul>';

    echo '<a href=index.php?p=src/viewRestaurant&r='.$rest['restaurant_id'].'>see more</a>';
    echo '</article>';
  }
?>
