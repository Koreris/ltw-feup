<?php
  include_once('sql/restaurant.php');

  $restaurant_id = $_GET['r'];

  $restaurant = getRestaurant($restaurant_id);
  $comments = getRestaurantComments($restaurant_id);
  $reviews = getRestaurantReviews($restaurant_id);
?>
  <h2> <?=$restaurant['name'] ?></h2>
  <article id="restaurant">
    <img src="https://s-media-cache-ak0.pinimg.com/originals/56/29/d5/5629d529bbaf9894b047b0bf031b03bd.jpg" alt="Image">
    <ul><li><span>Name:</span> <?=$restaurant['name'] ?></li>
    <li><span>Location:</span> <?=$restaurant['location'] ?></li>
    <li><span>Description:</span> <?=$restaurant['description'] ?></li>
    <li><span>Cuisine Type:</span> <?=$restaurant['cuisine_type'] ?></li>
    <li><span>Price Range:</span> <?=$restaurant['price_range'] ?></li>
    <li><span>Average Rating:</span> <?=$restaurant['avg_rating'] ?></li>
    </ul>
    <div class="rating">
      <label><input type="radio" id="rating_star" name="input_star" value="1" /><span>☆</span></label>
      <label><input type="radio" id="rating_star" name="input_star" value="2" /><span>☆</span></label>
      <label><input type="radio" id="rating_star" name="input_star" value="3" /><span>☆</span></label>
      <label><input type="radio" id="rating_star" name="input_star" value="4" /><span>☆</span></label>
      <label><input type="radio" id="rating_star" name="input_star" value="5" /><span>☆</span></label>
  </div>
  <div id="rating_value"></div>
  </article>

  <fieldset><legend>Reviews:</legend>
    <ul>

  <?php foreach ($reviews as $rev){ ?>
    <span id="reviewAuthor"> <?=$rev['user_id'] ?></span>
    <span id="reviewText"> <?=$rev['review_text'] ?></span>
    <span id="reviewDate"> <?=$rev['review_date'] ?></span>
  <?php } ?>

  <br>
  <fieldset><legend>Comments on the Review:</legend>
    <ul>
    <?php foreach ($comments as $rest) { ?>
      <li>
      <span id="commentText"> <?=$rest['comment_text'] ?></span>
      <span id="commentDate"> <?=$rest['comment_date'] ?></span>
      </li>
    <?php } ?>
    <ul>
    </fieldset>
    <br>
  </fieldset>

  <div id="footRestaurant">
  <a href=index.php> BACK </a>
  </div>
