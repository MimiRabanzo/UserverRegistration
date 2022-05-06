<!DOCTYPE html><!--  This site was created in Webflow. http://www.webflow.com  -->
<!--  Last Published: Fri Apr 22 2022 10:37:44 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="626269fefe8f2ce3a2966c91" data-wf-site="6218915c9a38490ab1e4364b">
<head>
  <meta charset="utf-8">
  <title>Ratings and Feedback</title>
  <meta content="Ratings and Feedback" property="og:title">
  <meta content="Ratings and Feedback" property="twitter:title">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="Webflow" name="generator">
  <link href="css/normalize.css" rel="stylesheet" type="text/css">
  <link href="css/webflow.css" rel="stylesheet" type="text/css">
  <link href="css/jnova.webflow.css" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
  <script type="text/javascript">WebFont.load({  google: {    families: ["Poppins:100,200,300,regular,500,600,700,800,900"]  }});</script>
  <!-- [if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif] -->
  <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
  <link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon">
  <link href="images/webclip.png" rel="apple-touch-icon">
</head>
<body>
  <?php
    include("util/connection.php");

    if(isset($_GET['userve_id'])) $UServer_ID = $_GET['userve_id'];
    
  ?>
  <div class="body-wrapper">
    <div class="admin-section">
      <div class="nav-part">
        <a href="homepage.php">
          <img src="images/userveVer2-04.png" loading="lazy" sizes="(max-width: 479px) 80vw, 204.12109375px" srcset="images/userveVer2-04-p-500.png 500w, images/userveVer2-04-p-800.png 800w, images/userveVer2-04-p-1080.png 1080w, images/userveVer2-04-p-1600.png 1600w, images/userveVer2-04.png 2640w" alt="" class="userve-logo">
        </a>

        <div data-hover="false" data-delay="0" class="admin-info w-dropdown">
          <div class="info-drop-down w-dropdown-toggle">
            <img src="images/Group-416.svg" loading="lazy" alt="" class="drop-down-icon">
            <div class="info-text"><span>Hi,</span> admin<span class="text-span">!</span></div>
          </div>
          
          <nav class="dropdown-list w-dropdown-list">
            <a href="#" data-w-id="0ca28cb8-8a43-6cf7-ec52-fb0fef582758" class="info-drop-down-item add-button w-dropdown-link">ADD</a>
            <a href="index.html" class="info-drop-down-item w-dropdown-link">Logout</a>
          </nav>
        </div>
      </div>
      <div class="admin-container" style="background: #fff;">
        <div class="feedback-part content-center">
          <h1 class="rating-feedback-title">Report</h1>
          <?php
            if(isset($_GET['userve_id'])){
              $qReport = mysqli_query($link, "SELECT * FROM reports JOIN useeker ON useeker.USeeker_ID = reports.USeeker_ID JOIN account ON account.User_ID = useeker.User_ID JOIN basic_information ON basic_information.User_ID = account.User_ID WHERE UServer_ID = '{$UServer_ID}'");
              if(mysqli_num_rows($qReport) > 0){
                while($report = mysqli_fetch_array($qReport)){
                  ?>
                    <div class="comment-part">
                      <div class="upper-part">
                        <div class="name-commenter"><?php echo ucfirst($report['FirstName']) . " " . ucfirst($report['M_Initial']) . " " . ucfirst($report['LastName']); if($report['Suffix'] != 'NA') echo " " . ucfirst($report['Suffix']); ?></div>
                        <div class="date-comment"><?= $report['Date'] ?></div>
                      </div>
                      <p class="feedback"><?= $report['ReportBody'] ?></p>
                    </div>
                  <?php
                }
              }
            }            
          ?>
        </div>
      </div>
    </div>
  </div>
  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=6218915c9a38490ab1e4364b" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="js/webflow.js" type="text/javascript"></script>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>
</html>