<?php
  require 'includes/dbcon.php';

  $validID_error = array();
  $document_error = array();
  $email = '';
  $uploadOk = 1;
  $successMessage = '';

  if(isset($_POST['submit']))
  {
    $email = $_POST['Email'];
    $validID = $_FILES['validID'];
    $document = $_FILES['document'];
    $validID_file_type = $_FILES['validID']['name'];

    $uploadOk = 1;

    $x = rand(10e12, 10e16);
    $referral_code = base_convert($x, 10, 36);

    if(!is_dir('attachment1'))
    {
        mkdir('attachment1');
    }
    if(!is_dir('attachment2'))
    {
        mkdir('attachment2');
    }
    if ($_FILES['validID']['error'] > 0)
    {
      $validID_error[] = "Please Choose a file.";
      $uploadOk= 0;
    }
    if(!(strtoupper(substr($validID_file_type,-4))==".JPG"
      || strtoupper(substr($validID_file_type,-5))==".JPEG"
      || strtoupper(substr($validID_file_type,-4))==".PNG")) { 
        $validID_error[] ="Only JPG, JPEG, & PNG files are allowed.";
      $uploadOk = 0;
    }

    if ($_FILES['document']['error'] > 0)
    {
      $document_error[] = "Please Choose a file.";
      $uploadOk= 0;
    }
    if(!(strtoupper(substr($_FILES['document']['name'],-4))==".PDF")) { 
      $document_error[] ="Only PDF files are allowed.";
      $uploadOk = 0;
    }

    if($uploadOk == 1)
    {
      $imagePath1 = '';
      $imagePath2 = '';
        if($validID && $validID['tmp_name'])
        {
          $imagePath1 = 'attachment1/'. randomString(8) .'/'. $validID['name'];
          mkdir(dirname($imagePath1));

          move_uploaded_file($validID['tmp_name'], $imagePath1);
        }
        if($document && $document['tmp_name'])
        {
          $imagePath2 = 'attachment2/'. randomString(8) .'/'. $document['name'];
          mkdir(dirname($imagePath2));

          move_uploaded_file($document['tmp_name'], $imagePath2);
        }

      $insert_query = "INSERT INTO validity(email, refercode, ValidID, File)
                      VALUES ('$email', '$referral_code', '$imagePath1', '$imagePath2')";
      mysqli_query($dbcon, $insert_query);

      echo '<script>alert("Success! Please wait for our email for the referral code to register.")</script>';
  
      // $successMessage = "Success! Please wait for our email for the referral code to register.";
    }     
  }

  function randomString($n)
  {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $str = '';
    for($i = 0; $i<$n; $i++)
    {
      $index = rand(0, strlen($characters) - 1);
      $str .= $characters[$index];
    }

    return $str;
  }
?>
<!DOCTYPE html>
<!--  This site was created in Webflow. http://www.webflow.com  -->
<!--  Last Published: Sat Apr 30 2022 06:42:48 GMT+0000 (Coordinated Universal Time)  -->
<html
  data-wf-page="6266e51856e573337c051a6b"
  data-wf-site="6218915c9a38490ab1e4364b"
>
  <head>
    <meta charset="utf-8" />
    <title>Registration</title>
    <meta content="Registration" property="og:title" />
    <meta content="Registration" property="twitter:title" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="Webflow" name="generator" />
    <link href="css/normalize.css" rel="stylesheet" type="text/css" />
    <link href="css/webflow.css" rel="stylesheet" type="text/css" />
    <link href="css/jnova.webflow.css" rel="stylesheet" type="text/css" />
    <script
      src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"
      type="text/javascript"
    ></script>
    <script type="text/javascript">
      WebFont.load({
        google: {
          families: ["Poppins:100,200,300,regular,500,600,700,800,900"],
        },
      });
    </script>
    <!-- [if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif] -->
    <script type="text/javascript">
      !(function (o, c) {
        var n = c.documentElement,
          t = " w-mod-";
        (n.className += t + "js"),
          ("ontouchstart" in o ||
            (o.DocumentTouch && c instanceof DocumentTouch)) &&
            (n.className += t + "touch");
      })(window, document);
    </script>
    <link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <link href="images/webclip.png" rel="apple-touch-icon" />
    <style>
      ::-webkit-calendar-picker-indicator {
        filter: invert(1);
      }
      .success-message{
        text-align: center;
        margin-bottom: 20px;
        font-size: 20px;
        color: green;
      }
    </style>
  </head>
  <body class="body register">
    <?php if($uploadOk == 1): ?>
      <div class="success-message"><?php echo $successMessage; ?></div>
    <?php endif;?>

    <div class="admin-section no-bg">
      <div class="nav-part">
        <img
          src="images/userveLogoHighReso-03.png"
          loading="lazy"
          sizes="(max-width: 479px) 80px, 86.796875px"
          srcset="
            images/userveLogoHighReso-03-p-500.png   500w,
            images/userveLogoHighReso-03-p-800.png   800w,
            images/userveLogoHighReso-03-p-1080.png 1080w,
            images/userveLogoHighReso-03.png        2091w
          "
          alt=""
          class="userve-logo"
        />
      </div>
      <h1 style="color:#fff;">Application Form</h1>
      <div class="admin-container transparent">
        <div class="content-center w-form">
          <form
            action="registration-files.php"
            id="email-form"
            name="email-form"
            data-name="Email Form"
            method="POST"
            class="form content-center"
            enctype="multipart/form-data"
          >
            <input
              type="email"
              class="form-field w-input"
              maxlength="256"
              name="Email"
              data-name="Email"
              placeholder="Email Address"
              id="Email"
              required=""
              value="";
            />

            <div class="instruction mt-1">Add valid I.D.</div>
            <div class="instruction mb-1">
              (Government ID)
            </div>
            <div class="form-field">
              <div class="html-embed w-embed">
                <input type="file" name="validID" />
              </div>
            </div><br>
            <?php if(!empty($validID_error)):?>
              <?php foreach($validID_error as $error):?>
                <p style="color:red;"><?php echo $error;?></p>
              <?php endforeach;?>
            <?php endif;?>
            <div class="instruction mb-1 mt-1">
              Attach your supported document.(Certificates)
            </div>
            <div class="form-field">
              <div class="html-embed w-embed">
                <input type="file" name="document" />
              </div>
            </div>
            <?php if(!empty($document_error)):?>
              <?php foreach($document_error as $derror):?>
                <p style="color:red;"><?php echo $derror;?></p>
              <?php endforeach;?>
            <?php endif;?>
            <br>
            <input
              type="submit"
              value="SUBMIT"
              name="submit"
              data-wait="Please wait..."
              class="btn-primary next w-button"
            />
          </form>
          <div class="w-form-done">
            <div>Thank you! Your submission has been received!</div>
          </div>
          <div class="w-form-fail">
            <div>Oops! Something went wrong while submitting the form.</div>
          </div>
        </div>
      </div>
    </div>
    <script
      src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=6218915c9a38490ab1e4364b"
      type="text/javascript"
      integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
      crossorigin="anonymous"
    ></script>
    <script src="js/webflow.js" type="text/javascript"></script>
    <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
  </body>
</html>
