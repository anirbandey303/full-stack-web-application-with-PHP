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
?>
<!DOCTYPE html>
<html>
<head>
	<title>Confirmation</title>
</head>
<body>
	<b>Are You Sure You Want To Delete This File?</b> <br>
	<b><a class="btn btn-block btn-danger" href="delete_files?note_id=<?= $note_id ?>">YES</a> <br> <br>
	<a class="btn btn-block btn-info" href="overview">NO </a></b>
</body>
</html>