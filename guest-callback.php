<?php
	session_start();
	require_once "./includes/db_connect.php";
	
	$flag = 0;
	while($flag != 1)
	{
		$accessToken = rand(10000000000000, 99999999999999);

		$query = "SELECT * FROM `myusers` WHERE `fb_id` = '$accessToken'";
		$result = mysqli_query($connection, $query);
		if (mysqli_num_rows($result)==0)
		{
			$flag = 1;
		}
	}
	if(!$accessToken)
	{
		header('Location: ./login.php');
		exit();
	}
	
	$_SESSION['userData']['id'] = $accessToken;
	$_SESSION['userData']['email'] = "guest".$accessToken."@quordenet.com";
	$_SESSION['userData']['first_name'] = "Guest".$accessToken;
	$_SESSION['userData']['last_name'] = $accessToken;	
	$_SESSION['userData']['picture'] = "./img/profile/guest-user.png";
	$_SESSION['access_token'] = $accessToken;
	$_SESSION['source'] = "guest";

	$cookie_name = 'access_token';
	$cookie_value = base64_encode($accessToken);
	$cookie_source_name = 'source';
	$cookie_source_value = base64_encode("guest");

	setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
	setcookie($cookie_source_name, $cookie_source_value, time() + (86400 * 30), "/");

	
	if (isset($_SESSION['access_token']))
	{
		require_once "./functions/login_record.php";
		header('Location: index.php');
	}
	exit();
?>