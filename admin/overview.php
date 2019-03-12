<?php session_start();
	include "./return_admins.php";
    include('includes/header.php');
    include('includes/navbar.php');
      if(!(isset($_GET['page'])))
	  {
	    $page1 = 0;
	  }
	  else
	  {
	    $page = $_GET['page'];
	    $page1 = ($page*5)-5;
	  }
?>
<div class="container-fluid" id="main">
    <?php include('includes/side_navbar.php'); ?>
    <div class="row" style="margin-top: 100px; padding: 20px;">
    	<div class="col-md-12">
    		<a href="./index.php" class="btn btn-lg btn-secondary pull-left" style="margin-top: 30px;"><i class="fa fa-arrow-left" aria-hidden="true fa-3x"></i> Back</a><br><br>
	        <h3 class="text-center">All Chapter Names along with Subject Code Grouped Together</h3>
	        <?php
                if(isset($_GET['msg']))
                {
                    echo'<div class="alert alert-danger text-center">
                        <i class="fa fa-bell" aria-hidden="true"></i>
                        <p> '.urldecode($_GET["msg"]).' </p> 
                        </div>';
                }
                ?>
	          <table class="table table-striped">
	            <thead>
	              <tr>
	                <th>Subject</th>
	                <th>Department</th>
	                <th>Filename</th>
	                <th>Note ID</th>
	                <th>Submitted By</th>
	                <th>Action</th>
	              </tr>
	            </thead>
	            <tbody>
	              <?php 
	              //include"includes/db_connect.php";
	              $query="SELECT `time`,`subject_name`,`filename`,`note_id`,t.`department`,`uploaded_by` FROM `notes` n LEFT OUTER JOIN `subject` t ON t.`subject_code`=n.`subject_code` UNION SELECT `time`,`subject_name`,`filename`,`note_id`,t.`department`,`uploaded_by` FROM `notes` n RIGHT OUTER JOIN `subject` t ON t.`subject_code`=n.`subject_code` ORDER BY `time` DESC LIMIT ".$page1.",5";
	              $results=mysqli_query($connection, $query);
	              if(mysqli_num_rows($results)==0)
	              {
	                echo "Sorry! No records found";
	              }
	              else
	              {
	              while($row=mysqli_fetch_assoc($results))
	              {
	              echo'                  
	                  <tr>
	                    <td>'.$row["subject_name"].'</td>
	                    <td>'.$row["department"].'</td>
	                    <td>'.$row["filename"].'</td>
	                    <td>'.$row["note_id"].'</td>
	                    <td>'.$row["uploaded_by"].'</td>
	                    <td> <a href="delete_confirmation?note_id='.$row['note_id'].'"><i class="fa fa-trash" style="font-size:25px;color:red"></i></a> </td>
	                  </tr>';
	              }
	              }
	              ?>
	            </tbody>
	          </table>
	          <div style=" text-align: center;">
		        <?php
		        $query1="SELECT `subject_name`,`filename`,`note_id`,t.`department`,`uploaded_by`, `time` FROM `notes` n LEFT OUTER JOIN `subject` t ON t.`subject_code`=n.`subject_code` UNION SELECT `subject_name`,`filename`,`note_id`,t.`department`,`uploaded_by`,`time` FROM `notes` n RIGHT OUTER JOIN `subject` t ON t.`subject_code`=n.`subject_code` GROUP BY `time`,`subject_name`,`filename`,`note_id`,t.`department`,`uploaded_by`";
		        $results1=mysqli_query($connection, $query1);
		        $count = mysqli_num_rows($results1);
		        $a = ceil($count/5);
		        for ($b=1; $b<= $a ; $b++)
		        { 
		          ?> <a class="btn btn-xm btn-info" href="overview?page=<?php echo $b ?>" style="font-size: 20px; padding: 10px;"> <?php echo $b." " ?> </a> <?php
		        }


		        ?>
		      </div>
    	</div>
    </div>
</div>
<?php include'./includes/scripts.php' ?>
  </body>
</html>