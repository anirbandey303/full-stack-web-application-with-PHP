<?php
	
	require_once "GoogleAPI/vendor/autoload.php";
	$gClient = new Google_Client();
	$gClient->setClientID("XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX");
	$gClient->setClientSecret("XXXXXXXXXXXXXXXXXXX");
	$gClient->setApplicationName("XXXXXXXXXXX");
	$gClient->setRedirectUri("XXXXXXXXXXXXXXXXXXXXXX");
	$gClient->addScope("XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX");
	/*For Working on Local Server*/
	$guzzleClient = new \GuzzleHttp\Client(array( 'curl' => array( CURLOPT_SSL_VERIFYPEER => false, ), ));
	$gClient->setHttpClient($guzzleClient);
	/*End For Local Server, Disable while going live*/
?>