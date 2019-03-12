<<<<<<< HEAD
<?php
	session_start();
	require_once "./Facebook/autoload.php";

	$FB = new \Facebook\Facebook([
		'app_id' => '1965244846829913',
		'app_secret' => 'ebebb11e004bc3b94bf79fd6eddce9a3',
		'default_graph_version' => 'v3.1'
	]);

	$helper = $FB->getRedirectLoginHelper();
=======
<?php
	session_start();
	require_once "./Facebook/autoload.php";

	$FB = new \Facebook\Facebook([
		'app_id' => 'XXXXXXXXXXX',
		'app_secret' => 'XXXXXXXXXXXXXXX',
		'default_graph_version' => 'XXX'
	]);

	$helper = $FB->getRedirectLoginHelper();
>>>>>>> 1c309511aaacd0f4bc1953db4c8ee79ba7c1d8eb
?>