<?php 
	session_start();
	include_once('src/head.php');

	$page = (isset($_GET['p']) ? $_GET['p'] : "index");

	if ( file_exists($page.'.php')){
		include_once($page.'.php');
	}
	else{
		echo "mosttrar qualquer coisa como pagina inicial";
	}

	include_once('src/footer.php'); 

	if (isset($_SESSION['username'])) 
		echo " Username: ".$_SESSION['username'];
	else 
		echo "nada";
?>