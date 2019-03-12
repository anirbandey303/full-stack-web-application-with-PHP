<?php
	function test_input($data)
	{
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
    include "../includes/db_connect.php";
    $output = '';
    if (isset($_POST['searchVal']))
    {
    	$searchq = mysqli_real_escape_string($connection, $_POST['searchVal']);
        $searchq = test_input($_POST['searchVal']);
        $searchq = $_POST['searchVal'];
        $searchq = preg_replace("#[^0-9a-z]#i"," ",$searchq);
        $search_query = mysqli_query($connection, "SELECT * FROM `subject` WHERE `subject_name` LIKE '%$searchq%' OR `subject_code` LIKE '%$searchq%' LIMIT 5") or die("Could Not Search");
        $count = mysqli_num_rows($search_query);
        if($count == 0)
        {
        	echo" <b style='color: white; font-size: 15px;'>Oops! I can't find it. </b>";
        }
        else
        {
        	while ($row_search = mysqli_fetch_assoc($search_query))
            {
            	$subname = $row_search['subject_name'];
                $subcode = $row_search['subject_code'];
                echo '<li> <a style="background: #4A639B; text-align: left; display:inline-block" class="dropdown-item" href="./subject?name='.$subcode.'"> <p style="color: white; font-size: 15px;">['.$subcode.'] '.$subname.' </p> </a> </li>';
            }
        }
    }
?>