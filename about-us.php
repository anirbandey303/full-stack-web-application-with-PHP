<?php
session_start(); 
include'includes/header.php';?>
<link href="css/about-us.min.css" rel="stylesheet">
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
<div class="container-fluid" style="background-color: #EEEEEE;">
	<div class="row">
		<div class="col-md-12">
	<!-- About -->
    <section id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">About</h2>
            <h3 class="section-subheading text-muted">In this Area you will Find Everything About Us.</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <ul class="timeline">
              <li>
                <div class="timeline-image">
                  <img class="rounded-circle img-fluid" src="img/about/1.jpg" alt="">
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4>September 2017</h4>
                    <h4 class="subheading">Our Humble Beginnings</h4>
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted">Shattak took it's first step into Development under Anirban and Rupam</p>
                  </div>
                </div>
              </li>
              <li class="timeline-inverted">
                <div class="timeline-image">
                  <img class="rounded-circle img-fluid" src="img/about/2.jpg" alt="">
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4>November 2017</h4>
                    <h4 class="subheading">Shattak Rolled-Out To Public</h4>
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted">As the development came to a stable state, Shattak went Live for Public use</p>
                  </div>
                </div>
              </li>
              <li>
                <div class="timeline-image">
                  <img class="rounded-circle img-fluid" src="img/about/3.jpg" alt="">
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4>January 2018</h4>
                    <h4 class="subheading">Phase-Two: The Expansion</h4>
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted">Shattak was upgraded to become better, faster and beautiful and Launched its new service called HangTank!</p>
                  </div>
                </div>
              </li>
              <li class="timeline-inverted">
                <div class="timeline-image">
                  <img class="rounded-circle img-fluid" src="img/about/4.jpg" alt="">
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4>February 2018</h4>
                    <h4 class="subheading">The immense Positive Feedback</h4>
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted">For the first time we got huge feedback as people began to apprciate our work and also benifitted from it.</p>
                  </div>
                </div>
              </li>
              <li class="timeline-inverted">
                <div class="timeline-image">
                  <h4>Be Part
                    <br>Of Our
                    <br>Story!</h4>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <!-- Team -->
    <section class="bg-light" id="team">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Our Amazing Team</h2>
            <h3 class="section-subheading text-muted">The guys behind all the effort we put in.</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-4">
            <div class="team-member">
              <img class="mx-auto rounded-circle" src="img/about/rupam.jpg" alt="Rupam">
              <h4>Rupam Bumba</h4>
              <p class="text-muted">Co-Founder, CEO</p>
              <ul class="list-inline social-buttons">
                <li class="list-inline-item">
                  <a href="https://twitter.com/BumbaRupam">
                    <i class="fa fa-twitter"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a href="https://www.facebook.com/profile.php?id=100004703073871">
                    <i class="fa fa-facebook"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a href="https://www.instagram.com/rupambumba/">
                    <i class="fa fa-instagram"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="team-member">
              <img class="mx-auto rounded-circle" src="img/about/anirban.jpg" alt="Anirban">
              <h4>Anirban Dey</h4>
              <p class="text-muted">Co-Founder, CTO</p>
              <ul class="list-inline social-buttons">
                <li class="list-inline-item">
                  <a href="https://twitter.com/_anirbandey_">
                    <i class="fa fa-twitter"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a href="https://www.facebook.com/anirbandey303/">
                    <i class="fa fa-facebook"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a href="https://www.instagram.com/weirdani/">
                    <i class="fa fa-instagram"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="team-member">
              <img class="mx-auto rounded-circle" src="img/about/orunayan.jpg" alt="">
              <h4>Orunayan Bhattacharya</h4>
              <p class="text-muted">UEMK Resource Manager</p>
              <ul class="list-inline social-buttons">
                <li class="list-inline-item">
                  <a href="#">
                    <i class="fa fa-twitter"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a href="https://www.facebook.com/orunayan.bhattacharya">
                    <i class="fa fa-facebook"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a href="#">
                    <i class="fa fa-linkedin"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <p class="large text-muted">...just to name a few! Our unity and your trust helps us keep going to become the largest community in the World.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Contact --> <!--
    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">E-Mail Us</h2>
            <h3 class="section-subheading text-muted">Fill in the Required fields to reach out to us</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <form id="contactForm" name="sentMessage" novalidate>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input class="form-control" id="name" type="text" placeholder="Your Name *" required data-validation-required-message="Please enter your name.">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="email" type="email" placeholder="Your Email *" required data-validation-required-message="Please enter your email address.">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="phone" type="tel" placeholder="Your Phone *" required data-validation-required-message="Please enter your phone number.">
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <textarea class="form-control" id="message" placeholder="Your Message *" required data-validation-required-message="Please enter a message."></textarea>
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-12 text-center">
                  <div id="success"></div>
                  <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit">Send Message</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section> -->

    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            
          </div>
          <div class="col-md-4">
            <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a href="https://www.twitter.com/_anirbandey_/">
                  <i class="fa fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="https://www.facebook.com/shattakpage/">
                  <i class="fa fa-facebook"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="https://www.linkedin.com/in/anirbandey303/">
                  <i class="fa fa-linkedin"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
		</div>
	</div>
</div>
<?php
include'includes/scripts.php';
?>