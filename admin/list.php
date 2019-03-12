<?php
session_start();
include "./return_admins.php";
include'includes/header.php';
include'includes/navbar.php';
include'includes/side_navbar.php';
//include'includes/db_connect.php';

?>
<div class="container" style="padding: 30px;">
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-lg-8" style="margin-top: 100px;">
	                <!-- Nav tabs -->
	                <ul class="nav nav-tabs" role="tablist">
	                    <li class="nav-item">
	                        <a class="nav-link active" href="#Subscribers" role="tab" data-toggle="tab">Subscribers</a>
	                    </li>
	                    <li class="nav-item">
	                        <a class="nav-link" href="#Users" role="tab" data-toggle="tab">Users</a>
	                    </li>
	                    <li class="nav-item">
	                	    <a class="nav-link" href="#Admins" role="tab" data-toggle="tab">Admins</a>
	                    </li>
	                    <li class="nav-item">
	                        <a class="nav-link" href="#settings1" role="tab" data-toggle="tab">Settings</a>
	                    </li>
	                </ul>

	                    <!-- Tab panes -->
	                    <div class="tab-content">
	                        <br>
	                        <!-- Subscribers LIST-->
	                        <div role="tabpanel" class="tab-pane active" id="Subscribers">
	                            <h4>Subscribers List</h4>
	                            <p>
	                                1. Do you see new subscribers?
	                                <br>
	                                <br>	                
	                            </p>
	                            <table class="table table-striped">
					              <thead>
					                <tr>
					                  <th>ID</th>
					                  <th>Name</th>
					                  <th>Email</th>
					                </tr>
					              </thead>
					              <tbody>
					              <?php					                
					                $query="SELECT `subscriber_id`, `name`, `email`, `date&time` FROM `subscribers` ORDER BY `date&time` DESC";
					                $results=mysqli_query($connection, $query);
					                if(mysqli_num_rows($results)==0)
					                {
					                  echo "Sorry! You have no subscribers. Time to advertise!";
					                }
					                else
					                {
						                while($row=mysqli_fetch_assoc($results))
						                {
						                echo'                  
						                    <tr>
						                      <td>'.$row["subscriber_id"].'</td>
						                      <td>'.$row["name"].'</td>
						                      <td>'.$row["email"].'</td>
						                    </tr>';
						                }
					                }
					                ?>
					                  </tbody>
					                </table>
	                        </div>
	                        <!-- User LIST-->
	                        <div role="tabpanel" class="tab-pane" id="Users">
	                            <h4>Users</h4>
	                            <p>
	                                2. People who witness our show!!
	                            </p>
	                            <div class="table-responsive">
						            <table class="table table-striped">
						              <thead>
						                <tr>
						                  <th>First Name</th>
						                  <th>Last Name</th>
						                  
						                  <th>Joined</th>
						                </tr>
						              </thead>
						              <tbody>
						                <?php
						                $query="SELECT `first_name`, `last_name`, `joined` FROM `myusers` ORDER BY `joined` DESC";
						                $results=mysqli_query($connection, $query);
						                if(mysqli_num_rows($results)==0)
						                {
						                  echo "Sorry! You have no Admins. Time to Expand.";
						                }
						                else
						                {
						                while($row=mysqli_fetch_assoc($results))
						                {
						                echo'                  
						                    <tr>
						                      <td>'.$row["first_name"].'</td>
						                      <td>'.$row["last_name"].'</td>
						                      
						                      <td>'.$row["joined"].'</td>
						                    </tr>';
						                }
						                }
						                ?>
						              </tbody>
						            </table>
						          </div>
	                        </div>
	                        <!-- Admin LIST-->
	                        <div role="tabpanel" class="tab-pane" id="Admins">
	                            <h4>Administrators</h4>
	                            <p>
	                                3. These are the people that run the world.
	                            </p>
	                            <div class="table-responsive">
						            <table class="table table-striped">
						              <thead>
						                <tr>
						                  <th>ID</th>
						                  <th>Email</th>
						                  <th>Last Active</th>
						                </tr>
						              </thead>
						              <tbody>
						                <?php						                
						                $query="SELECT `id`, `email`, `last_active` FROM `registration` ORDER BY `last_active` DESC ";
						                $results=mysqli_query($connection, $query);
						                if(mysqli_num_rows($results)==0)
						                {
						                  echo "Sorry! You have no Admins. Time to Expand.";
						                }
						                else
						                {
						                while($row=mysqli_fetch_assoc($results))
						                {
						                echo'                  
						                    <tr>
						                      <td>'.$row["id"].'</td>
						                      <td>'.$row["email"].'</td>
						                      <td>'.$row["last_active"].'</td>
						                    </tr>';
						                }
						                }
						                ?>
						              </tbody>
						            </table>
						          </div>
	                        </div>
	                        <div role="tabpanel" class="tab-pane" id="settings1">
	                            <h4>Settings</h4>
	                            <p>
	                                4. What are you planning to set?
	                            </p>
	                        </div>
	                    </div>
	                </div>			
			</div>		
		</div>
	</div>
</div>

<?php include'includes/scripts.php' ?>