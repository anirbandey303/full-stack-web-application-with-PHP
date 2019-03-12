<?php
	
	require_once "GoogleAPI/vendor/autoload.php";
	$gClient = new Google_Client();
	$gClient->setClientID("282074653724-10sj9uqhj8nm1l4p5fs3v8nemj1b1bct.apps.googleusercontent.com");
	$gClient->setClientSecret("Ta-Zf0rj5u8vyuhDHQSGiQGZ");
	$gClient->setApplicationName("Shattak");
	$gClient->setRedirectUri("https://www.shattak.com/quordenet/g-callback");
	$gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");
	/*For Working on Local Server*/
	$guzzleClient = new \GuzzleHttp\Client(array( 'curl' => array( CURLOPT_SSL_VERIFYPEER => false, ), ));
	$gClient->setHttpClient($guzzleClient);
	/*End For Local Server, Disable while going live*/
?>