<?php
session_start();
if(!isset($_GET['filename']) || !isset($_GET['destinations']) || empty($_GET['filename']) || empty(isset($_GET['destinations'])))
{
    header('Location:index.php');
}
else
{
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $filename = urldecode(test_input($_GET['filename']));
    $destinations = urldecode(test_input($_GET['destinations']));  
    $subject_code = urldecode(test_input($_GET['subject_code']));  
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
                <div class="row">
                    <div class="col-md-4 text-center">
                        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                            <!-- quord_after_notes  ADs-->
                            <ins class="adsbygoogle"
                                 style="display:inline-block;width:336px;height:280px"
                                 data-ad-client="ca-pub-4405752513006993"
                                 data-ad-slot="7065181934"></ins>
                            <script>
                            (adsbygoogle = window.adsbygoogle || []).push({});
                            </script>
                    </div>

                    <div class="col-md-4 text-center">
                        <h2> <?= $filename ?> </h2>
                        <a href="<?= $destinations ?>" id="submit" type="submit" class="btn btn-danger btn-lg" name="submit">Download Now</a> <br /> <br />
                    </div>

                    <div class="col-md-4 text-center">
                        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                            <!-- quord_after_notes  ADs-->
                            <ins class="adsbygoogle"
                                 style="display:inline-block;width:336px;height:280px"
                                 data-ad-client="ca-pub-4405752513006993"
                                 data-ad-slot="7065181934"></ins>
                            <script>
                            (adsbygoogle = window.adsbygoogle || []).push({});
                            </script>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php
$downloadCount = "SELECT `subject_code`, `count` FROM `downloadcount` WHERE `subject_code` LIKE '$subject_code';";
$downloadQuery = mysqli_query($connection, $downloadCount);
if(mysqli_num_rows($downloadQuery) === 0)
{
    //create a new record
    $updateCount = "INSERT INTO `downloadcount`(`download_id`,`subject_code`,`count`) VALUES (NULL, '$subject_code', '1');";
    mysqli_query($connection, $updateCount);
}
else
{
    $recordDownload = mysqli_fetch_assoc($downloadQuery);
    $count = $recordDownload['count'] + 1;
    $update = "UPDATE `downloadcount` SET `count` = '$count' WHERE `subject_code` LIKE '$subject_code'";
    mysqli_query($connection, $update);    
}
?>
        <footer>
    <a style="opacity: 0;" target="_blank" href="https://www.alexa.com/siteinfo/shattak.com"><script type='text/javascript' src='http://xslt.alexa.com/site_stats/js/s/a?url=https://www.alexa.com/siteinfo/shattak.com'></script></a>
    </footer>
<?php include('includes/footer.php') ?>   
    <!--/.Footer-->
<?php include('includes/scripts.php') ?>
</body>
</html>