<?php
require_once "includes/db_connect.php";
$query = "SELECT n.`subject_code`, n.`department`, n.`filename`, n.`time`, s.`subject_name` 
			FROM notes n, subject s 
			WHERE n.`subject_code`= s.`subject_code`
			ORDER BY `time` DESC LIMIT 20";
$result = mysqli_query($connection, $query);
$Count = mysqli_num_rows($result);
?>

<?php include "./return_users.php"; ?>
<?php include('includes/header.php') ?>
<link href="./css/profile.css" rel="stylesheet">
<link href="./css/chat-box_v1.css" rel="stylesheet">
<?php include('includes/navbar.php') ?>
<?php include('includes/db_connect.php') ?>
<main>        
	<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">
				<div class="col-lg-9 col-md-8">
                    <div class="table-responsive">
                        <h1><strong>Recently Uploaded Documents</strong></h1>
                        <table class="table table-hover table-striped" style="word-wrap: break-word;">
                            <thead class="thead-inverse bg-dark">
                                <tr>
                                    <th>Department</th>
                                    <th>Filename</th>
                                    <th>Subject Name</th>
                                    <th>Date & Time</th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php									
									if ($Count == 0)
									{
										?><h4><i class="fa fa-exclamation coral"></i> No new updates were found</h4><?php
									}
									else
									{	
										?><ul class="user-menu-list"><?php
									   	while($row = mysqli_fetch_assoc($result))
										{
											$subject_code = $row['subject_code'];
											$department   = $row['department'];
											$filename     = $row['filename'];
											$subject_name = $row['subject_name'];
											$time         = $row['time'];
											$urlName = strtolower($row['subject_name']);
									    	$urlName = preg_replace('/\s+/', '-', $urlName);
											
										   	echo'<tr>                                   
				                                    <td>
				                                    <a href="subject.php?code='.urlencode($row['subject_code']).'&name='.urlencode($urlName).'">
				                                    '.$department.'</a>
				                                    </td>
				                                    
				                                    <td> <a href="subject.php?code='.urlencode($row['subject_code']).'&name='.urlencode($urlName).'">
				                                    '.$filename.'</a>
				                                    </td>
				                                    
				                                    <td>
				                                    <a href="subject.php?code='.urlencode($row['subject_code']).'&name='.urlencode($urlName).'">
				                                    '.$row['subject_name'].'</a>
				                                    </td>

				                                    <td> '.$time.' </td>
				                                                                       
				                                </tr>';
										}
									}?>
                                </ul>                                
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                	
                </div>
            </div>
        </div>
    </div>
</main>

	<!--/.Footer-->
<?php include('includes/footer.php') ?>
    <!--/.Footer-->
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<?php include('js/profile.php') ?>
<?php include('includes/scripts.php') ?>
</body>
</html>