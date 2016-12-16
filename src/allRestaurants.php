<script src="script/searchRestaurantLocation.js" type="text/javascript"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="script/autocomplete_location.js" type="text/javascript"></script>

<h2>All Restaurants</h2>
<div id="menu2">
    <ul>
      <li>Search by location:<form id="search_restaurant_location" method="post">
          <label><input type="text" id="restaurant_location" placeholder="Enter a location"></label>
          <button class="css_btn_class" type="button" id="search_rest_loc_submit">Search</button>
      </li></form>
    </ul>
</div>
<?php
  include_once('sql/restaurant.php');

  $result = listRestaurants();

  foreach ($result as $rest){

  ?>
    <article id="restaurant">
    <div class="image" ><img src="<?=$rest['url_path'] ?>" alt="Image"> </div>
    <div class="info">
    <h3><?=$rest['name'] ?></h3>
    <ul><li><span>Name:</span> <?=$rest['name'] ?> </li>
    <li><span>Location:</span> <?=$rest['location'] ?> </li>
    <li><span>Description:</span> <?=$rest['description'] ?> </li>
    <li><span>Cuisine Type:</span> <?=$rest['cuisine_type'] ?> </li>
    <li><span>Working time: </span> <?=$rest['opening_time'] ?> - <?=$rest['closing_time'] ?> </li>
    <li><span>Price Range:</span> <?=$rest['price_range'] ?> </li>
    <!--$decimal = round($rest['avg_rating'],0);
    <li><span>Average Rating:</span> <?=$decimal ?> </li>
    <div class="average_rating">
      <label><input type="radio" id="rating_star" name="star_rating" value="1" /><span <?= ($rest['avg_rating'] >= 1.0)? 'class="starOn"' : "";?>>☆</span></label>
      <label><input type="radio" id="rating_star" name="star_rating" value="2" /><span <?= ($rest['avg_rating'] >= 1.5)? 'class="starOn"' : "";?>>☆</span></label>
      <label><input type="radio" id="rating_star" name="star_rating" value="3" /><span <?= ($rest['avg_rating'] >= 2.5)? 'class="starOn"' : "";?>>☆</span></label>
      <label><input type="radio" id="rating_star" name="star_rating" value="4" /><span <?= ($rest['avg_rating'] >= 3.5)? 'class="starOn"' : "";?>>☆</span></label>
      <label><input type="radio" id="rating_star" name="star_rating" value="5" /><span <?= ($rest['avg_rating'] >= 4.5)? 'class="starOn"' : "";?>>☆</span></label>
    </div>-->
    </ul>
  </div>
    </article>

    <div id="footRestaurant">
    <a href=index.php?p=src/viewRestaurant&r=<?=$rest['restaurant_id'] ?> >See More</a>
    </div>
<?php
  }
?>
