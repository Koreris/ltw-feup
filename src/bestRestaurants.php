
<h2>Restaurants</h2>
<?php
  include_once('sql/restaurant.php');

  $result = listHighestRatedRestaurants();

  foreach ($result as $rest){
    echo '<article id="restaurant">';
    echo '<img src="https://s-media-cache-ak0.pinimg.com/originals/56/29/d5/5629d529bbaf9894b047b0bf031b03bd.jpg" alt="Image">';
    echo '<h3>'.$rest['name'].'</h3>';
    echo '<ul><li><span>Name:</span> '.$rest['name'] .'</li>';
    echo '<li><span>Location:</span> '.$rest['location'] .'</li>';
    echo '<li><span>Description:</span> '.$rest['description'] .'</li>';
    echo '<li><span>Cuisine Type:</span> '.$rest['cuisine_type'] .'</li>';
    echo '<li><span>Price Range:</span> '.$rest['price_range'] .'</li>';
    echo '<li><span>Average Rating:</span> '.$rest['avg_rating'] .'</li>';
    echo '</ul>';
    echo '</article>';



    echo '<div id="footRestaurant">';
    echo '<a href=index.php?p=src/viewRestaurant&r='.$rest['restaurant_id'].'>See More</a>';
    echo '</div>';
  }
?>
