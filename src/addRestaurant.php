
<?php
  include_once('sql/user.php');
  $user_id = getUser($_SESSION['username'])['user_id'];
?>
<div id="add_restr">
    <form id="form_add_restr" method="post">
        <ul>
            <li><label> Restaurant's name:<br>
             <input type="text" id="name" placeholder="Restaurant's name" name="name">
                </label></li>
            <li><label>Restaurant's location:<br>
                <input type="text" id="location" placeholder="Restaurant's location" name="location">
                </label></li>
            <li><label>Restaurant's description:<br>
                <input type="text" id="description" placeholder="Restaurant's description (optional)" name="description">
            </label></li>
            <li><label>Restaurant's cuisine type:<br>
                <input type="text" id="cuisine_type" placeholder="Restaurant's cuisine type:" name="cuisine_type">
            </label></li>
            <li><label>Restaurant's price range (meal for one):<br>
                <input type="text" id="price_range" placeholder="Price range" name="price_range">
            </label></li>
            <li><label>Restaurant's opening hour: <br>
                <input type="time" id="opening_time" name="opening_time">
            </label></li>
            <li><label>Restaurant's closing hour:<br>
                <input type="time" id="closing_time" name="closing_time">
            </label></li>
            <li><input type="hidden"  id="user_id" value="<?=$user_id?>"></li>
            <!--<li><label> Image <input type="file" id="uploadImage" name="pic" accept="image/id"></label></li>-->
        </ul>
        <button class="css_btn_class" type="button" id="submit_restaurant">Add new restaurant</button>
    </form>
</div>

<script src="script/addRestaurant.js" type="text/javascript"></script>
