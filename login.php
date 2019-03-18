<?php
  require_once "config.php";
  require_once "g-config.php";
  if(isset($_SESSION['access_token']) || isset($_COOKIE['access_token']))
  {
    //header('Location: index.php');
    header('Location: index.php');
    exit();
  }
  /*Facebook*/
  $redirectURL = "http://localhost/quordenet/fb-callback";
  $permissions = ['email'];
  $loginURL = $helper->getLoginUrl($redirectURL, $permissions);

  /*Google*/
  $gLoginURL = $gClient->createAuthUrl();

  /*Guest*/
  $guestLoginURL = "./guest-callback.php";

?>
<?php include('includes/header.php') ?>
<?php include('includes/not_login_navbar.php') ?>
<?php include('includes/db_connect.php') ?>
<?php include('functions/fb_login_button.php') ?>
    <!--Main layout-->
    <main>        
      <div class="container-fluid">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-8">
              <section>
                <div class="my-auto">
                  <h1 class="mb-0">Welcome To
                    <br /> 
                    <span class="text-primary">Shattak's</span><br>
                    <span class="text-primary">Quordenet</span>
                  </h1>
                  <div class="subheading mb-5">
                    Please LogIn to get access to all the Notes and Much More! | 
                    <a href="mailto:admin@shattak.com">admin@shatak.com</a>
                  </div>
                </div>                        
              </section>
            </div>
            <div class="col-md-4" style="margin-bottom: 30px; text-align: center;">
              <div class="row">
                <section>
                  <button class="loginBtn loginBtn--facebook" onclick="window.location = '<?= $loginURL ?>';">
                    Login with Facebook
                  </button>
                   <button class="loginBtn loginBtn--google" onclick="window.location = '<?= $gLoginURL ?>';">
                    Login with Google
                  </button> 
                  <button class="loginBtn loginBtn--guest" onclick="window.location = '<?= $guestLoginURL ?>';">
                    Continue as Guest
                  </button>
                </section>
              </div>
            </div>
          </div>          
        </div>
      </div>        
    </main>

    <footer>
    
    </footer>
<?php include('includes/footer.php') ?>   
    <!--/.Footer-->
<?php include('includes/scripts.php') ?>
</body>
</html>