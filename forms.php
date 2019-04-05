<?php
session_start(); 
include('includes/header.php') ?>
<link href="css/contact-us.css" rel="stylesheet">
<?php
include('./return_users_index.php');
if (isset($_SESSION['access_token']))
{
  include('includes/navbar.php');
  include('functions/update_login_record.php');
}
?>

<?php

//sanitize the data
//include './includes/db_connect.php';
if(isset($_POST['name']) && isset($_POST['link']))
{
	function test_input($data)
	{
	    $data = trim($data);
	    $data = stripslashes($data);
	    $data = htmlspecialchars($data);
	    return $data;
	}

	$name = strip_tags(htmlspecialchars($_POST['name']));
	$link = strip_tags(htmlspecialchars($_POST['link']));
	$name = test_input($name);
	$link = test_input($link);


	//insert data
	
	$insertQuery = "INSERT INTO `frnd_req_form` (`id`, `name`, `link`, `added`, `time`) VALUES (NULL, '$name', '$link', '0', NOW());";
	$insertResult = mysqli_query($connection, $insertQuery);
	
}
$searchQuery = "SELECT * FROM `frnd_req_form` ORDER BY `id`";
$searchResult = mysqli_query($connection, $searchQuery);

//mysqli_close($connection);
?>
<main>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 col-sm-12 text-center">
				<h2> Recruitment Group Add Request</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3"> <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                            <!-- quord_after_notes  ADs-->
                            <ins class="adsbygoogle"
                                 style="display:inline-block;width:336px;height:280px"
                                 data-ad-client="ca-pub-4405752513006993"
                                 data-ad-slot="7065181934"></ins>
                            <script>
                            (adsbygoogle = window.adsbygoogle || []).push({});
                            </script> </div>
			<div class="col-md-6 text-center table-responsive">
				<table class="table table-hover table-striped" style="word-wrap: break-word;">
		        	<thead>
		            	<tr>
		              		<th>ID</th>
		              		<th>Name</th>
		              		<th style="text-align: right;">
		              			<a href=""> Profile Link </a>
		              		</th>        
		            	</tr>
		          	</thead>
		          	<tbody>
		          		<?php
		          		while($row=mysqli_fetch_assoc($searchResult))
		          		{
		          			$link = $row['link'];
		          			echo"
			         		<tr>		         			
			         			<td> ".$row['id']." </td>
			              		<td> ".$row['name']." </td>
			              		<td style='text-align: right;'>
			              			<a href='$link' target='_blank'>".$row['link']." </a>
			              		</td>
			            	</tr>";
			            }
		            	?>
		          	</tbody>
		        </table>
		        <br /> <br /> <br /> <br />
			</div>
			<div class="col-md-3"> 
				<h4 class="text-center"> Fill-up the Form Please!</h4>
				<form id="contact-form" action="./forms" method="POST">					
                        <input type="name" class="form-control" name="name" placeholder="Legit Name (No Angel Priya)" required="">
                    	<br />					
                        <textarea class="form-control" rows="2" name="link" placeholder="Paste your FB Link Here" required=""></textarea><br />                               
                        <button id="submit" type="submit" class="form-control btn btn-danger" name="submit"> Send Message</button> <br /> <br />                        
				</form> <br /> <br />
			</div>
		</div>		
	</div>
</main>
<?php include('includes/footer.php') ?>   
    <!--/.Footer-->
<?php include('includes/scripts.php') ?>
</body>
</html>