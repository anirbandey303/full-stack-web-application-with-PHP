<?php 
session_start();
  //include "./return_users.php";
  if(!(isset($_GET['name'])) || empty($_GET['name']))
  {
    //header('Location: index.php?EnterValidSubjectName');
    $_GET['name'] = 'subject';
  }
  if(!(isset($_GET['code'])) || empty($_GET['code']))
  {
    header('Location: index.php?EnterValidSubjectCode');
  }
  function test_input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  $subject_code = test_input(urldecode($_GET['code']));
  require_once 'includes/db_connect.php';
  $search_q = "SELECT `subject_name`, `description`, `keywords`, d.`dept_name`  FROM `subject` s LEFT JOIN `departments` d ON s.`department` = d.`dept_code` WHERE `subject_code` LIKE '$subject_code'";
  $result_q=mysqli_query($connection,$search_q);
  $check=mysqli_num_rows($result_q);
  if($check != 0)
  {
    $row=mysqli_fetch_assoc($result_q);
    $subject_name=$row['subject_name'];
    $subject_description=$row['description'];
    $keywords=$row['keywords'];
    $departmentName = $row['dept_name'];
  }
  else
  {
    $subject_name='';
    $subject_description='';
    $keywords='';
    $departmentName = '';
  }
?>
<?php include('includes/header_subject.php') ?>
<?php 
include('./return_users_index.php');
if (isset($_SESSION['access_token']))
{
  include('includes/navbar.php');
  include('functions/update_login_record.php');
}
?>

<!--Main layout-->
<?php
if ($check!=1)
{
  echo'<div class="alert alert-danger text-center container" style="margin-top: 80px;">
    <i class="fa fa-bell" aria-hidden="true"></i>
    <p> Error Loading This Page! </p> 
  </div>';
}
else
{
?>
  <main>        
    <div class="container-fluid">
      <div class="col-md-12">
        <section>
          <div class="my-auto">
            <h1 class="mb-0"><?= $departmentName ?>, <br />
              <span class='text-primary'> <?= $subject_name ?>  </span>
            </h1>
            <?php
            if(isset($_SESSION['access_token']))
            {
               //check if subject is saved.
              $svaeCheckQuery = "SELECT * FROM `save` WHERE `fb_id` = '".$_SESSION['userData']['id']."' AND `subject_code` = '$subject_code'";
              $saveResult = mysqli_query($connection, $svaeCheckQuery);
              $saveCount = mysqli_num_rows($saveResult);
              if ($saveCount == 1)
              {
                  //yes-> show filled?unsave
                ?><a href="./bookmark.php?action=unsave&subject_code=<?=$subject_code?>" class="text-primary"> <i class="fa fa-bookmark fa-3x"></i></a><?php
              }
              else
              {
                ?><a href="./bookmark.php?action=save&subject_code=<?=$subject_code?>" class="text-primary"> <i class="fa fa-bookmark-o  fa-3x"></i></a><?php
              }
            }
            ?>
            <div class="subheading mb-5">
              <?= $subject_code ?> | 
              <a href="mailto:admin@shattak.com">admin@shatak.com</a>
            </div>
            <p class="mb-5">
              <?= $subject_description ?>
            </p>
          </div>
        </section>
      </div>

      <div class="col-md-12 table-responsive">
        <div class="form-group">
          <form class="search-form" role="search" action="./index" method="POST">
            <div class="form-group md-form mt-0 pt-1 waves-light">
              <input type="text" name="search" class="form-control" placeholder="Search Subject (*requires LogIn)" required onkeyup="searchq();" autocomplete="off">
            </div>
          </form>
          <div id="data" style="display:inline-block; word-wrap: break-word;"></div>
        </div>        
        <?php
        $query1="SELECT `filename`, `location` FROM `notes` WHERE `subject_code` LIKE '$subject_code'";
            $result1=mysqli_query($connection,$query1);
        if(mysqli_num_rows($result1)==0)
        {
          echo '<div class="alert alert-danger text-center container">
                      <i class="fa fa-bell" aria-hidden="true"></i>
                      <p> Sorry! No Files Available. </p> 
                    </div>';
        }
        else
        { ?>
          <table class="table table-hover table-striped" style="word-wrap: break-word;">
          <thead>
            <tr>
              <th><h1>Documents</h1></th>           
            </tr>
          </thead>
          <tbody> <?php
          while($row1=mysqli_fetch_assoc($result1))
          {
            $filename = urlencode($row1['filename']);
            $destinations = urlencode($row1['location']);
            $subject_code = urlencode($subject_code);
            echo '
            <tr>
              <td><a href="#"> '.$row1['filename'].' </a></td>
              <td style="text-align: right;"><a href="./download.php?filename='.$filename.'&destinations='.$destinations.'&subject_code='.$subject_code.'" target="_self" title="View or Download this Document" content-type="application/octet-stream" class="btn btn-sm btn-info"> VIEW </a></td>
            </tr>';
          }
        }
        ?>
          </tbody>
        </table>
      </div>
      <?php
            if(isset($_SESSION['access_token']))
            {
              include"./functions/favourites.php";
            }
      ?>
    </div> <!--Container Div End-->     
  </main>
<?php 
}
?>
  <footer>
    
  </footer>
<?php include('includes/footer.php') ?>   
    <!--/.Footer-->
<?php include('includes/scripts.php') ?>
</body>
</html>