<?php
	session_start();
	require_once "./Facebook/autoload.php";

	$FB = new \Facebook\Facebook([
		'app_id' => '1965244846829913',
		'app_secret' => 'ebebb11e004bc3b94bf79fd6eddce9a3',
		'default_graph_version' => 'v3.1'
	]);

	$helper = $FB->getRedirectLoginHelper();
?>