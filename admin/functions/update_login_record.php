<?php
if (isset($_SESSION['access_token']))
{
	//update login time
	$last_login = "UPDATE `login_status` SET `last_login` = NOW() WHERE `login_status`.`fb_id` = ".$_SESSION['userData']['id'].";";
	mysqli_query($connection, $last_login);
}
?>