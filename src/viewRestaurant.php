<?php
  include_once('sql/restaurant.php');
  include_once('sql/user.php');

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
    <div class="average_rating">
      <label><input type="radio" id="rating_star" name="star_rating" value="1" <?= $restaurant['avg_rating'] == 1.0 ? "checked" : "";?> /><span>☆</span></label>
      <label><input type="radio" id="rating_star" name="star_rating" value="2" <?= $restaurant['avg_rating'] == 2.0 ? "checked" : "";?> /><span>☆</span></label>
      <label><input type="radio" id="rating_star" name="star_rating" value="3" <?= $restaurant['avg_rating'] == 3.0 ? "checked" : "";?> /><span>☆</span></label>
      <label><input type="radio" id="rating_star" name="star_rating" value="4" <?= $restaurant['avg_rating'] == 4.0 ? "checked" : "";?> /><span>☆</span></label>
      <label><input type="radio" id="rating_star" name="star_rating" value="5" <?= $restaurant['avg_rating'] == 5.0 ? "checked" : "";?> /><span>☆</span></label>
    </div>
  </article>
  <?php if (isset($_SESSION['username']) && $restaurant['owner_id'] != getUser($_SESSION['username'])['user_id'] ){ ?>
  <article id="adicionarReview">
    <fieldset><legend>Add your review:</legend>
    <form method="post">
      <div class="rating">
        <label><input type="radio" id="rating_star" name="input_star" value="1" /><span>☆</span></label>
        <label><input type="radio" id="rating_star" name="input_star" value="2" /><span>☆</span></label>
        <label><input type="radio" id="rating_star" name="input_star" value="3" /><span>☆</span></label>
        <label><input type="radio" id="rating_star" name="input_star" value="4" /><span>☆</span></label>
        <label><input type="radio" id="rating_star" name="input_star" value="5" /><span>☆</span></label>
      </div>
      <div id="rating_value"></div>
      <input id="user_id" type="hidden"  value="<?=getUser($_SESSION['username'])['user_id'] ?>">
      <input id="restaurant_id" type="hidden" value="<?=$restaurant['restaurant_id'] ?>">
      <textarea rows="2" name="reviewer" cols="50" id="review_text"></textarea>
      <button type="button" id="addReview">Add Review</button>
    </form>
    </fieldset>
  </article>
</br> <!-- TODO with css -->
  <?php } ?>

  <article id="allReviews">

    <?php foreach ($reviews as $rev){ ?>
      <fieldset><legend>Review from <span> <?=getUserById($rev['user_id'])['username'] ?> </span></legend>
      <div class="average_rating">
        <label><input type="radio" id="rating_star" name="star_rating" value="1" <?= $rev['rating'] == 1.0 ? "checked" : "";?> /><span>☆</span></label>
        <label><input type="radio" id="rating_star" name="star_rating" value="2" <?= $rev['rating'] == 2.0 ? "checked" : "";?> /><span>☆</span></label>
        <label><input type="radio" id="rating_star" name="star_rating" value="3" <?= $rev['rating'] == 3.0 ? "checked" : "";?> /><span>☆</span></label>
        <label><input type="radio" id="rating_star" name="star_rating" value="4" <?= $rev['rating'] == 4.0 ? "checked" : "";?> /><span>☆</span></label>
        <label><input type="radio" id="rating_star" name="star_rating" value="5" <?= $rev['rating'] == 5.0 ? "checked" : "";?> /><span>☆</span></label>
      </div>
      <span id="reviewAuthor"> <?=$rev['user_id'] ?></span>
      <span id="reviewText"> <?=$rev['review_text'] ?></span>
      <span id="reviewDate"> <?=$rev['review_date'] ?></span>
      <fieldset><legend>Comments on the Review:</legend>
        <article id="adicionarComentario">
          <form method="post">
            <input id="user_id" type="hidden"  value="<?=getUser($_SESSION['username'])['user_id'] ?>">
            <input id="review_id" type="hidden" value="<?=$rev['user_id']?>">
            <textarea rows="1" id="comment_text" cols="50"></textarea><br>
            <button type="button" id="addComment">Add Comment</button>
          </form>
        </article>

        <article id="allComentario">
        <?php foreach ($comments as $rest) { ?>
          <hr><!-- TODO with css -->
          <span id="commentUserName"> <?=getUserById($rest['user_id'])['username'] ?></span> <!-- TODO colocar o nome a bold -->
          <span id="commentText"> <?=$rest['comment_text'] ?></span>
          <span id="commentDate"> <?=$rest['comment_date'] ?></span></br><!-- TODO with css -->
        <?php } ?>
        </article>
        </fieldset>
        </fieldset>
        </br><!-- TODO with css -->
    <?php } ?>

  </article> <!-- #allReviews -->


  <div id="footRestaurant">
  <a href=index.php> BACK </a>
  </div>

<script src="script/userRating.js" type="text/javascript"></script>
<script src="script/addReview.js" type="text/javascript"></script>
<script src="script/addComments.js" type="text/javascript"></script>
