<?php
  include_once('sql/restaurant.php');
  include_once('sql/user.php');

  $restaurant_id = $_GET['r'];

  $restaurant = getRestaurant($restaurant_id);
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

    <?php if (isset($_SESSION['username']) && $restaurant['owner_id'] == getUser($_SESSION['username'])['user_id'] ){ ?>
      <form method="post">
        <button type="button" id="editRestaurant">Edit</button>
        <button type="button" id="delRestaurant">Delete</button>
      </form>
    <?php } ?>
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
      <input id="user_id" type="hidden"  value="<?=getUser($_SESSION['username'])['user_id'] ?>">
      <input id="restaurant_id" type="hidden" value="<?=$restaurant['restaurant_id'] ?>">
      <textarea rows="3" name="reviewer" cols="60" id="review_text">Dont forget the stars above</textarea>
      <button type="button" id="addReview">Add Review</button>
    </form>
    </fieldset>
  </article>
  <?php } ?>

  <article id="allReviews">

    <?php foreach ($reviews as $rev){ ?>

      <fieldset><legend>Review from <span id="toBold"> <?=getUserById($rev['user_id'])['username'] ?> </span></legend>
      <div id="oneReview">
      

      <div class="average_rating">
        <p><span id="toBold">User rating:</span>
        <label><input type="radio" id="rating_star" name="star_rating" value="1" <?= $rev['rating'] == 1.0 ? "checked" : "";?> /><span>☆</span></label>
        <label><input type="radio" id="rating_star" name="star_rating" value="2" <?= $rev['rating'] == 2.0 ? "checked" : "";?> /><span>☆</span></label>
        <label><input type="radio" id="rating_star" name="star_rating" value="3" <?= $rev['rating'] == 3.0 ? "checked" : "";?> /><span>☆</span></label>
        <label><input type="radio" id="rating_star" name="star_rating" value="4" <?= $rev['rating'] == 4.0 ? "checked" : "";?> /><span>☆</span></label>
        <label><input type="radio" id="rating_star" name="star_rating" value="5" <?= $rev['rating'] == 5.0 ? "checked" : "";?> /><span>☆</span></label>
        </p>
      </div>

      <div class="comment">
        <p><span id="toBold"> Comment: </span><?=$rev['review_text'] ?></p>
        <p><span id="toBold"> Date: </span><?=$rev['review_date'] ?></p>
      </div>

      <div class="toAllComments">
      <?php
        $comments = getReviewComments($rev['review_id']);
        if (sizeof($comments) != 0){ ?>
        <legend>Comments on the Review:</legend>

        <article id="allComments">
          <?php
          foreach ($comments as $rest) { ?>
            <div id="eachComment">
              <hr class="toHr">
              <p><span id="toBold"> User: </span><?=getUserById($rest['user_id'])['username'] ?> <?=$rest['comment_date'] ?></p>
              <p><span id="toBold"> Comment: </span><?=$rest['comment_text'] ?></p>
            </div>
          <?php } ?>
        </article>

      <?php } ?>
        
        <?php  if (isset($_SESSION['username'])){ ?>
        <hr class="toHr">
        <article id="adicionarComentario">
          <form class="myForm" method="post">
            <input id="<?='user_id'.$rev['review_id']?>" type="hidden"  value="<?=getUser($_SESSION['username'])['user_id'] ?>">
            <input id="<?='review_id'.$rev['review_id']?>" type="hidden" value="<?=$rev['review_id']?>">
            <textarea rows="1" id="<?='comment_text'.$rev['review_id']?>" cols="50"></textarea><br>
            <button type="button" id="addComment" onclick="goDoSomething(<?=$rev['review_id']?>)" class="addComment">Add Comment</button>
          </form>
        </article>
        
        <?php } ?>
        </div>
        </div>
        </fieldset>
      
    <?php } ?>

  </article> <!-- #allReviews -->


  <div id="footRestaurant">
  <a href=index.php> BACK </a>
  </div>

<script src="script/userRating.js" type="text/javascript"></script>
<script src="script/addReview.js" type="text/javascript"></script>
<script src="script/addComments.js" type="text/javascript"></script>
<script src="script/editRestaurant.js" type="text/javascript"></script>
<script src="script/delRestaurant.js" type="text/javascript"></script>
