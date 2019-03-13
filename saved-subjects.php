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
                        <h1><strong>Favourite Subjects</strong></h1>
                        <table class="table table-hover table-striped" style="word-wrap: break-word;">
                            <thead class="thead-inverse bg-dark">
                                <tr>
                                    <th>Subject Code</th>
                                    <th>Subject Name</th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php
									$saveQuery = "SELECT n.`save_id`, n.`fb_id`, n.`subject_code`, t.`subject_name` FROM `save` n LEFT OUTER JOIN `subject` t ON t.`subject_code`=n.`subject_code` WHERE n.`fb_id` = '".$_SESSION['userData']['id']."' ORDER BY n.`save_id` DESC";
									$saveResult = mysqli_query($connection, $saveQuery);
									$saveCount = mysqli_num_rows($saveResult);
									if ($saveCount == 0)
									{
										?><h4><i class="fa fa-exclamation coral"></i> You haven't saved any subject.</h4><?php
									}
									else
									{	
										?><ul class="user-menu-list"><?php
									   	while ($saveRow = mysqli_fetch_assoc($saveResult))
									   	{
										$urlName = strtolower($saveRow['subject_name']);
								    	$urlName = preg_replace('/\s+/', '-', $urlName);
										
									   	echo'<tr>                                   
			                                    <td>
			                                    <a href="subject.php?code='.urlencode($saveRow['subject_code']).'&name='.urlencode($urlName).'">
			                                    '.$saveRow['subject_code'].'</a></td>
			                                    <td>
			                                    <a href="subject.php?code='.urlencode($saveRow['subject_code']).'&name='.urlencode($urlName).'">
			                                    '.$saveRow['subject_name'].'</td>
			                                    </a>                                   
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

