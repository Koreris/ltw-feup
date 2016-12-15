<h2>Restaurants</h2>
<?php
  include_once('sql/restaurant.php');

  $result = $_GET['r'];

  $string = explode(',',$result);

  $return = [];
  foreach ($string as $key) {
    $restaurante = getRestaurant($key);
    array_push($return, $restaurante);
  }

  foreach ($return as $rest){
$decimal = round($rest['avg_rating'],0);
  ?>
    <article id="restaurant">
    <img src="https://s-media-cache-ak0.pinimg.com/originals/56/29/d5/5629d529bbaf9894b047b0bf031b03bd.jpg" alt="Image">
    <h3><?=$rest['name'] ?></h3>
    <ul><li><span>Name:</span> <?=$rest['name'] ?> </li>
    <li><span>Location:</span> <?=$rest['location'] ?> </li>
    <li><span>Description:</span> <?=$rest['description'] ?> </li>
    <li><span>Cuisine Type:</span> <?=$rest['cuisine_type'] ?> </li>
    <li><span>Price Range:</span> <?=$rest['price_range'] ?> </li>
    <li><span>Average Rating:</span> <?=$rest['avg_rating'] ?> </li>
    <li><span>Average Rating:</span> <?=$decimal ?> </li>
    <div class="average_rating">
      <label><input type="radio" id="rating_star" name="star_rating" value="1" /><span <?= ($rest['avg_rating'] >= 1.0)? 'class="starOn"' : "";?>>☆</span></label>
      <label><input type="radio" id="rating_star" name="star_rating" value="2" /><span <?= ($rest['avg_rating'] >= 1.5)? 'class="starOn"' : "";?>>☆</span></label>
      <label><input type="radio" id="rating_star" name="star_rating" value="3" /><span <?= ($rest['avg_rating'] >= 2.5)? 'class="starOn"' : "";?>>☆</span></label>
      <label><input type="radio" id="rating_star" name="star_rating" value="4" /><span <?= ($rest['avg_rating'] >= 3.5)? 'class="starOn"' : "";?>>☆</span></label>
      <label><input type="radio" id="rating_star" name="star_rating" value="5" /><span <?= ($rest['avg_rating'] >= 4.5)? 'class="starOn"' : "";?>>☆</span></label>
    </div>
    </ul>
    </article>

    <div id="footRestaurant">
    <a href=index.php?p=src/viewRestaurant&r=<?=$rest['restaurant_id'] ?> >See More</a>
    </div>
<?php
  }
?>