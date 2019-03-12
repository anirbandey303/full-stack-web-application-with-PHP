<?php 
	session_start();
	if (empty($_POST["subject_code"])  ||
   		empty($_POST["subject_name"]) ||
  		empty($_POST["department"]) ||
  		empty($_POST["subject_description"]) ||
  		empty($_POST["keywords"]))
	{
		header('Location: ./register-new-subject.php?err='.urlencode("Invalid Argument!").'');
	}
	if ( !( isset($_POST["subject_code"]) || isset($_POST['subject_name']) || isset($_POST['department']) || isset($_POST['subject_description']) || isset($_POST['keywords']) ) )
	{
		header('Location: ./register-new-subject.php?err='.urlencode("Please Enter Valid Details").'');
	}
	/* Security Checks */
	function test_input($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	$subject_code = test_input ($_POST["subject_code"]);
	$subject_code = str_replace(" ","-", $subject_code);
	$subject_code = strtoupper ($subject_code);
	$subject_name =test_input ($_POST["subject_name"]);
	$department = test_input ($_POST["department"]);
	$subject_description =test_input ($_POST["subject_description"]);
	$keywords = test_input ($_POST["keywords"]);

	include "includes/db_connect.php";
	$subject_code=mysqli_real_escape_string($connection, $subject_code);	
	$subject_name=mysqli_real_escape_string($connection, $subject_name);
	$department=mysqli_real_escape_string($connection, $department);
	$subject_description=mysqli_real_escape_string($connection, $subject_description);
	$keywords=mysqli_real_escape_string($connection, $keywords);

	$subject_code = strip_tags(htmlspecialchars($subject_code));
	$subject_name = strip_tags(htmlspecialchars($subject_name));
	$department = strip_tags(htmlspecialchars($department));
	$subject_description = strip_tags(htmlspecialchars($subject_description));
	$keywords = strip_tags(htmlspecialchars($keywords));
	/*End of Security Checks */

		$file_name = trim(str_replace(" ","_", $_FILES['subject_image']['name']));
		$file_type 		= $_FILES["subject_image"]["type"];
		$file_size 		= $_FILES["subject_image"]["size"];
		$tmp_name 		= $_FILES["subject_image"]["tmp_name"];

	$destination = "../img/".$file_name;
	$location = "./img/".$file_name;
	//search for existing subject
	$search_q = "SELECT `subject_code` FROM `subject` WHERE `subject_code` = '$subject_code'";
	$result_q = mysqli_query($connection, $search_q);
	echo mysqli_num_rows($result_q);
	if (mysqli_num_rows($result_q) != 0)
	{
		//redirect
	    header('Location: ./register-new-subject.php?err='.urlencode("This Subject is already registered.").'#err');
	    exit();
	}
	else
	{
		if(isset($subject_name) && isset($subject_code) && isset($department) && isset($subject_description))
		{
			if(move_uploaded_file($tmp_name, $destination))
			{
				$sqli =
				"INSERT INTO `subject` (`subject_id`, `subject_code`, `subject_name`, `department`, `description`, `subject_image`, `location`, `keywords`) VALUES (NULL, '$subject_code', '$subject_name', '$department', '$subject_description', '$file_name', '$location','$keywords')";

				if ($connection -> query($sqli) === TRUE)
				{
					header('Location: ./register-new-subject.php?err='.urlencode("Subject has been registered").'#err');
					exit();
				}
				else 
				{
					header('Location: ./register-new-subject.php?err='.urlencode("Sorry!The file was moved but the subject was not registered.").'#err');
					exit();
				}
			}
			else
			{
				header('Location: ./register-new-subject.php?err='.urlencode("The file couldnot be copied onto server.").'#err');
				exit();
			}
		}
		else
		{
			header('Location: ./register-new-subject.php?err='.urlencode("Some unknown error occurred").'#err');
			exit();
		}
	}
	
?>
<?php include('includes/db_close.php'); ?>