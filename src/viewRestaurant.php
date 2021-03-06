<?php
  include_once('sql/restaurant.php');
  include_once('sql/user.php');

  $restaurant_id = $_GET['r'];
  $restaurant = getRestaurant($restaurant_id);
  $reviews = getRestaurantReviews($restaurant_id);
  $decimal = round($restaurant['avg_rating'],0);

  if (isset($_SESSION['username'])){
    $userId = getUser($_SESSION['username'])['user_id'];
  }
?>
  <h2> <?=$restaurant['name'] ?></h2>
  <article id="restaurant">
    <div class="image" ><img src="<?=$restaurant['url_path'] ?>" alt="Image"></div>
    <div class="info">
    <ul><li><span>Name:</span> <?=$restaurant['name'] ?></li>
    <li><b>Location</b>: <span id="restaurant-location"><?=$restaurant['location']?></span></li>
    <li><b>Coordinates</b>: <span id="restaurant-gps"></span></li>
    <li><span>Description:</span> <?=$restaurant['description'] ?></li>
    <li><span>Cuisine Type:</span> <?=$restaurant['cuisine_type'] ?></li>
    <li><span>Working time: </span> <?=$restaurant['opening_time'] ?> - <?=$restaurant['closing_time'] ?> </li>
    <li><span>Price Range:</span> <?=$restaurant['price_range'] ?></li>
    <li><span>Average Rating:</span> <?=$decimal?></li>
    </ul>
    <div class="average_rating">
      <label><input type="radio" id="rating_star" name="star_rating" value="1" /><span <?= ($restaurant['avg_rating'] >= 1.0)? 'class="starOn"' : "";?>>☆</span></label>
      <label><input type="radio" id="rating_star" name="star_rating" value="2" /><span <?= ($restaurant['avg_rating'] >= 1.5)? 'class="starOn"' : "";?>>☆</span></label>
      <label><input type="radio" id="rating_star" name="star_rating" value="3" /><span <?= ($restaurant['avg_rating'] >= 2.5)? 'class="starOn"' : "";?>>☆</span></label>
      <label><input type="radio" id="rating_star" name="star_rating" value="4" /><span <?= ($restaurant['avg_rating'] >= 3.5)? 'class="starOn"' : "";?>>☆</span></label>
      <label><input type="radio" id="rating_star" name="star_rating" value="5" /><span <?= ($restaurant['avg_rating'] >= 4.5)? 'class="starOn"' : "";?>>☆</span></label>
    </div>
   <?php if (isset($_SESSION['username']) && $restaurant['owner_id'] == $userId ){ ?>
      <form method="post">
        <button class="css_btn_class" type="button" id="editRestaurant" onclick="window.location.href='?p=src/editRestaurant&r=<?=$restaurant_id?>'">Edit</button>
        <button class="css_btn_class" type="button" id="delRestaurant">Delete</button>
        <input id="user_id" type="hidden" value="<?=$userId?>">
        <input id="restaurant_id" type="hidden" value="<?=$restaurant_id?>">
      </form>
    <?php } ?>
  </div>
  </article>

<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC8Pb1iBctWNA2rCwImA70DPtwUAEU75-k&callback=initMap">
    </script>

  <script>
  function initMap() 
  {
    var map = new google.maps.Map(document.getElementById('google-maps'), {
      zoom: 15,
    });
    var geocoder = new google.maps.Geocoder();
	  var locationText = $("#restaurant-location").text();
	  var marker = null;
    
    geocoder.geocode({'address':locationText}, function(results, status)
			{
				if (status == google.maps.GeocoderStatus.OK)
				{
					marker = new google.maps.Marker(
					{
						map:map,
						position:results[0].geometry.location
					});
					map.setCenter(marker.getPosition());
					$("#restaurant-gps").text(results[0].geometry.location);
				}
      });
        /*var uluru = {lat: -25.363, lng: 131.044};
        var map = new google.maps.Map(document.getElementById('google-maps'), 
        {
          zoom: 4,
          center: uluru
        });
        var marker = new google.maps.Marker
        ({
          position: uluru,
          map: map
        });*/
      }
      </script>
  <div id="google-maps"></div>


  <?php if (isset($_SESSION['username']) && $restaurant['owner_id'] != $userId ){ ?>
  <article id="adicionarReview">
    <fieldset><legend>Add your review:</legend>
    <form method="post">
      <div class="rating">
        <label><input type="radio" id="rating_star" name="input_star" value="1" checked/><span>☆</span></label>
        <label><input type="radio" id="rating_star" name="input_star" value="2" /><span>☆</span></label>
        <label><input type="radio" id="rating_star" name="input_star" value="3" /><span>☆</span></label>
        <label><input type="radio" id="rating_star" name="input_star" value="4" /><span>☆</span></label>
        <label><input type="radio" id="rating_star" name="input_star" value="5" /><span>☆</span></label>
      </div>
      <input id="user_id" type="hidden"  value="<?=$userId ?>">
      <input id="restaurant_id" type="hidden" value="<?=$restaurant['restaurant_id'] ?>">
      <textarea rows="3" name="reviewer" cols="60" id="review_text" placeholder="Don't forget the stars above"></textarea>
      <button class="css_btn_class" type="button" id="addReview">Add Review</button>
    </form>
    </fieldset>
  </article>
  <?php } ?>

  <article id="allReviews">

    <?php foreach ($reviews as $rev){ ?>

      <fieldset><legend>Review from <span id="toBold"> <?=getUserById($rev['user_id'])['username'] ?> </span></legend>
      <div id="oneReview">


      <div class="review_rating">
        <p><span id="toBold">User rating: </span>
        <label><input type="radio" id="rating_star" name="reviews_tar_rating" value="1" /><span <?= ($rev['rating'] >= 1.0)? 'class="starOn"' : "";?>>☆</span></label>
        <label><input type="radio" id="rating_star" name="reviews_tar_rating" value="2" /><span <?= ($rev['rating'] >= 1.5)? 'class="starOn"' : "";?>>☆</span></label>
        <label><input type="radio" id="rating_star" name="reviews_tar_rating" value="3" /><span <?= ($rev['rating'] >= 2.5)? 'class="starOn"' : "";?>>☆</span></label>
        <label><input type="radio" id="rating_star" name="reviews_tar_rating" value="4" /><span <?= ($rev['rating'] >= 3.5)? 'class="starOn"' : "";?>>☆</span></label>
        <label><input type="radio" id="rating_star" name="reviews_tar_rating" value="5" /><span <?= ($rev['rating'] >= 4.5)? 'class="starOn"' : "";?>>☆</span></label>
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
              <p><span id="toBold"> User: </span><?=getUserById($rest['user_id'])['username'] ?> <span id="toBold"> Data: </span> <?=$rest['comment_date'] ?></p>
              <p><span id="toBold"> Comment: </span><?=$rest['comment_text'] ?></p>
            </div>
          <?php } ?>
        </article>

      <?php } ?>

        <?php  if (isset($_SESSION['username'])){ ?>
        <hr class="toHr">
        <article id="adicionarComentario">
          <form class="myForm" method="post">
            <input id="<?='user_id'.$rev['review_id']?>" type="hidden"  value="<?=$userId ?>">
            <input id="<?='review_id'.$rev['review_id']?>" type="hidden" value="<?=$rev['review_id']?>">
            <textarea rows="1" id="<?='comment_text'.$rev['review_id']?>" cols="50"></textarea><br>
            <button class="css_btn_class" type="button" id="addComment" onclick="goDoSomething(<?=$rev['review_id']?>)" class="addComment">Add Comment</button>
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
