<?php
	session_start();
	$cookie_name = 'count';
	$cookie_value = base64_encode($_SESSION['access_token']);

	unset($_SESSION['admin_token']);
	setcookie($cookie_name, $cookie_value, time() - (86400 * 30), "/");
	session_destroy();
	header('Location: index.php');
?>