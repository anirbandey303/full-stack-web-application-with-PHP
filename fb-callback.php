<?php
	require_once "config.php";
	require_once "./includes/db_connect.php";
	try{
		$accessToken = $helper->getAccessToken();
	} 
	catch(Facebook\Exceptions\FacebookResponseException $e)
	{
		echo "Response Exception: " . $e->getMessage();
		exit();
	}
	catch(Facebook\Exceptions\FacebookSDKException $e)
	{
		echo "SDK Exception: " . $e->getMessage();
		var_dump($helper->getError());
		exit();
	}
	if(!$accessToken)
	{
		header('Location: ./login.php');
		exit();
	}
	$oAuth2Client = $FB->getOAuth2Client();
	$tokenMetadata = $oAuth2Client->debugToken($accessToken);
	/*if(!$accessToken->isLongLived())
		$accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);*/
	$response = $FB->get("me?fields=id,first_name,last_name,email,picture.type(large)",$accessToken);
	$userData = $response->getGraphNode()->asArray();
	$_SESSION['userData'] = $userData;
	$_SESSION['userData']['picture'] = $_SESSION['userData']['picture']['url'];
	$_SESSION['access_token'] = (string) $accessToken;
	$_SESSION['source'] = "facebook";

	$cookie_name = 'access_token';
	$cookie_value = base64_encode($_SESSION['access_token']);
	$cookie_source_name = 'source';
	$cookie_source_value = base64_encode("facebook");

	setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
	setcookie($cookie_source_name, $cookie_source_value, time() + (86400 * 30), "/");
	if (isset($_SESSION['access_token']))
	{
		include "./functions/login_record.php";
	}
	header('Location: ./index.php');
	exit();
?>