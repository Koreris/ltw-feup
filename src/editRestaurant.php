<?php
  include_once('sql/restaurant.php');
  include_once('sql/user.php');

  $restaurantId = $_GET['r'];
  $restaurant = getRestaurant($restaurantId);
  $userId = getUser($_SESSION['username'])['user_id'];
?>
<div id="edit_restr">
    <form id="form_edit_restr" method="post">
        <ul>
            <li><label> Restaurant's name:<br>
             <input type="text" id="name" value="<?=$restaurant['name']?>" placeholder="Restaurant's name" name="name">
                </label></li>
            <li><label>Restaurant's location:<br>
                <input type="text" id="location" value="<?=$restaurant['location']?>" placeholder="Restaurant's location" name="location">
                </label></li>
            <li><label>Restaurant's description:<br>
                <input type="text" id="description" value="<?=$restaurant['description']?>" placeholder="Restaurant's description (optional)" name="description">
            </label></li>
            <li><label>Restaurant's cuisine type:<br>
                <input type="text" id="cuisine_type" value="<?=$restaurant['cuisine_type']?>" placeholder="Restaurant's cuisine type:" name="cuisine_type">
            </label></li>
            <li><label>Restaurant's price range (meal for one):<br>
                <input type="text" id="price_range" value="<?=$restaurant['price_range']?>" placeholder="Price range" name="price_range">
            </label></li>
            <li><label>Restaurant's opening hour: <br>
                <input type="time" id="opening_time" value="<?=$restaurant['opening_time']?>" name="opening_time">
            </label></li>
            <li><label>Restaurant's closing hour:<br>
                <input type="time" id="closing_time" value="<?=$restaurant['closing_time']?>"name="closing_time">
            </label></li>
        </ul>
        <input id="user_id" type="hidden" value="<?=$userId?>">
        <input id="restaurant_id" type="hidden" value="<?=$restaurantId?>">
        <button class="css_btn_class" type="button" id="submit_restaurant">Save changes</button>
    </form>
</div>
<script src="script/editRestaurant.js" type="text/javascript"></script>
