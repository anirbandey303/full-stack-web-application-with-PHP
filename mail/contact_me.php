<?php
session_start();
// Check for empty fields
if(empty($_POST['email'])     ||
   empty($_POST['message'])   ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
   	header('Location: ../index.php?err='.urlencode("Invalid Argument!").'');
   }
//$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
//$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));
$message = filter_var($message, FILTER_SANITIZE_STRING);
if (!isset($_SESSION['userData']['first_name']))
{
   $_SESSION['userData']['first_name'] = "Random User";
}
// Create the email and send the message
$to = 'anirbandey303@gmail.com'; // Add your email address inbetween the '' replacing. This is where the form will send a message to.
$email_subject = "Website Contact Form: ".$_SESSION['userData']['first_name']."";
$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: ".$_SESSION['userData']['first_name']."\n\nEmail: $email_address\n\nMessage:\n$message";
$headers = "From: User <noreply@shattak.com>" . "\r\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";   
if(mail($to,$email_subject,$email_body,$headers))
{
   if (isset($_GET['via']))
   {
      if ($_GET['via'] == 'support')
      {
         header('Location: ../contact-us.php?err='.urlencode("Your message has been sent.").'');
         exit();
      }
   }
	header('Location: ../index.php?err='.urlencode("Your message has been sent.").'');
	exit();
}
else
{
   if (isset($_GET['via']))
   {
      if ($_GET['via'] == 'support')
      {
         header('Location: ../contact-us.php?err='.urlencode("Sorry! This service is unavailable right now.").'');
         exit();
      }
   }
	header('Location: ../index.php?err='.urlencode("Sorry! This service is unavailable right now.").'');
	exit();
}
?>