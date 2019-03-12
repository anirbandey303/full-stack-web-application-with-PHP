<?php
session_start();
//aad header
include('includes/header.php'); ?>
<link href="css/contact-us.css" rel="stylesheet">
<?php
if (isset($_SESSION['access_token']))
{
	include('includes/navbar.php');
}
else
{
	//load not loggedin navbar
	include('includes/not_login_navbar.php');
}
?>
<main>
	<div class="container-fluid">
		<div class="row">

               <div class="col-md-12 col-sm-12">
                    <!-- SECTION TITLE -->
                    <div class="wow fadeInUp section-title" data-wow-delay="0.2s">
                         <h2>Get in touch</h2>
                         <p>Anything you need, just Ask!</p>
                    </div>
               </div>

               <div class="col-md-7 col-sm-10">
                    <!-- CONTACT FORM HERE -->
                    <div class="wow fadeInUp" data-wow-delay="0.4s">
                        <form id="contact-form" action="./mail/contact_me.php?via=support" method="POST">
                              <div class="col-md-6 col-sm-6">
                                   <input type="email" class="form-control" name="email" placeholder="Email*" required="">
                              </div><br />
                              <div class="col-md-12 col-sm-12">
                                   <textarea class="form-control" rows="5" name="message" placeholder="Message*" required=""></textarea><br />
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
                              <div class="col-md-offset-8 col-md-4 col-sm-offset-6 col-sm-6">
                                   <button id="submit" type="submit" class="form-control btn btn-danger" name="submit">Send Message</button> <br />
                              </div>
                        </form>
                    </div>
               </div>

               <div class="col-md-5 col-sm-8">
                    <!-- CONTACT INFO -->
                    <div class="wow fadeInUp contact-info" data-wow-delay="0.4s">
                         <div class="section-title">
                              <h2>Contact Info</h2>
                              <p>We would love to hear from you. Give us a call or send us an email and we will get back to you as soon as possible!</p>
                         </div>
                         
                         <p><i class="fa fa-map-marker"></i> University of Engineering & Management, <br> Rajarhat <br> Kolkata, West Bengal</p>
                         <p><i class="fa fa-comment"></i> <a href="mailto:info@company.com">anirbandey303@gmail.com</a></p>
                         <p><i class="fa fa-phone"></i> +91-7890998781</p>
                    </div>
               </div>

          </div>
	</div>
</main>






<?php
include('includes/footer.php');
include('includes/scripts.php');
?>