<?php
	session_start();
	require_once "./Facebook/autoload.php";

	$FB = new \Facebook\Facebook([
		'app_id' => 'XXXXXXXXXXX',
		'app_secret' => 'XXXXXXXXXXXXXXX',
		'default_graph_version' => 'XXX'
	]);

	$helper = $FB->getRedirectLoginHelper();
?>