<!DOCTYPE html>
<html>

	<head>
		<title>Restaurant Advisor</title>
		<meta charset="UTF-8">
		<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
		<script src="script/login.js" type="text/javascript"></script>
		<script src="script/logout.js" type="text/javascript"></script>
		<script src="script/register.js" type="text/javascript"></script>
		<script src="script/editUser.js" type="text/javascript"></script>
		<script src="script/addRestaurant.js" type="text/javascript"></script>
		<script src="script/searchRestaurant.js" type="text/javascript"></script>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<!-- autocomplete -->
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<script src="script/autocomplete.js" type="text/javascript"></script>
		<!-- end of things to use autocomplete -->

		<script src="script/star.js" type="text/javascript"></script>
	</head>

<body>
<header>
    <h1>Restaurant Advisor</h1>
		<form id="search_restaurant" method="post">
			<label><input type="text" id="restaurant_name" placeholder="Enter a restaurant name"></label>
			<button type="button" id="search_rest_submit">Search </button>
		</form>
</header>
<div id="menu">
    <ul>
        <li><a href="index.php">Home</a></li>
					<?php if (isset($_SESSION['username'])) { ?>
						<li><a href="?p=src/addRestaurant">Add a Restaurant</a></li>
				    <li><form id="form_logout" method="post">
				    	<a href="?p=src/viewUser"><label><?=$_SESSION['username']?></label></a>
							<button type="reset" id="logout"> Logout </button>
				    </form></li>
			    <?php } else { ?>
						<li><a href="?p=src/login">Login</a></li>
		        <li><a href="?p=src/register">Register</a></li>
			    <?php } ?>
    </ul>
</div>


<section>
