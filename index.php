<?php
  include "./return_users.php";
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
<?php include('includes/header.php') ?>
<?php include('includes/db_connect.php') ?>
<?php include('includes/navbar.php') ?>
<?php include('functions/update_login_record.php') ?>
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
                            This page contains all the notes of computer science department. This includes all class notes, lab assignments, question papers, etc. Blah blah blah blah blah blah as if you're going to read.
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
                          <a href="https://www.instagram.com/_anirbandey_/">
                            <span class="fa-stack fa-lg">
                              <i class="fa fa-circle fa-stack-2x"></i>
                              <i class="fa fa-instagram fa-stack-1x fa-inverse"></i>
                            </span>
                          </a>
                        </li>
                        <li class="list-inline-item">
                          <a href="#">
                            <span class="fa-stack fa-lg">
                              <i class="fa fa-circle fa-stack-2x"></i>
                              <i class="fa fa-linkedin fa-stack-1x fa-inverse"></i>
                            </span>
                          </a>
                        </li>
                        <li class="list-inline-item">
                          <a href="#">
                            <span class="fa-stack fa-lg">
                              <i class="fa fa-circle fa-stack-2x"></i>
                              <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                            </span>
                          </a>
                        </li>
                    </ul>
                </section>
            </div>
            <?php include"./functions/favourites.php"; ?>
            <div class="col-md-12" style="padding-top: 50px;">
              <h1>Subjects</h1>
              <div class="form-group">
                <form class="search-form" role="search" action="./index" method="POST">
                  <div class="form-group md-form mt-0 pt-1 waves-light">
                    <input type="text" name="search" class="form-control" placeholder="Search Subject..." required onkeyup="searchq();" autocomplete="off">
                  </div>
                </form>
                <div id="data" style="display:inline-block; word-wrap: break-word;"></div>
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
                    <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d3736489.7218514383!2d90.21589792292741!3d23.857125486636733!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1506502314230" width="100%" height="315" frameborder="0" style="border:0" allowfullscreen></iframe>
                  </div>

                  <div class="col-md-5">
                      <h4><strong>Let's Get In Touch!</strong></h4>
                    <form action="./mail/contact_me" method="POST">
                      <!--<div class="form-group">
                        <input type="text" class="form-control" name="name" value="" placeholder="Name *" required>
                      </div>-->
                      <div class="form-group">
                        <input type="email" class="form-control" name="email" value="" placeholder="E-mail *" required>
                      </div>
                      <!--<div class="form-group">
                        <input type="tel" class="form-control" name="phone" value="" placeholder="Phone *" required>
                      </div>-->
                      <div class="form-group">
                        <textarea class="form-control" name="message" rows="3" placeholder="Message *" required></textarea>
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
                      <button class="btn btn-default" type="submit" name="button">
                          <i class="fa fa-paper-plane-o" aria-hidden="true"></i> SEND
                      </button>
                    </form>
                  </div>
                </div>
              </div>
            </section>
            <br />
            <!--end contact us container -->
        </div> <!--Container Div End-->     
    </main>

    <footer>
    
    </footer>
<?php include('includes/footer.php') ?>   
    <!--/.Footer-->
<?php include('includes/scripts.php') ?>
</body>
</html>