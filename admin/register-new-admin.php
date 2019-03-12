<?php session_start();
    include "./return_admins.php";
    include('includes/header.php');
    include('includes/navbar.php');
?>
<div class="container-fluid" id="main">
    <?php include('includes/side_navbar.php'); ?>
    <div class="row" style="margin-top: 100px; padding: 20px;">
              <div class="col-md-12">
                    <h1>Add a New member</h1>
                    <form class="form-control" method="POST" action="register_admin">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" placeholder="Email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="password" required>
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" class="form-control" placeholder="Confirm Password" name="confirm" required>
                        </div>
                        <?php
                            if(isset($_GET['msg']))
                            {
                                echo'<div class="alert alert-danger text-center" id="msg">
                                    <i class="fa fa-bell" aria-hidden="true"></i>
                                    <p> '.urldecode($_GET["msg"]).' </p> 
                                    </div>';
                            }
                        ?>
                        <input type="submit" class="btn btn-lg btn-success" name="submit" value="Register Admin">
                      </form>
                </div>
    </div>
    <!--scripts loaded here-->    
<?php include'./includes/scripts.php' ?>
  </body>
</html>