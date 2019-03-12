<?php
	include "./return_admins.php";
	include'./includes/header.php';
	include'./includes/navbar.php';
	$department = $_POST['department'];
	//include"includes/db_connect.php";
	$subjects = "SELECT `subject_code`, `subject_name` FROM `subject` WHERE `department` LIKE '$department' ORDER BY `subject_name`";
	$all_subjects=mysqli_query($connection, $subjects);
?>
<div class="container-fluid" id="main">
	<a href="./index.php" class="btn btn-lg btn-danger" style="margin-top: 100px;"><i class="fa fa-chevron-circle-left fa-1x"></i> Back</a> <br /><br />
	<div class="row">
		<div class="col-md-12">
		  <form class="md-form" action="./upload_file?department=CSE" method="POST" enctype="multipart/form-data">
			<table class="table table-hover table-striped" style="word-wrap: break-word;">
      			<thead class="bg-dark text-white">
      				<tr>
	                    <th>Subject Code</th>
	                    <th>Subject Name</th>              
	                </tr>
                </thead>
               	<tbody>
               		<?php while($thisSubject=mysqli_fetch_assoc($all_subjects))
					{
					echo"
                	<tr>                		
                    	<td>
                    		<label class='radio-inline'> <input type='radio' name='subject_code' value=".$thisSubject['subject_code']." required>".$thisSubject['subject_code']."
                    		</label>
                    	</td>
                		<td>".$thisSubject['subject_name']."</td>                			
                	</tr>";
                	}
                	?>
               	</tbody>
            </table>
            <div style="background-color: #DDDDDD; padding: 20px;">
            	<label><h3><b>Chapter Name</b></h3></label><br>
				<input type="text" class="btn btn-lg" name="filename" placeholder="Enter Chapter Name" required autocomplete="off"><br /><br />
			</div>
			<div class="file-field big">
		        <a class="btn-floating btn-lg pink lighten-1 mt-0 float-left">
		        <i class="fa fa-upload fa-2x" aria-hidden="true"></i></a>
		        <input type="file" class="btn btn-lg" name="file_upload" required>
		    </div><br />
		    <input type="submit" class="btn btn-lg btn-info" name="submit" value="UPLOAD" required>
		  </form>
		</div>
	</div>	
</div>
<?php include'./includes/scripts.php'; ?>