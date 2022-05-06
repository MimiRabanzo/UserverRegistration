<!DOCTYPE html>
<html data-wf-page="6218915c9a38497b3de4364c" data-wf-site="6218915c9a38490ab1e4364b">
<head>
  <meta charset="utf-8">
  <title>JNM</title>
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="Webflow" name="generator">
  <link href="css/normalize.css" rel="stylesheet" type="text/css">
  <link href="css/webflow.css" rel="stylesheet" type="text/css">
  <link href="css/jnova.webflow.css" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
  <script type="text/javascript">WebFont.load({  google: {    families: ["Poppins:100,200,300,regular,500,600,700,800,900"]  }});</script>
  <!-- [if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif] -->
  <!-- <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script> -->
  <link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon">
  <link href="images/webclip.png" rel="apple-touch-icon">
</head>
<body>
<?php
    include("util/connection.php");
    session_start();
    if(isset($_GET['logout'])){
      session_destroy();
      header('Location: index.php');
    }
    else if(isset($_SESSION['user_id'])){
      header('Location: homepage.php');
      exit;
    }
?>
  <div class="login-section">
    <div class="login-content">
      <img src="images/userveLogoHighReso-03.png" 
        loading="lazy" 
        sizes="150px" 
        srcset="images/userveLogoHighReso-03-p-500.png 500w, images/userveLogoHighReso-03-p-800.png 800w, images/userveLogoHighReso-03-p-1080.png 1080w, images/userveLogoHighReso-03.png 2091w" 
        alt="" class="admin-logo-login">
      <div class="w-form" > 
        <form id="wf-form-Login-Form" method="post" autocomplete="off" class="flex-v">

          <div class="text-field">
            <input type="text"  class="input-field w-input" maxlength="256" name="username" data-name="username" placeholder="Username" id="username" required="">
          </div>

          <div class="text-field">
            <input type="password" class="input-field w-input" maxlength="256" name="password" data-name="password" placeholder="Password" id="password-2" required="">
          </div>
          
          <input type="submit" name="login" value="Login" data-wait="Please wait..." class="btn-primary mx-3 mb-3 w-button">
          <?php
            if(isset($_POST['login'])){
              if($_POST['username'] == "admin" && $_POST['password'] == "admin" ){
                $_SESSION['user_id'] = 1;
                header('Location: homepage.php');
                exit;
              }
            }
          ?>
        </form>

        <div class="w-form-done">
          <div>Logging in</div>
        </div>
        <div class="w-form-fail">
          <div>Wrong Something</div>
        </div>
      </div>
    </div>
  </div>
  <!-- <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=6218915c9a38490ab1e4364b" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="js/webflow.js" type="text/javascript"></script> -->
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>
</html>