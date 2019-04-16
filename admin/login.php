<?php
session_start();
if(isset($_SESSION['admin_token']) || isset($_COOKIE['count']))
  {
    header('Location: ./index.php');
    exit();
  }
	include('includes/header.php');
?>
<link rel="stylesheet" type="text/css" href="css/login.css">
<?php
	include('includes/no_login_navbar.php');
?>
<div class="container"><br /><br /><br />
        <div class="card card-container">
             <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" />
            <!--<img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />-->
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin" method="POST" action="validate_login" enctype="multipart/form-data">
                <span id="reauth-email" class="reauth-email"></span>
                <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus autocomplete="off">
                <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required autocomplete="off">
                <div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <?php
                if(isset($_GET['err']))
                {
                    echo'<div class="alert alert-danger text-center">
                        <i class="fa fa-bell" aria-hidden="true"></i>
                        <p> '.urldecode($_GET["err"]).' </p> 
                        </div>';
                }
                ?>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
            </form><!-- /form -->
            <a href="#" class="forgot-password">
                Forgot the password?
            </a>
        </div><!-- /card-container -->
    </div><!-- /container -->

<?php include'./includes/scripts.php' ?>