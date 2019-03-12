<?php
session_start();
include '../includes/db_connect.php';
$subjectCode = $_GET['subject_code'];
$userID = $_SESSION['userData']['id'];
$action = $_GET['action'];
if ($action == 'save')
{
	//inset data into database
	$insertQuery = "INSERT INTO `save` (`save_id`, `fb_id`, `subject_code`) VALUES (NULL, '$userID', '$subjectCode');";
	mysqli_query($connection, $insertQuery);
	header('Location: ../subject.php?code='.$subjectCode.'&name=done');
}
else
{
	// delete from database
	$deleteQuery = "DELETE FROM `save` WHERE `fb_id` = '$userID' AND `subject_code` = '$subjectCode'";
	mysqli_query($connection, $deleteQuery);
	header('Location: ../subject.php?code='.$subjectCode.'&name=done');
}
?>