<?php 
require_once 'config.php';
$cookie_name = 'access_token';
$cookie_value = base64_encode($_SESSION['access_token']);
$cookie_source_name = 'source';
$cookie_source_value = base64_encode($_SESSION['source']);

setcookie($cookie_name, $cookie_value, time() - (86400 * 30), "/");
setcookie($cookie_source_name, $cookie_source_value, time() - (86400 * 30), "/");
unset($_SESSION['access_token']);
unset($_SESSION['source']);
session_destroy();

header('Location: index.php');
 ?>