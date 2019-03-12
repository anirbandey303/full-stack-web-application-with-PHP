<?php session_start();
	include "./return_admins.php";

if (empty($_POST['email']) || empty($_POST['password']) || empty($_POST['confirm']) || !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
	{
		header('Location: ./register-new-admin.php?msg='.urlencode("Invalid Argument!").'#msg');
	}
	if( !(isset($_POST['email']) || isset($_POST['password']) || isset($_POST['confirm']) ))
	{
		header('Location: ./register-new-admin.php?msg='.urlencode("Please Enter Valid Details").'#msg');
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
	$confirm = test_input($_POST["confirm"]);

	//include "includes/db_connect.php";
	$email=mysqli_real_escape_string($connection, $email);	
	$password=mysqli_real_escape_string($connection, $password);
	$confirm=mysqli_real_escape_string($connection, $confirm);

	$email = strip_tags(htmlspecialchars($email));
	$password = strip_tags(htmlspecialchars($password));
	$confirm = strip_tags(htmlspecialchars($confirm));
	/*End of Security Checks */

	if($password == $confirm)
	{
		$search_q = "SELECT `email` FROM `registration` WHERE `email` LIKE '$email'";
		$result_q = mysqli_query($connection, $search_q);
		if (mysqli_num_rows($result_q) > 0)
		{
			//redirect
	        header('Location: ./register-new-admin.php?msg='.urlencode("This e-mail id is already registered.").'#msg');
	        exit();
		}
		else
		{
			$query="INSERT INTO `registration` (`id`, `email`, `password`, `last_active`) VALUES (NULL, '$email', '$password', NOW());";
			if(mysqli_query($connection,$query))
		    {
		    	//redirect
		        header('Location: ./register-new-admin.php?msg='.urlencode("Congratulations! New Admin has been registered.").'#msg');
		        exit();
		    }
		    else
		    {
		    	header('Location: ./register-new-admin.php?msg='.urlencode("Sorry!Admin was not Registered.").'#msg');
		    }
		}
	}
	else
		header('Location: ./register-new-admin.php?msg='.urlencode("Passwords did not match").'#msg');
?>
<?php include('includes/db_close.php'); ?>