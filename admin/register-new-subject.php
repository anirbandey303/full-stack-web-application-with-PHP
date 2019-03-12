<?php session_start();
	include "./return_admins.php";
    include('includes/header.php');
    include('includes/navbar.php');
?>
<div class="container-fluid" id="main">
    <?php include('includes/side_navbar.php'); ?>
    <div class="row" style="margin-top: 100px; padding: 20px;">
              <div class="col-md-12">
                    <h1>Add a new subject!</h1>
                    <form class="form form-control bg-light" method="POST" action="register_subject" enctype="multipart/form-data">
			            <div class="form-group"> <label><b>Subject Code</b></label>
			              <input type="text" class="form-control" placeholder="Subject Code" name="subject_code" required>
			            </div>
			            <div class="form-group"> <label><b>Subject Name</b></label>
			                <input type="text" class="form-control" placeholder="Subject Name" name="subject_name" required> 
			            </div>
			            <div class="form-group">
			                <label> <b>Subject Description</b> </label>
			                <textarea placeholder="Subject Description" class="form-control" name="subject_description" rows='3'></textarea><br>
			            </div>
			            <div class="form-group">
			                <b>DEPARTMENT</b><br>
			                  <label class="radio-inline bg-success p-2 m-3"><input type="radio" name="department" value="FIRST-YEAR" required>First Year</label>
			                  <label class="radio-inline bg-success p-2 m-3"><input type="radio" name="department" value="CSE" required>CSE</label>
			                  <label class="radio-inline bg-success p-2 m-3"><input type="radio" name="department" value="ECE" required>ECE</label>
			                  <label class="radio-inline bg-success p-2 m-3"><input type="radio" name="department" value="EE" required>EE</label>
			                  <label class="radio-inline bg-success p-2 m-3"><input type="radio" name="department" value="EEE" required>EEE</label>
			                  <label class="radio-inline bg-success p-2 m-3"><input type="radio" name="department" value="ME" required>ME</label>
			                  <label class="radio-inline bg-success p-2 m-3"><input type="radio" name="department" value="CE" required>CE</label>
			                  <label class="radio-inline bg-success p-2 m-3"><input type="radio" name="department" value="BTE" required>BTE</label><br>
			            </div>
			            <div class="form-group"> <label><b>Subject Keywords</b></label>
			                <input type="text" class="form-control" placeholder="keywords" name="keywords" required> 
			            </div>
			            <div class="form-group">
			                  <label><b>Insert Subject Image</b></label>
			                  <input type="file" class="btn btn-lg" name="subject_image" required><br>
			            </div>
			            <?php
                            if(isset($_GET['err']))
                            {
                                echo'<div class="alert alert-danger text-center" id="err">
                                    <i class="fa fa-bell" aria-hidden="true"></i>
                                    <p> '.urldecode($_GET["err"]).' </p> 
                                    </div>';
                            }
                        ?>
			              <input type="submit" class="btn btn-lg btn-info" name="submit_subject" value="SUMBIT">
			          </form>
                </div>
    </div>
    <!--scripts loaded here-->    
<?php include'./includes/scripts.php' ?>
  </body>
</html>