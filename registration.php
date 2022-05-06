<?php
  require 'registerController.php';

  $validity_id = $_GET['id'];
?>
<!DOCTYPE html>
<!--  This site was created in Webflow. http://www.webflow.com  -->
<!--  Last Published: Sat Apr 30 2022 06:42:48 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="6266e51856e573337c051a6b" data-wf-site="6218915c9a38490ab1e4364b">
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
    </style>
  </head>
  <body class="body register">
  <?php if(!empty($passwordError)):?>
              <p><?php echo $passwordError;?>
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
      <h1 style="color:#fff;">Registration</h1>
      <div class="admin-container transparent">
        <div class="content-center w-form">
          <form
            action = "registration.php?id=<?php echo $validity_id;?>"
            id="email-form"
            name="email-form"
            data-name="Email Form"
            method="POST"
            class="form content-center"
          >
            <input type="hidden" value="<?php echo $validity_id;?>" name="validity_id" >
            <input
              type="text"
              class="form-field w-input"
              maxlength="256"
              name="FName"
              data-name="FName"
              placeholder="First Name"
              id="FName"
              required=""
              value = "<?php echo $FName?>"
            />
            <input
              type="text"
              class="form-field w-input"
              maxlength="256"
              name="LName"
              data-name="LName"
              placeholder="Last Name"
              id="LName"
              required=""
              value = "<?php echo $LName?>"
            />
            <input
              type="email"
              class="form-field w-input"
              maxlength="256"
              name="Email"
              data-name="Email"
              placeholder="Email Address"
              id="Email"
              required=""
              value = "<?php echo $Email?>"
            />
            <input
              type="tel"
              class="form-field w-input"
              maxlength="10"
              name="Contact"
              data-name="Contact"
              placeholder="Contact Number"
              id="Contact"
              required=""
              value = "<?php echo $Contact?>"
            />
            <input
              type="text"
              class="form-field w-input"
              maxlength="11"
              name="referral_code"
              placeholder="Referral Code"
              required=""
            />
            <?php if(!empty($referral_code_error)):?>
              <span style="color:red;"><?php echo $referral_code_error;?></span>
            <?php endif;?>
            <div class="form-field">
              <div class="html-embed w-embed">
                <input
                  type="date"
                  name="bday"
                  class="input-field"
                  style="width: 100%"
                  value = "<?php echo $bday?>"
                />
              </div>
            </div>

            <input type="password" class="form-field w-input" maxlength="256" name="password" data-name="Create Password" placeholder="Create Password" id="password" required="" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"/>
            
            
            <input
              type="password"
              class="form-field w-input"
              maxlength="256"
              name="confirmPassword"
              data-name="Confirm Password"
              placeholder="Confirm Password"
              id="confirm_password"
              required=""
            />
            <span id='message'></span>
            <input
              type="submit"
              name = "register"
              value="Register"
              data-wait="Please wait..."
              class="btn-primary next w-button"
            />
          </form>
          <!-- <div class="w-form-done">
            <div>Thank you! Your submission has been received!</div>
          </div>
          <div class="w-form-fail">
            <div>Oops! Something went wrong while submitting the form.</div>
          </div> -->
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
    <script src="js/function.js"></script>
    <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
  </body>
</html>
