<?php
//Check for new user
	
	$search_q = "SELECT `fb_id` FROM `myusers` WHERE `fb_id` = '".$_SESSION['userData']['id']."'";
	$verify_q = mysqli_query($connection, $search_q);
	$flag = mysqli_num_rows($verify_q);
	if ($flag == 0)
	{
		//new user
		//insert the record in database
		$insert_q  = "INSERT INTO `myusers` (`user_id`, `fb_id`, `first_name`, `last_name`, `email`, `picture`, `joined`, `source`) VALUES (NULL, '".$_SESSION['userData']['id']."', '".$_SESSION['userData']['first_name']."', '".$_SESSION['userData']['last_name']."', '".$_SESSION['userData']['email']."', '".$_SESSION['userData']['picture']."', NOW(), '".$_SESSION['source']."');";
		if(mysqli_query($connection, $insert_q))
		{
			//1st Login Record Entry
			$insert_q2 = "INSERT INTO `login_status` (`login_status_id`, `fb_id`, `last_login`) VALUES (NULL, '".$_SESSION['userData']['id']."', NOW());";
			mysqli_query($connection, $insert_q2);
		}
		else
		{
			echo "It was not executed";
			exit();
		}
	}
	else
	{
		//old user, update login time
		$last_login = "UPDATE `login_status` SET `last_login` = NOW() WHERE `login_status`.`fb_id` = ".$_SESSION['userData']['id'].";";
		mysqli_query($connection, $last_login);
	}
?>