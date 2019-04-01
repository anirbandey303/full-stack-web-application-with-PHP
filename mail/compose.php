<?php
$senderEmailID = $_POST['email'];
$message = $_POST['message'];
if(empty($_POST['email']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
{
	header('Location: ../contact-us.php?err='.urlencode("Enter some valid input for God's sake.").'');
         	exit();
}
else
{
	$senderEmailID = strip_tags(htmlspecialchars($_POST['email']));
	$message = strip_tags(htmlspecialchars($_POST['message']));
	$message = filter_var($message, FILTER_SANITIZE_STRING);
	$subject = "Website Contact Form: ".$senderEmailID."";
	$emailBody = "You have received a new message from your website support form.\n\n <br />"."Here are the details:\n\n <br /> Email: ".$senderEmailID."\n\n <br /> Message:\n".$message."";
	//$headers = "From: Shattak <noreply@shattak.com>";
	$headers = 'From: user@shattak.com' . " " .
	'Reply-To: user@shattak.com' . " " .
	'X-Mailer: PHP/' . phpversion();
	$emailTo = "anirbandey303@gmail.com";
/*
	echo $subject;
	echo $emailBody;
	echo $headers;
	echo $emailTo;
*/
	if(mail($emailTo, $subject, $emailBody, $headers))
		header('Location: ../contact-us.php?err='.urlencode("Your message has been emailed.").'');
	else
	{
		require_once "../includes/db_connect.php";
		$supportQuery = "INSERT INTO `support`(`support_id`, `user_email`,`message`, `time`) VALUES(NULL, '$senderEmailID', '$message', NOW());";
		if(mysqli_query($connection, $supportQuery))
		{
			header('Location: ../contact-us.php?err='.urlencode("Your message has been sent.").'');
         	exit();
         }
		else
		{
			header('Location: ../contact-us.php?err='.urlencode("This service isn't available ATM!").'');
         	exit();
		}
	}
}
?>