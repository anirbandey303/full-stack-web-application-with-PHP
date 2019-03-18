<?php

require_once "config.php";
require_once "g-config.php";
require_once "./includes/db_connect.php";
if (!isset($_SESSION['access_token']))
{
	if (!isset($_COOKIE['access_token']) || !isset($_COOKIE['source']))
	{
		//redirect to login
		header('Location: ./login.php');
	}
	else
	{
		$_SESSION['source'] = base64_decode($_COOKIE['source']);
		if($_SESSION['source'] == "facebook") //Returning Facebook User
		{
			$accessToken = base64_decode($_COOKIE['access_token']);
			//$_SESSION['source'] = base64_decode($_COOKIE['source']);
			$response = $FB->get("me?fields=id,first_name,last_name,email,picture.type(large),gender",$accessToken);
			$userData = $response->getGraphNode()->asArray();
			$_SESSION['userData'] = $userData;
			$_SESSION['userData']['picture'] = $_SESSION['userData']['picture']['url'];
			$_SESSION['access_token'] = (string) $accessToken;
		}
		elseif ($_SESSION['source'] == "google") //Returning Google User
		{			
			//retreive id from cookie
			$_SESSION['access_token'] = base64_decode($_COOKIE['access_token']);
			//sanitize the cookie data
			//search for data with id in database
			$searchUser = "SELECT `fb_id`, `first_name`, `last_name`, `email`, `picture` FROM `myusers` WHERE `fb_id` LIKE '".$_SESSION['access_token']."'";
			$resultUser = mysqli_query($connection, $searchUser);
			if (mysqli_num_rows($resultUser) == 1)
			{
				//set the results in session
				$userData = mysqli_fetch_assoc($resultUser);
				$_SESSION['userData']['email'] = $userData['email'];
				$_SESSION['userData']['first_name'] = $userData['first_name'];
				$_SESSION['userData']['last_name'] = $userData['last_name'];
				$_SESSION['userData']['id'] = $userData['fb_id'];
				$_SESSION['userData']['picture'] = $userData['picture'];
			}
			else
			{
				header('Location: ./login.php');
				exit();
			}
					
		}
		else if ($_SESSION['source'] == "guest")
		{
			//retreive id from cookie
			$_SESSION['access_token'] = base64_decode($_COOKIE['access_token']);
			//sanitize the cookie data
			//search for data with id in database
			$searchUser = "SELECT `fb_id`, `first_name`, `last_name`, `email`, `picture` FROM `myusers` WHERE `fb_id` LIKE '".$_SESSION['access_token']."'";
			$resultUser = mysqli_query($connection, $searchUser);
			if (mysqli_num_rows($resultUser) == 1)
			{
				//set the results in session
				$userData = mysqli_fetch_assoc($resultUser);
				$_SESSION['userData']['email'] = $userData['email'];
				$_SESSION['userData']['first_name'] = $userData['first_name'];
				$_SESSION['userData']['last_name'] = $userData['last_name'];
				$_SESSION['userData']['id'] = $userData['fb_id'];
				$_SESSION['userData']['picture'] = $userData['picture'];
			}
			else
			{
				header('Location: ./login.php');
				exit();
			}
		}
		else //Manupulated cookie hacker
		{
			header('Location: ./login.php');
		}
	}
}
?>