<?php
	session_start();
	include_once('src/head.php');

	$page = (isset($_GET['p']) ? $_GET['p'] : "src/bestRestaurants");

	if ( file_exists($page.'.php')){
		include_once($page.'.php');
	}
	else{
			echo "Problemas com o url";
	}

	include_once('src/footer.php');
?>
