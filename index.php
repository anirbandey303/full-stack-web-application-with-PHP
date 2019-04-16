<?php
session_start();
  if(!(isset($_GET['dept'])))
  {
    $_GET['dept'] = 'CSE';
  }
  function test_input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>
<?php include('includes/header.php'); ?>
<?php include('includes/db_connect.php'); ?>
<?php 
include('./return_users_index.php');
if (isset($_SESSION['access_token']))
{
  include('includes/navbar.php');
  include('functions/update_login_record.php');
}
?>
    <!--Main layout-->
    <main>        
        <div class="container-fluid">
            <div class="col-md-12">
                <section>
                    <div class="my-auto">
                        <h1 class="mb-0">UEM,<br>Kolkata
                        <br />
                        <?php 
                          $query1="SELECT `dept_code`, `dept_name` FROM `departments` WHERE `dept_code` LIKE '".$_GET['dept']."'";
                          $result1=mysqli_query($connection,$query1);
                          $row1=mysqli_fetch_assoc($result1);
                          if(empty($row1))
                          {
                            echo "<span class='text-primary'>Sorry! This Department does not exist.</span>";
                          }
                          else
                          {
                            echo "<span class='text-primary'>".$row1['dept_name']."</span>";
                          }
                        ?>
                        </h1>
                        <div class="subheading mb-5">
                            1st Year · 2nd Year · 3rd Year · 4th Year · Class Notes, Lab Assignments, and More | 
                            <a href="mailto:admin@shattak.com">admin@shatak.com</a>
                        </div>
                        <p class="mb-5">
                            Shattak.com is a project done by <b><a href="https://www.instagram.com/weirdani/"> Anirban Dey </a></b>, <b><a href="https://www.facebook.com/orunayan.bhattacharya"> Orunayan Bhattacharya</a> </b> and <b><a href="https://www.linkedin.com/in/rupam-bumba-0ba77378"> Rupam Sarkar </a></b> from <b>Computer Science and Engineering Department </b> of  <b>University of Engineering and Management, Kolkata.</b> It features all Assignments and Class Notes directly from your University professors. Shattak uses Facebook Login API for users to login and save their subjects of choice and much more! <b>Currently Shattak serves 300+ users on a daily basis. </b>
                        </p>
                    </div>

                    <ul class="list-inline list-social-icons mb-0">
                        <li class="list-inline-item">
                          <a href="https://www.facebook.com/shattakpage/">
                            <span class="fa-stack fa-lg">
                              <i class="fa fa-circle fa-stack-2x"></i>
                              <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                            </span>
                          </a>
                        </li>
                        <li class="list-inline-item">
                          <a href="https://www.instagram.com/weirdani/">
                            <span class="fa-stack fa-lg">
                              <i class="fa fa-circle fa-stack-2x"></i>
                              <i class="fa fa-instagram fa-stack-1x fa-inverse"></i>
                            </span>
                          </a>
                        </li>
                        <li class="list-inline-item">
                          <a href="https://www.linkedin.com/in/anirbandey303/">
                            <span class="fa-stack fa-lg">
                              <i class="fa fa-circle fa-stack-2x"></i>
                              <i class="fa fa-linkedin fa-stack-1x fa-inverse"></i>
                            </span>
                          </a>
                        </li>
                        <li class="list-inline-item">
                          <a href="https://github.com/anirbandey303">
                            <span class="fa-stack fa-lg">
                              <i class="fa fa-circle fa-stack-2x"></i>
                              <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                            </span>
                          </a>
                        </li>
                    </ul>
                </section>
            </div>
            <div class="mobileShow"> 
              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-12"><br />
                    <p class="text-center">ADVERTISEMENT</p>
                    <img src="./img/ads/slylad.jpeg" alt="Slylad Ads" height="auto" width="100%"><br />
                    <p class="text-center">A new game from Slylad Interactive is coming soon!</p>
                  </div>
                </div>                
              </div>
            </div>
            <?php
            if(isset($_SESSION['access_token']))
            {
              include"./functions/favourites.php";
            }
            ?>
            <div class="col-md-12" style="padding-top: 50px;">
              <h1>Subjects</h1>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <form class="search-form" role="search" action="./index" method="POST">
                      <div class="form-group md-form mt-0 pt-1 waves-light">
                        <input type="text" name="search" class="form-control" placeholder="Search Subject (*requires LogIn)" required onkeyup="searchq();" autocomplete="off">
                      </div>
                    </form>
                    <div id="data" style="display:inline-block; word-wrap: break-word;"></div>
                  </div>
                </div>
              </div>
              
              <div class="row">
              <!-- Fetching and Displaying all subjects -->
              <?php                  
              $query="SELECT `subject_name`,`subject_code` FROM `subject` WHERE `department` LIKE '".$_GET['dept']."' ORDER BY `subject_name`";
              $result=mysqli_query($connection,$query);
              if(mysqli_num_rows($result)==0)
              {
                echo '<div class="alert alert-danger text-center container">
                        <i class="fa fa-bell" aria-hidden="true"></i>
                        <p> Sorry! We could not find any subject for this. </p> 
                      </div>';
              }
              else
              {
                while($row=mysqli_fetch_assoc($result))
                {
                  $subject_name=$row['subject_name'];
                  $urlName = strtolower($subject_name);
                  $urlName = preg_replace('/\s+/', '-', $urlName);
                  $subject_code=$row['subject_code'];
                  /*$description = implode(' ', array_slice(explode(' ', $description), 0, 15)); 
                  $description .= '...';
                  $location=$row['location'];
                  if(empty($location))
                  {
                    $location="./images/cat-book.jpg";
                  }*/
                  echo'                    
                      <div class="col-md-3" style="letter-spacing: 2px; padding: 20px;">
                        <div class="card h-100">
                          <div class="card-body">
                            <h4 class="card-title">
                              <a href="subject.php?code='.urlencode($subject_code).'&name='.urlencode($urlName).'">'.$subject_name.'
                            </h4>
                            <h5>'.$subject_code.'</h5></a>
                          </div>
                          <div class="card-footer">
                          <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                          </div>
                        </div>
                      </div>';
                }
              }
              ?>
              </div>
            </div>
             <!--Subjects Div end-->
            <!--contact us form-->
            <section id="contact" style="background-color: #E9EBEE">
              <div class="container">
                <div class="well well-sm">
                  <h3><strong>Contact Us</strong></h3>
                </div>              
              <div class="row">
                <div class="col-md-7">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3684.4978321134113!2d88.4893499766134!3d22.560476542486537!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a020b267a3cdc13%3A0xb3b21d652126f40!2sUniversity+of+Engineering+%26+Management%2C+New+Town!5e0!3m2!1sen!2sin!4v1552681750529" width="100%" height="315" frameborder="0" style="border:0" allowfullscreen></iframe>
                  </div>

                  <div class="col-md-5">
                      <h4><strong>Also Check-out our YouTube Channel</strong></h4>
                          <iframe width="100%" height="250" src="https://www.youtube.com/embed/mSZzIqVS3Ek" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                  </div>
                </div>
              </div>
            </section>
            <br />
            <!--end contact us container -->
        </div> <!--Container Div End-->     
    </main>

    <footer>
      <a style="opacity: 0;" target="_blank" href="https://www.alexa.com/siteinfo/shattak.com"><script type='text/javascript' src='http://xslt.alexa.com/site_stats/js/s/a?url=https://www.alexa.com/siteinfo/shattak.com'></script></a>
    </footer>
<?php include('includes/footer.php') ?>   
    <!--/.Footer-->
<?php include('includes/scripts.php') ?>
</body>
</html>