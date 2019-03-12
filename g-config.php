<?php
	
	require_once "GoogleAPI/vendor/autoload.php";
	$gClient = new Google_Client();
	$gClient->setClientID("XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX");
	$gClient->setClientSecret("XXXXXXXXXXXXXXXXXXXXXXX");
	$gClient->setApplicationName("XXXXXX");
	$gClient->setRedirectUri("XXXXXXXXXXXXXXXXXXXXXXXXXXXXXX");
	$gClient->addScope("XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX");
	/*For Working on Local Server*/
	$guzzleClient = new \GuzzleHttp\Client(array( 'curl' => array( CURLOPT_SSL_VERIFYPEER => false, ), ));
	$gClient->setHttpClient($guzzleClient);
	/*End For Local Server, Disable while going live*/
?>