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
        	echo" <b style='color: #868e96; font-size: 15px;'>Oops! I can't find it. </b>";
        }
        else
        {
        	while ($row_search = mysqli_fetch_assoc($search_query))
            {
            	$subname = $row_search['subject_name'];
                $urlName = strtolower($subname);
                $urlName = preg_replace('/\s+/', '-', $urlName);
                $subcode = $row_search['subject_code'];
                echo '<li class="list-group-item"><a style="" class="" href="./subject?code='.$subcode.'&name='.$urlName.'"> <b style="color: #868e96; font-size: 15px;">['.$subcode.'] '.$subname.' </b> </a> </li>';
            }
        }
    }
?>