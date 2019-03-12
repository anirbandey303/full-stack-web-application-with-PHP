<?php
session_start();
include"./includes/db_connect.php";
$senderID = $_SESSION['userData']['id'];
$receiverID = "admin";
echo $_POST['message'];
//$message = filter_var($message, FILTER_SANITIZE_STRING);

echo $senderID;
echo $receiverID;




?>