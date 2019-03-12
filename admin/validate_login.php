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
	$email = filter_var($email, FILTER_SANITIZE_EMAIL);
	$password = test_input($_POST["password"]);
	include "includes/db_connect.php";
	$email=mysqli_real_escape_string($connection, $email);	
	$password=mysqli_real_escape_string($connection, $password);
	$email = strip_tags(htmlspecialchars($email));
	$password = strip_tags(htmlspecialchars($password));
	/*End of Security Checks */
	

	$query="SELECT `id`,`email`, `password`, `exclusive` FROM `registration` WHERE `email` LIKE '$email' AND `password` LIKE '$password'";
	$result=mysqli_query($connection,$query);
	$num_rows=mysqli_num_rows($result);
	if($num_rows==1)
	{
		$_SESSION['email'] = $email; //setting confirmed email as session
		$row=mysqli_fetch_assoc($result);
		$_SESSION['exclusive'] = $row['exclusive']; //setting exclusive access rights
		$update="UPDATE `registration` SET last_active=NOW() WHERE `email` LIKE '$email'";
		if($result1=mysqli_query($connection,$update))
		{
			$_SESSION['admin_token'] = $row['id']; //setting ascess token
			$accessToken = $_SESSION['admin_token'];
			$cookie_name = 'count';
			$cookie_value = base64_encode($accessToken);
			setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
			header('Location: index.php');
		}
		else
			header('Location: ./login.php?err='.urlencode("Record was not updated").'');
	}
	else
	{
		header('Location: ./login.php?err='.urlencode("Sorry! You are not Authorised").'');
	}
?>
<?php include('includes/db_close.php'); ?>

?>