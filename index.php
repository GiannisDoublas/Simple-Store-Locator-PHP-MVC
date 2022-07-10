<?php
	include_once 'model/database.php';
	include_once 'model/store.php';
	include_once 'model/map.php';
	include_once 'view/header.php';
	$db = new Database;
	

	if (isset($_POST["city"])) {
	  	$form_city = (int)$_POST["city"];
	  	$map = new Map();
	  	$map->loadStores($form_city);
	  	$map->renderMap();

	}else{
		$map = new Map();
		$map->loadStores();
		$map->renderMap();
	}

?>
