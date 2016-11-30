<!DOCTYPE html>
<html>

	<head>
		<title>Restaurant Advisor</title>
		<meta charset="UTF-8">
		<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
		<script src="script/login.js" type="text/javascript"></script>
		<script src="script/logout.js" type="text/javascript"></script>
		<script src="script/register.js" type="text/javascript"></script>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>

<body>
<div id="header">
    <h1>Restaurant Advisor</h1>
    <h2>Big menus here</h2>
</div>
<div id="menu">
    <ul>
        <li><a href="index.php">Home</a></li>
					<?php if (isset($_SESSION['username'])) { ?>
				    <li><form id="logout" method="post">
				    	<label><?=$_SESSION['username']?></label>
							<button type="reset" id="logout"> Logout </button>
				    </form></li>
				    <?php } else { ?>
							<li><a href="?p=src/login">Login</a></li>
			        <li><a href="?p=src/register">Register</a></li>
				    <?php } ?>
    </ul>
</div>

<div id="content">
