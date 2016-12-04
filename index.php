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

	if (isset($_SESSION['username']))
		echo " Username: ".$_SESSION['username'];
	else
		echo "Sem user logado";

	include_once('src/footer.php');

?>
