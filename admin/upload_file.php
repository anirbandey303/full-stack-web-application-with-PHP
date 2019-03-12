<?php	
	session_start();
	
	if(!isset($_POST['submit']))
	{
		header('Location:./index.php?msg='.urlencode("Invalid Request").'');
	}

ignore_user_abort(true);
set_time_limit(0);

	include "includes/db_connect.php";
	function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
	}
	
	$department	= test_input($_GET['department']);
	$subject_code 	= test_input($_POST['subject_code']);
	$filename = test_input($_POST['filename']); //chapter name
	$filename = filter_var($filename, FILTER_SANITIZE_STRING);
	$uploaded_by = $_SESSION['email'];

		$file_name = trim(str_replace(" ","_", $_FILES['file_upload']['name']));
		$file_type 		= $_FILES["file_upload"]["type"];
		$file_size 		= $_FILES["file_upload"]["size"];
		$tmp_name 		= $_FILES["file_upload"]["tmp_name"];		

	if (!empty($_FILES['file_upload']) && $_FILES['file_upload']['error'] == UPLOAD_ERR_OK)
	{
		if ($_FILES['file_upload']['size'] > 100000000) 
		{
		    throw new RuntimeException('Exceeded filesize limit.');
		}
		else
		{
		    // Be sure we're dealing with an upload
		    if (is_uploaded_file($_FILES['file_upload']['tmp_name']) === false)
		    {
		        throw new \Exception('Error on upload: Invalid file definition');
		    }

		    // Rename the uploaded file
		    $noRename = $file_name;
		    $uploadName = $file_name;
		    $ext = strtolower(substr($uploadName, strripos($uploadName, '.')+1));
		    $file_name = round(microtime(true)).mt_rand().'.'.$ext;
		    $file_name = $noRename;
		    $destination = "../uploads/".$file_name;
		    $getLocation = "./uploads/".$file_name;

			if(move_uploaded_file($tmp_name,$destination))
			{
				$sql = "INSERT INTO `notes` (`note_id`, `department`, `subject_code`, `filename`, `location`, `uploaded_by`, `time`) VALUES (NULL, '$department', '$subject_code', '$filename', '$getLocation', '$uploaded_by', NOW())";

				if($connection -> query($sql) === TRUE)
				{
					header('Location:./index.php?msg='.urlencode("The File has been uploaded"));
					exit();
				}
				else
				{
					header('Location:./index.php?msg='.urlencode("The File could not be uploaded"));
					exit();
				}
			}
			else
			{
				header('Location:./index.php?msg='.urlencode("Some Unknown Error occurred"));
				exit();
			}
		}
	}
?>
<?php include('includes/db_close.php'); ?>
