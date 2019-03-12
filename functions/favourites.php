<?php
//check if fav subs exists for the user
$saveQuery = "SELECT `fb_id` FROM `save` WHERE `fb_id` = '".$_SESSION['userData']['id']."'";
$resultSave = mysqli_query($connection, $saveQuery);
if (mysqli_num_rows($resultSave)>0)
{
  //join save with subject
  $saveQuery1 = "SELECT n.`save_id`, n.`fb_id`, n.`subject_code`, t.`subject_name` FROM `save` n LEFT OUTER JOIN `subject` t ON t.`subject_code`=n.`subject_code` WHERE n.`fb_id` = '".$_SESSION['userData']['id']."' ORDER BY n.`save_id` DESC";
  $saveResult1 = mysqli_query($connection, $saveQuery1);
  //print subject name in card view ?>
            <div class="col-md-12" style="padding-top: 50px;">
              <h1>Favourites</h1>
              <div class="row">
              <!-- Fetching and Displaying all fav subjects -->
              <?php
              if(mysqli_num_rows($saveResult1)==0)
              {
                echo '<div class="alert alert-danger text-center container">
                        <i class="fa fa-bell" aria-hidden="true"></i>
                        <p> Sorry! We could not find any subject for this. </p> 
                      </div>';
              }
              else
              {
                while($saveRow1 = mysqli_fetch_assoc($saveResult1))
                {
                  $subject_name=$saveRow1['subject_name'];
                  $urlName = strtolower($subject_name);
                  $urlName = preg_replace('/\s+/', '-', $urlName);
                  $subject_code=$saveRow1['subject_code'];
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
              }?>
              </div>
            </div><?php
}
?>