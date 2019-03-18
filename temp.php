<?php
  session_start();
  require_once "g-config.php";
  require_once "./includes/db_connect.php";
  if (isset($_SESSION['access_token']))
  {
    $gClient->setAccessToken($_SESSION['access_token']);
  }

  else if(isset($_GET['code']))
  {
    $token = $gClient->fetchAccessTokenWithAuthCode($_GET['code']);
    $_SESSION['access_token'] = $token;
    $_SESSION['source'] = "google";
  }
  else
  {
    header('Location: login.php');
    exit();
  }

  $oAuth = new Google_Service_Oauth2($gClient);
  $userData = $oAuth->userinfo_v2_me->get();
  
  $_SESSION['userData']['id'] = $userData['id'];
  $_SESSION['userData']['email'] = $userData['email'];
  $_SESSION['userData']['first_name'] = $userData['givenName'];
  $_SESSION['userData']['last_name'] = $userData['familyName']; 
  $_SESSION['userData']['picture'] = $userData['picture'];
  $accessToken = $_SESSION['userData']['id'];

  $cookie_name = 'access_token';
  $cookie_value = base64_encode($accessToken);
  $cookie_source_name = 'source';
  $cookie_source_value = base64_encode("google");

  setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
  setcookie($cookie_source_name, $cookie_source_value, time() + (86400 * 30), "/");

  
  if (isset($_SESSION['access_token']))
  {
    include "./functions/login_record.php";
  }

  header('Location: index.php');
  exit();
?>