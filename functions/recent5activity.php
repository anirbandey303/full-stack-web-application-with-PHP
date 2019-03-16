								<?php
									//require_once "includes/db_connect.php";
									$queryActivity = "SELECT n.`subject_code`, n.`department`, n.`filename`, n.`time`, s.`subject_name` 
												FROM notes n, subject s 
												WHERE n.`subject_code`= s.`subject_code`
												ORDER BY `time` DESC LIMIT 4";
									$resultActivity = mysqli_query($connection, $queryActivity);
									$CountActivity = mysqli_num_rows($resultActivity);								
								?>