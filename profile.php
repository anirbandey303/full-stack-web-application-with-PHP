<?php include "./return_users.php"; ?>
<?php include('includes/header.php') ?>
<link href="./css/profile.css" rel="stylesheet">
<link href="./css/chat-box_v1.css" rel="stylesheet">

<?php include('includes/navbar.php') ?>
<?php include('includes/db_connect.php') ?>
    <!--Main layout-->
    <main>        
		<div class="container-fluid">
			<div class="col-md-12">
			<section>
		    <div class="row user-menu-container square">
		        <div class="col-md-7 user-details">
		            <div class="row coralbg white">
		                <div class="col-md-6 no-pad">
		                    <div class="user-pad">
		                        <h3>Welcome back, <?= $_SESSION['userData']['first_name'] ?></h3>
		                        
		                        <h4 class=""><i class="fa fa-envelope"></i> <?= $_SESSION['userData']['email'] ?></h4>
		                        <h4 class=""><i class="fa fa-id-badge"></i> <?= $_SESSION['userData']['id'] ?></h4>
		                        <h4 class=""><i class="fa fa-plug"></i> <?= $_SESSION['source'] ?></h4>
		                         <br />
		                        <button onclick="window.location ='logout.php'" type="button" class="btn btn-labeled btn-primary" href="#">
		                            <span class="btn-label"><i class="fa fa-sign-out"></i></span>Logout
		                        </button>
		                    </div>
		                </div>
		                <div class="col-md-6 no-pad text-center" style="padding: 10px;">
		                    <div class="user-image">
		                        <img src="<?= $_SESSION['userData']['picture'] ?>" class="img-responsive thumbnail responsive" align="middle">
		                    </div>
		                </div>
		            </div>
		            <!--<div class="row overview">
		                <div class="col-md-4 user-pad text-center">
		                    <h3>FOLLOWERS</h3>
		                    <h4>0</h4>
		                </div>
		                <div class="col-md-4 user-pad text-center">
		                    <h3>FOLLOWING</h3>
		                    <h4>0</h4>
		                </div>
		                <div class="col-md-4 user-pad text-center">
		                    <h3>CONTRIBUTIONS</h3>
		                    <h4>0</h4>
		                </div>
		            </div>-->
		        </div>
		        <div class="col-md-1 user-menu-btns">
		            <div class="btn-group-vertical square" id="responsive">
		                <a href="#" class="btn btn-block btn-default active">
		                  <i class="fa fa-bookmark-o fa-3x"></i>
		                </a>
		                <a href="#" class="btn btn-default">
		                  <i class="fa fa-bell-o fa-3x"></i>
		                </a>
		                <a href="#" class="btn btn-default">
		                  <i class="fa fa-envelope-o fa-3x"></i>
		                </a>
		                <a href="#" class="btn btn-default">
		                  <i class="fa fa-cloud-upload fa-3x"></i>
		                </a>
		            </div>
		        </div>
		        
		        <div class="col-md-4 user-menu user-pad">
		            <div class="user-menu-content active">
		                <h3>
		                    Saved Subjects
		                </h3>
		                <?php
		                $saveQuery = "SELECT n.`save_id`, n.`fb_id`, n.`subject_code`, t.`subject_name` FROM `save` n LEFT OUTER JOIN `subject` t ON t.`subject_code`=n.`subject_code` WHERE n.`fb_id` = '".$_SESSION['userData']['id']."' ORDER BY n.`save_id` DESC LIMIT 5";
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
		                		echo '<li>
		                        		<a href="subject.php?code='.urlencode($saveRow['subject_code']).'&name='.urlencode($urlName).'"><h4><i class="fa fa-bookmark coral"></i> ['.$saveRow['subject_code'].'] '.$saveRow['subject_name'].'</h4></a>
		                    		</li>';
		                	}?>
		                	<li>
		                        <button type="button" class="btn btn-labeled btn-success" onclick="window.location.href='./saved-subjects.php'">
		                            <span class="btn-label"><i class="fa fa-eye"></i></span>View all saved
		                        </button>
		                    </li>
		                	</ul><?php
		                }

		                ?>
		                
		            </div>
		            <div class="user-menu-content">
		                <h3>
		                    Notifications
		                </h3>		                
		                    <?php
		                    require_once "./functions/recent5activity.php";
		                    if ($CountActivity == 0)
							{
								?><h4><i class="fa fa-exclamation coral"></i> No new updates were found</h4><?php
							}
							else
							{	
								?><ul class="user-menu-list"><?php
			                    while($rowActivity = mysqli_fetch_assoc($resultActivity))
								{
									$subject_code = $rowActivity['subject_code'];
									$department   = $rowActivity['department'];
									$filename     = $rowActivity['filename'];
									$subject_name = $rowActivity['subject_name'];
									$time         = $rowActivity['time'];
									$urlName = strtolower($rowActivity['subject_name']);
								   	$urlName = preg_replace('/\s+/', '-', $urlName);
									
								   	echo'<li>
			                        		<h4><i class="fa fa-bell-o coral"></i> <a href="subject.php?code='.urlencode($rowActivity['subject_code']).'&name='.urlencode($urlName).'">'.$filename.' | '.$rowActivity['subject_name'].'</a></h4>
			                    		</li>';
								}
							}
							?>
		                        <button type="button" class="btn btn-labeled btn-success" onclick="window.location.href='./recent-uploads.php'">
		                            <span class="btn-label"><i class="fa fa-bell-o"></i></span>View recent activity</button>
		                    </li>
		                </ul>
		            </div>
		            <div class="user-menu-content">
		                <h3>
		                    My lil message board yo!
		                </h3>
		                <!--<ul class="user-menu-list">
		                    <li> <h4>EMPTY <small class="coral"><strong> coming soon</strong> <i class="fa fa-clock-o"></i></small></h4></li>
		                </ul>-->

		                <div class="row container">
		                	<div class="col-md-12">
		                		<div class="chatbox" style="background: #EEEEEE">
									<div class="chatlogs">
										<h5>Ayeeeooo Wasssup?</h5>
										<!-- <div class="chat friend">
											<div class="user-photo"><img src="./img/profile/admin-support.png"></div>
											<p class="chat-message">What's up, Brother ..!!</p>	
										</div>										
										<div class="chat self">
											<div class="user-photo"><img src="<?=$_SESSION['userData']['picture']?>"></div>
											<p class="chat-message">What's up ..!!</p>	
										</div>
										<div class="chat friend">
											<div class="user-photo"><img src="./img/profile/admin-support.png"></div>
											<p class="chat-message">What's up, Brother ..!!</p>	
										</div>										
										<div class="chat self">
											<div class="user-photo"><img src="<?=$_SESSION['userData']['picture']?>"></div>
											<p class="chat-message">What's up ..!!</p>	
										</div>
										<div class="chat friend">
											<div class="user-photo"><img src="./img/profile/admin-support.png"></div>
											<p class="chat-message">What's up, Brother ..!!</p>	
										</div>										
										<div class="chat self">
											<div class="user-photo"><img src="<?=$_SESSION['userData']['picture']?>"></div>
											<p class="chat-message">What's up ..!!</p>	
										</div> --> 							
									</div> 
									<div class="chat-form">
										<!--<form action="" method="POST">
										<textarea placeholder="type here..." class="form-control" name="post" rows='3'></textarea>
										<button style="margin-top: 5px;">Send</button>
										</form> -->
									</div>
								</div>
		                	</div>		                	
		                </div>






		            </div>
		            <div class="user-menu-content">
		                <h2 class="text-center">
		                    START SHARING <small>(comming soon)</small>
		                </h2>
		                <center><i class="fa fa-cloud-upload fa-4x"></i></center>
		                <div class="share-links">
		                    <?php /* <center><button disabled="" type="button" class="btn btn-lg btn-labeled btn-success" href="#" style="margin-bottom: 15px;">
		                            <span class="btn-label"><i class="fa fa-bell-o"></i></span> Upload PDF
		                    </button></center>
		                    <center><button disabled="" type="button" class="btn btn-lg btn-labeled btn-warning" href="#">
		                            <span class="btn-label"><i class="fa fa-bell-o"></i></span>Upload Projects
		                    </button></center> */ ?>
		                </div>
		            </div>
		        </div>
		    </div>
		    </section>
			</div>
		    <section id="contact" style="background-color: #E9EBEE">
            	<div class="container">
            		<div class="well well-sm">
                		<h3><strong>Contact Us</strong></h3>
                	</div>              
              		<div class="row">
                		<div class="col-md-7">
                    		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3684.4978321134113!2d88.4893499766134!3d22.560476542486537!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a020b267a3cdc13%3A0xb3b21d652126f40!2sUniversity+of+Engineering+%26+Management%2C+New+Town!5e0!3m2!1sen!2sin!4v1552681750529" width="100%" height="315" frameborder="0" style="border:0" allowfullscreen></iframe>
                		</div>

                  		<div class="col-md-5">
                      		<h4><strong>Also Check-out our YouTube Channel</strong></h4>
                      		<iframe width="100%" height="250" src="https://www.youtube.com/embed/mSZzIqVS3Ek" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                  		</div>
                	</div>
            	</div>
            </section>
		</div> <!--Container Div End-->
		<a style="opacity: 0;" target="_blank" href="https://www.alexa.com/siteinfo/shattak.com"><script type='text/javascript' src='http://xslt.alexa.com/site_stats/js/s/a?url=https://www.alexa.com/siteinfo/shattak.com'></script></a>     
    </main>

	<!--/.Footer-->
<?php include('includes/footer.php') ?>
    <!--/.Footer-->
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<?php include('js/profile.php') ?>
<?php include('includes/scripts.php') ?>
</body>
</html>