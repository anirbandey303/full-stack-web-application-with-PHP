<?php
require_once "./includes/db_connect.php";
if (!isset($_SESSION['admin_token']))
{
	if (!isset($_COOKIE['count']))
	{
		//redirect to login
		header('Location: ./login.php?err='.urlencode("Please Log-in First").'');
	}
	else
	{
		//retreive id from cookie
			$_SESSION['admin_token'] = base64_decode($_COOKIE['count']);
			//sanitize the cookie data
			//search for data with id in database
			$searchUser = "SELECT `id`,`email`, `password`, `exclusive` FROM `registration` WHERE `id` LIKE '".$_SESSION['admin_token']."'";
			$resultUser = mysqli_query($connection, $searchUser);
			if (mysqli_num_rows($resultUser) == 1)
			{
				//set the results in session
				$userData = mysqli_fetch_assoc($resultUser);
				$_SESSION['email'] = $userData['email'];
				$_SESSION['id'] = $userData['id'];
				$_SESSION['exclusive'] = $userData['exclusive'];
				$update="UPDATE `registration` SET last_active=NOW() WHERE `email` LIKE '".$_SESSION['email']."'";
				mysqli_query($connection,$update);
			}
			else
			{
				header('Location: ./login.php?err='.urlencode("Sorry! You are not Authorised").'');
				exit();
			}
	}
}