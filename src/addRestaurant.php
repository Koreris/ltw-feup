<div id="add_restr">
    <form id="form_add_restr" method="post">
        <ul>
            <li><label> Restaurant's name:<br>
             <input type="text" id="rest_name" placeholder="Restaurant's name" name="rest_name">
                </label></li>
            <li><label>Restaurant's location:<br>
                <input type="text" id="rest_location" placeholder="Restaurant's location" name="rest_location">
                </label></li>
            <li><label>Restaurant's description:<br>
                <input type="text" id="rest_description" placeholder="Restaurant's description (optional)" name="rest_description">
            </label></li>
            <li><label>Restaurant's cuisine type:<br>
                <input type="text" id="c_type" placeholder="Restaurant's cuisine type:" name="c_type">
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
        </ul>
        <button type="button" id="submit_restaurant">Add new restaurant</button>
    </form>
</div>

<script src="script/addRestaurant.js" type="text/javascript"></script>
