<?php
	session_start();
	require_once "./Facebook/autoload.php";

	$FB = new \Facebook\Facebook([
		'app_id' => 'XXXXXXXXXXXXXX',
		'app_secret' => 'XXXXXXXXXXXXXXXXXXXXXXXXX',
		'default_graph_version' => 'XXX'
	]);

	$helper = $FB->getRedirectLoginHelper();
?>