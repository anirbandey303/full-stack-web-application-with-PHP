<?php 
    session_start();
    include "./return_admins.php";
	if ($_SESSION['exclusive'] != '1') 
	{
		header('Location: overview.php?msg='.urlencode("You are not Authorised to do this").'');
		exit();
	}
	elseif (empty($_GET['note_id'])) 
	{
		header('Location: overview.php?msg='.urlencode("Invalid Argument").'');
		exit();
	}
	elseif (!isset($_GET['note_id'])) 
	{
		header('Location: overview.php?msg='.urlencode("Document not set").'');
		exit();
	}
	$note_id = $_GET['note_id'];
	//include"includes/db_connect.php";
	$query = "SELECT * FROM `notes` WHERE `note_id` LIKE '$note_id'";
	$result = mysqli_query($connection, $query);
	$row = mysqli_fetch_assoc($result);
		
	$del_frm_db = "DELETE FROM `notes` WHERE `notes`.`note_id` LIKE '$note_id'";
	if($result1 = mysqli_query($connection, $del_frm_db))
	{
		unlink($row['location']);
		header('Location: overview.php?msg='.urlencode("File has been deleted").'');
		exit();
	}
	else
	{
		header('Location: overview.php?msg='.urlencode("File could not be deleted").'');
		exit();
	}