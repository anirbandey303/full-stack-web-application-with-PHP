<?php 
	session_start();
	if (empty($_POST['email'])  ||
   		empty($_POST['password']) ||
   		!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
	{
		header('Location: ./login.php?err='.urlencode("Invalid Argument!").'');
	}
	if ( !( isset($_POST['email']) || isset($_POST['password']) ) )
	{
		header('Location: ./login.php?err='.urlencode("Please Enter Valid Details").'');
	}
	/* Security Checks */
	function test_input($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	$email = test_input($_POST["email"]);
	$password = test_input($_POST["password"]);
	include "includes/db_connect.php";
	$email=mysqli_real_escape_string($connection, $email);	
	$password=mysqli_real_escape_string($connection, $password);
	$email = strip_tags(htmlspecialchars($email));
	$password = strip_tags(htmlspecialchars($password));
	/*End of Security Checks */
?>