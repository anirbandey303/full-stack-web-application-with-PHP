<!DOCTYPE html>
<?php session_start(); 
if(!isset($_SESSION['access_token']))
{
  header('Location: login.php');
}

?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <h1>Hello, world!</h1>
    <div class="container" style="margin-top: 100px">
      <div class="row justify-content-center">
        <div class="col-md-3" align="center">
          <img src="<?php echo $_SESSION['userData']['picture'] ?>">
        </div>
        <div class="col-md-9" align="center">
          <table class="table table-hover table-bordered">
            <tbody>
              <tr>
                <td>ID</td>
                <td><?= $_SESSION['userData']['id'] ?></td>
              </tr>
              <tr>
                <td>First name</td>
                <td> <?= $_SESSION['userData']['first_name'] ?></td>
              </tr>
              <tr>
                <td>lastname</td>
                <td><?= $_SESSION['userData']['last_name'] ?></td>
              </tr>
              <tr>
                <td>email</td>
                <td><?= $_SESSION['userData']['email'] ?></td>
              </tr>

            </tbody>
          </table>
          <a href="logout.php">logout</a>
        </div>
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>