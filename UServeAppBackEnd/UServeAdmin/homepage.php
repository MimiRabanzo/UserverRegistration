<!DOCTYPE html><!--  This site was created in Webflow. http://www.webflow.com  -->
<!--  Last Published: Fri Apr 22 2022 00:18:17 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="624a116d4993c1600ef9ab02" data-wf-site="6218915c9a38490ab1e4364b">
<head>
  <meta charset="utf-8">
  <title>Homepage</title>
  <meta content="Homepage" property="og:title">
  <meta content="Homepage" property="twitter:title">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="Webflow" name="generator">
  <link href="css/normalize.css" rel="stylesheet" type="text/css">
  <link href="css/webflow.css" rel="stylesheet" type="text/css">
  <link href="css/jnova.webflow.css" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
  <script type="text/javascript">WebFont.load({  google: {    families: ["Poppins:100,200,300,regular,500,600,700,800,900"]  }});</script>
  <!-- [if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif] -->
  <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
  <style>
    .field-text:focus {
      border-top: none;
      border-left: none;
      border-right: none;
      border-bottom: black solid 3px;
    }
  </style>
</head>
<body>
<?php
    include("util/connection.php");
    session_start();
    if(!isset($_SESSION['user_id'])){
        header('Location: index.php');
        exit;
    }

    if(isset($_POST['addUser'])){
      
      mysqli_query($link, "INSERT INTO account VALUES (CONNECTION_ID(), 'SV', 'Active', '".$_POST['addpnumber']."',  SHA1('".$_POST['addpassword']."'), CURRENT_DATE())");

      mysqli_query($link, "INSERT INTO basic_information 
      VALUES(
        CONNECTION_ID(), 
        '".$_POST['addlname']."', 
        '".$_POST['addfname']."', 
        '', 
        '', 
        '', 
        '".$_POST['addemail']."',
        '".$_POST['addpnumber']."'
      )");

      mysqli_query($link, "INSERT INTO userver 
        VALUES(
          CONNECTION_ID(), 
          CONNECTION_ID(), 
          '".$_POST['addservice']."',
          '".$_POST['addexp']."'
        )");
    }

    if(isset($_POST['banUser'])){
      $banid = $_POST['userIdBan'];
      $qUser = mysqli_query($link, "SELECT * FROM account WHERE user_id = '{$banid}' ");
      if(mysqli_num_rows($qUser) > 0){
        while($banUser = mysqli_fetch_array($qUser)){
          if($banUser['UserStatus'] != 'Banned'){
            mysqli_query($link, "UPDATE account SET UserStatus = 'Banned' WHERE user_id = {$banid}");
          }else if($banUser['UserStatus'] == 'Banned'){
            mysqli_query($link, "UPDATE account SET UserStatus = 'Active' WHERE user_id = {$banid}");
          }
        }
      }
    }

    if(isset($_POST['deactUser'])){
      $userIdDeact = $_POST['userIdDeact'];
      $qUser = mysqli_query($link, "SELECT * FROM account WHERE user_id = '{$userIdDeact}' ");
      if(mysqli_num_rows($qUser) > 0){
        while($dUser = mysqli_fetch_array($qUser)){
          if($dUser['UserStatus'] != 'Deactivate'){
            mysqli_query($link, "UPDATE account SET UserStatus = 'Deactivate' WHERE user_id = {$userIdDeact}");
          }else if($dUser['UserStatus'] == 'Deactivate'){
            mysqli_query($link, "UPDATE account SET UserStatus = 'Active' WHERE user_id = {$userIdDeact}");
          }
        }
      }
    }
?>
  <div class="body-wrapper bg-img">
    <div class="admin-section">
      
      <div class="nav-part">
        <img src="images/userveVer2-04.png" loading="lazy" alt="" class="userve-logo">
        <div data-hover="false" data-delay="0" class="admin-info w-dropdown">
          <div class="info-drop-down w-dropdown-toggle"><img src="images/Group-416.svg" loading="lazy" alt="" class="drop-down-icon">
            <div class="info-text"><span>Hi,</span> admin<span class="text-span">!</span></div>
          </div>
          <nav class="dropdown-list w-dropdown-list">
            <!-- <div id="btn-add" data-w-id="77dc1827-be2a-c421-5751-c4e2c946849d" class="info-drop-down-item add-button w-dropdown-link" style="display: flex; justify-content: center;">ADD</div> -->
            <a href="index.php?logout=1" class="info-drop-down-item w-dropdown-link">Logout</a>
          </nav>
        </div>
      </div>

      <div class="admin-container">
        <div data-current="Tab 2" data-easing="ease" data-duration-in="300" data-duration-out="100" class="w-tabs">
          <div class="w-tab-menu">
            <a data-w-tab="Tab 1" class="estab-tab w-inline-block w-tab-link <?php if(!isset($_POST['searchUserver']) && !isset($_POST['searchUSeeker'])) echo 'w--current'; ?>">
              <div class="flex-v">
                <div class="tab-title">Total USers</div>
                <div class="tab-num">
                  <?php
                    echo mysqli_num_rows(mysqli_query($link, 
                      "SELECT * FROM account"
                    ));


                  ?>
                </div>
              </div>
            </a>
            <a data-w-tab="Tab 2" class="estab-tab w-inline-block w-tab-link <?php if(isset($_POST['searchUserver'])) echo 'w--current'; ?>">
              <div class="flex-v">
                <div class="tab-title">UServer</div>
                <div class="tab-num">
                  <?php
                    echo mysqli_num_rows(mysqli_query($link, 
                      "SELECT * FROM userver"
                    ));


                  ?>
                </div>
              </div>
            </a>
            <a data-w-tab="Tab 3" class="estab-tab w-inline-block w-tab-link <?php if(isset($_POST['searchUSeeker'])) echo 'w--current'; ?>">
              <div class="flex-v">
                <div class="tab-title">USeeker</div>
                <div class="tab-num">
                 <?php
                    echo mysqli_num_rows(mysqli_query($link, 
                      "SELECT * FROM useeker"
                    ));


                  ?>
                </div>
              </div>
            </a>
          </div>
          <div class="w-tab-content">

            <div data-w-tab="Tab 1" class="w-tab-pane" style="background-color: #fff;">
              <form class="content-left" method="post">
                <div class="text-field black-border">
                  <input type="search" value="<?php if(isset($_POST['searchTotal'])) echo htmlspecialchars($_POST['search']); ?>" class="input-field w-input" maxlength="256" name="search" data-name="search" placeholder="Search" id="search" >
                  <button type="submit" name="searchTotal" style="border: none; background: none;"><img src="images/bytesize_search.svg"></button>
                </div>
              </form>

              <div class="box table mb-2">
                <div class="w-layout-grid table-grid">
                  <div id="w-node-f223d4f1-840a-823b-e0bf-4519698a3c02-0ef9ab02" class="cell-holder">
                    <div class="col-title">Type</div>
                  </div>
                  <div id="w-node-f223d4f1-840a-823b-e0bf-4519698a3c05-0ef9ab02" class="cell-holder">
                    <div class="col-title">Fullname</div>
                  </div>
                  <div id="w-node-f223d4f1-840a-823b-e0bf-4519698a3c08-0ef9ab02" class="cell-holder">
                    <div class="col-title">Phone Number</div>
                  </div>
                  <div id="w-node-f223d4f1-840a-823b-e0bf-4519698a3c0b-0ef9ab02" class="cell-holder">
                    <div class="col-title">Email</div>
                  </div>
                  <div id="w-node-f223d4f1-840a-823b-e0bf-4519698a3c0e-0ef9ab02" class="cell-holder">
                    <div class="col-title">Status</div>
                  </div>
                  <div id="w-node-f223d4f1-840a-823b-e0bf-4519698a3c11-0ef9ab02" class="cell-holder">
                    <div class="col-title">Action</div>
                  </div>
                </div>
                <?php
                  if($link){ // READ FUNCTION
                    $qUsers= '';
                    if(isset($_POST['searchTotal'])){
                      $qUsers = mysqli_query($link, "SELECT 
                        account.UserType as usertype,
                        basic_information.FirstName as fname,
                        basic_information.M_Initial as mi,
                        basic_information.LastName as lname,
                        basic_information.Suffix as suffix,
                        basic_information.ContactNo as contactno,
                        basic_information.email_Add as email,
                        account.UserStatus as uStatus
                        FROM account 
                        JOIN basic_information ON account.user_id = basic_information.user_id
                        WHERE 
                          CONCAT(
                            basic_information.FirstName, ' ' , 
                            basic_information.M_Initial, ' ' , 
                            basic_information.LastName, ' ' , 
                            basic_information.Suffix
                          ) LIKE '%".$_POST['search']."%' OR
                          basic_information.ContactNo LIKE '%".$_POST['search']."%' OR
                          basic_information.email_Add LIKE '%".$_POST['search']."%' OR
                          account.UserStatus LIKE '%".$_POST['search']."%' 
                          ORDER BY basic_information.FirstName
                          ");
                    }else {
                      $qUsers = mysqli_query($link, "SELECT 
                        account.User_ID as userId,
                        account.UserType as usertype,
                        basic_information.FirstName as fname,
                        basic_information.M_Initial as mi,
                        basic_information.LastName as lname,
                        basic_information.Suffix as suffix,
                        basic_information.ContactNo as contactno,
                        basic_information.email_Add as email,
                        account.UserStatus as uStatus
                        FROM account 
                        JOIN basic_information ON account.user_id = basic_information.user_id
                        ORDER BY basic_information.FirstName");
                    }
                    if(mysqli_num_rows($qUsers) > 0){
                        while($qUser = mysqli_fetch_array($qUsers)){
                            ?>
                            <div class="w-layout-grid table-grid row">
                              <div id="w-node-f223d4f1-840a-823b-e0bf-4519698a3c15-0ef9ab02" class="cell-holder">
                                <div class="cell-data"><?= $qUser['usertype'] ?></div>
                              </div>
                              <div id="w-node-f223d4f1-840a-823b-e0bf-4519698a3c18-0ef9ab02" class="cell-holder">
                                <div class="cell-data">
                                  <?php echo ucfirst($qUser['fname']) . " " . $qUser['mi'] . " " . ucfirst($qUser['lname']); if($qUser['suffix'] != 'NA') echo " " . ucfirst($qUser['suffix']);  ?>
                                </div>
                              </div>
                              <div id="w-node-f223d4f1-840a-823b-e0bf-4519698a3c1b-0ef9ab02" class="cell-holder">
                                <div class="cell-data"><?= $qUser['contactno'] ?></div>
                              </div>
                              <div id="w-node-f223d4f1-840a-823b-e0bf-4519698a3c1e-0ef9ab02" class="cell-holder">
                                <div class="email-cont ">
                                  <div class="cell-data  one-line-only"><?= $qUser['email'] ?></div>
                                </div>
                              </div>
                              <div id="w-node-f223d4f1-840a-823b-e0bf-4519698a3c22-0ef9ab02" class="cell-holder">
                                <div class="cell-data"><?= $qUser['uStatus'] ?></div>
                              </div>
                              <div id="w-node-f223d4f1-840a-823b-e0bf-4519698a3c25-0ef9ab02" class="cell-holder">
                                <!-- <a href="#" class="action-icon w-inline-block "><img src="images/Group-124.svg" loading="lazy" alt="" class="image-3"></a> -->
                                <div id="ban-<?= $qUser['userId'] ?>" class="action-icon w-inline-block ban-btn"><img src="images/Group-125.svg" loading="lazy" alt=""></div>
                                <div id="deact-<?= $qUser['userId'] ?>" class="action-icon w-inline-block deact-btn"><img src="images/Mask-group-6.svg" loading="lazy" alt=""></div>
                              </div>
                            </div>
                          <?php
                        }
                    }
                  }
                ?>
              </div>
            </div>
            
            <div data-w-tab="Tab 2" class="w-tab-pane w--tab-active" style="background-color: #fff;">

              <form class="content-left" method="post">
                  <div class="text-field black-border">
                    <input type="search" value="<?php if(isset($_POST['searchUserver'])) echo htmlspecialchars($_POST['search']) ; ?>" class="input-field w-input" maxlength="256" name="search" data-name="search" placeholder="Search" id="search" >
                    <button type="submit" name="searchUserver" style="border: none; background: none;"><img src="images/bytesize_search.svg"></button>
                    
                  </div>
              </form>
              <table class="box table mb-2" style="width: 100%;">
                <thead style="width: 100%;">
                  <th >
                    <div class="col-title-2">Type</div>
                  </th>
                  <th >
                    <div class="col-title-2">Fullname</div>
                  </th>
                  <th >
                    <div class="col-title-2">Service</div>
                  </th>
                  <th >
                    <div class="col-title-2">No. of Ratings</div>
                  </th>
                  <th >
                    <div class="col-title-2">Status</div>
                  </th>
                  <th >
                    <div class="col-title-2">Action</div>
                  </th>
                </thead>
                
                <tbody>
                  <?php
                    if($link){ // READ FUNCTION
                      $qUsers= '';
                      if(isset($_POST['searchUserver'])){
                        $qUsers = mysqli_query($link, "SELECT 
                          userver.UServer_ID as UServer_ID,
                          account.UserType as usertype,
                          basic_information.FirstName as fname,
                          basic_information.M_Initial as mi,
                          basic_information.LastName as lname,
                          basic_information.Suffix as suffix,
                          basic_information.ContactNo as contactno,
                          basic_information.email_Add as email,
                          account.UserStatus as uStatus,
                          userver.About as uService
                          FROM account 
                          JOIN basic_information ON account.user_id = basic_information.user_id
                          JOIN userver ON account.user_id = userver.user_id
                          WHERE 
                            account.UserType = 'SV' AND
                            CONCAT(
                              basic_information.FirstName, ' ' , 
                              basic_information.M_Initial, ' ' , 
                              basic_information.LastName, ' ' , 
                              basic_information.Suffix
                            ) LIKE '%".$_POST['search']."%' OR
                            userver.About LIKE '%".$_POST['search']."%' OR
                            account.UserStatus LIKE '%".$_POST['search']."%'
                            ORDER BY basic_information.FirstName");
                      }else{
                        $qUsers = mysqli_query($link, "SELECT 
                          userver.UServer_ID as UServer_ID,
                          account.UserType as usertype,
                          basic_information.FirstName as fname,
                          basic_information.M_Initial as mi,
                          basic_information.LastName as lname,
                          basic_information.Suffix as suffix,
                          basic_information.ContactNo as contactno,
                          basic_information.email_Add as email,
                          account.UserStatus as uStatus,
                          userver.About as uService
                          FROM account 
                          JOIN basic_information ON account.user_id = basic_information.user_id
                          JOIN userver ON account.user_id = userver.user_id
                          WHERE account.UserType = 'SV'
                          ORDER BY basic_information.FirstName");
                      }                      
                      if(mysqli_num_rows($qUsers) > 0){
                          while($qUser = mysqli_fetch_array($qUsers)){
                              ?>
                                <tr>
                                  <td>
                                    <div class="cell-data-2"><?= $qUser['usertype'] ?></div>
                                  </td>
                                  <td>
                                  <div class="cell-data-2">
                                    <?php echo ucfirst($qUser['fname']) . " " . ucfirst($qUser['mi']) . " " . ucfirst($qUser['lname']); if($qUser['suffix'] != 'NA') echo " " . ucfirst($qUser['suffix']);  ?>
                                  </div>
                                  </td>
                                  <td>
                                    <div class="cell-data-2"><?= ucfirst($qUser['uService']) ?></div>
                                  </td>
                                  <td>
                                    <?php
                                      $userve_id = $qUser['UServer_ID'];
                                      $qRating = mysqli_query($link, "SELECT * FROM rating_feedback WHERE UServer_ID = '{$userve_id}'");
                                      if(mysqli_num_rows($qRating) > 0){
                                        $rateTotal = 0;
                                        $counter = 0;
                                        while($rate = mysqli_fetch_array($qRating)){
                                          $counter++;
                                          $rateTotal += $rate['Rating'];
                                        }
                                        ?>
                                          <a href="ratings-and-feedback.php?userve_id=<?= $userve_id ?>&avgRate=<?= $rateTotal/$counter ?>" class="cell-data-2">
                                            <?= $rateTotal/$counter ?> / 5
                                          </a>
                                        <?php
                                      }else{
                                        echo '[no data yet]';
                                      }
                                    ?>
                                  </td>
                                  <td>
                                    <div class="cell-data-2"><?= $qUser['uStatus'] ?></div>
                                  </td>
                                  <td>
                                    <div class="cell-data-2 content-vcenter">
                                      <a href="transaction.html" class="mx-1">View Transaction</a>
                                      <a href="report.php?userve_id=<?= $userve_id ?>" class="mx-1">View Reports</a>
                                    </div>
                                  </td>
                                </tr>
                            <?php
                          }
                      }
                    }
                  ?>
                    
                  
                </tbody>

              </table>
            </div>

            <div data-w-tab="Tab 3" class="w-tab-pane"  style="background-color: #fff;">

              <form class="content-left" method="post">
                <div class="text-field black-border">
                  <input type="search" value="<?php if(isset($_POST['searchUSeeker'])) echo htmlspecialchars($_POST['search']); ?>" class="input-field w-input" maxlength="256" name="search" data-name="search" placeholder="Search" id="search" required="">
                  <button type="submit" name="searchUSeeker" style="border: none; background: none;"><img src="images/bytesize_search.svg"></button>
                  
                </div>
              </form>
              <table class="box table mb-2" style="width: 100%;">
                <thead style="width: 100%;">
                  <th >
                    <div class="col-title-2">Type</div>
                  </th>
                  <th >
                    <div class="col-title-2">Fullname</div>
                  </th>
                  <th >
                    <div class="col-title-2">Status</div>
                  </th>
                  <th >
                    <div class="col-title-2">Ratings</div>
                  </th>
                  <th >
                    <div class="col-title-2">Action</div>
                  </th>
                </thead>
                
                <tbody>
                  <?php
                    if($link){ // READ FUNCTION
                      $qUsers= '';
                      if(isset($_POST['searchUSeeker'])){
                        $qUsers = mysqli_query($link, "SELECT 
                          useeker.USeeker_ID as USeeker_ID,
                          account.UserType as usertype,
                          basic_information.FirstName as fname,
                          basic_information.M_Initial as mi,
                          basic_information.LastName as lname,
                          basic_information.Suffix as suffix,
                          account.UserStatus as uStatus
                          FROM account 
                          JOIN basic_information ON account.user_id = basic_information.user_id
                          JOIN useeker ON account.user_id = useeker.user_id
                          WHERE account.UserType = 'SK' AND
                            CONCAT(
                              basic_information.FirstName, ' ' , 
                              basic_information.M_Initial, ' ' , 
                              basic_information.LastName, ' ' , 
                              basic_information.Suffix
                            ) LIKE '%".$_POST['search']."%' OR
                            account.UserStatus LIKE '%".$_POST['search']."%'
                            ORDER BY basic_information.FirstName");
                      }else{
                        $qUsers = mysqli_query($link, "SELECT 
                          useeker.USeeker_ID as USeeker_ID,
                          account.UserType as usertype,
                          basic_information.FirstName as fname,
                          basic_information.M_Initial as mi,
                          basic_information.LastName as lname,
                          basic_information.Suffix as suffix,
                          account.UserStatus as uStatus
                          FROM account 
                          JOIN basic_information ON account.user_id = basic_information.user_id
                          JOIN useeker ON account.user_id = useeker.user_id
                          WHERE account.UserType = 'SK'
                          ORDER BY basic_information.FirstName");
                      }
                      if(mysqli_num_rows($qUsers) > 0){
                          while($qUser = mysqli_fetch_array($qUsers)){
                              ?>
                                <tr >
                                  <td >
                                    <div class="cell-data-2"><?= $qUser['usertype'] ?></div>
                                  </td>
                                  <td>
                                    <div class="cell-data-2">
                                      <?php echo ucfirst($qUser['fname']) . " " . ucfirst($qUser['mi']) . " " . ucfirst($qUser['lname']); if($qUser['suffix'] != 'NA') echo " " . ucfirst($qUser['suffix']);  ?>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="cell-data-2"><?= $qUser['uStatus'] ?></div>
                                  </td>
                                  <td >
                                    <?php
                                      $useeker_id = $qUser['USeeker_ID'];
                                      $qRating = mysqli_query($link, "SELECT * FROM rating_feedback WHERE USeeker_ID = '{$useeker_id}'");
                                      if(mysqli_num_rows($qRating) > 0){
                                        $counter = 0;
                                        while($rate = mysqli_fetch_array($qRating)){
                                          $counter++;
                                        }
                                        ?>
                                          <a href="ratings-and-feedback.php?useeker_id=<?= $useeker_id ?>&count=<?= $counter ?>" class="cell-data-2">
                                            <?= $counter ?>
                                          </a>
                                        <?php
                                      }else{
                                        echo '[no data yet]';
                                      }
                                    ?>
                                  </td>
                                  <td class="">
                                    <div class="cell-data-2 content-vcenter">
                                      <a href="transaction.html" class="mx-1">View Transaction</a>
                                      <a href="#" class="mx-1">View Messages</a>
                                    </div>
                                  </td>
                                </tr>
                            <?php
                          }
                      }
                    }
                  ?>
                    
                  
                </tbody>

              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Add Modal
  <div class="modal-wrapper modal-add hidden" id="add-modal">

    <div class="add-user">
      <h1 class="h1">Add UServer</h1>
      <div class="w-form">
        Form
        <form action="homepage.php" method="POST" >
          
          <input type="text" class="field-text w-input" maxlength="100" name="addfname"  placeholder="First Name" id="addfname" required="">

          <input type="text" class="field-text w-input" maxlength="100" name="addlname"  placeholder="Last Name" id="addlname" required="">

          <input type="tel" class="field-text w-input" maxlength="10" pattern="\d*" oninput="this.value = this.value.replace(/[^0-9]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" name="addpnumber"  placeholder="Phone Number" id="addpnumber" required="">

          <input type="text" class="field-text w-input" maxlength="100" name="addservice"  placeholder="Service" id="addservice" required="">

          <input type="number" class="field-text w-input" min="1" max="100" name="addexp"  placeholder="Experience" id="addexp" required="">

          <input type="email" class="field-text w-input" maxlength="100" name="addemail"  placeholder="Email" id="addemail" required="">

          <input type="password" class="field-text w-input" maxlength="100" name="addpassword"  placeholder="Password" id="addpassword" required="">
          
          Submit Button
          <button type="submit" name="addUser" class="add-button w-button">ADD</button>
          <input type="submit" name="addUser" value="ADD"  class="add-button w-button">
        </form>

      </div>
    </div> 

    Close Button
    <div aria-current="page" class="close-button w-inline-block w--current">
      <img src="images/Group-126.svg" loading="lazy" alt="" class="image-5" id="modal-close-btn">
    </div>
  </div>-->
  <!-- End of Add modal -->

  <!-- Ban Modal -->
  <div class="modal-wrapper ban-modal hidden" id="ban-modal">
    <div class="add-user">
      <h1 class="question-text">Ban this USer?</h1>
      <form class="_w-100 content-haround mt-1" method="POST">
        <input type="text" name="userIdBan" id="banId" class="hidden">
        <button type="submit" name="banUser" class="confirm-button w-button">Confirm</button>
        <div id="cancelBan" class="cancel-button w-button">Cancel</div>
      </form>
    </div>
  </div>
  <!-- End of Ban Modal -->

  <div class="modal-wrapper deactivate-modal hidden" id="deact-modal">
    <div class="add-user">
      <h1 class="question-text">Deactivate this USer?</h1>
      <form class="_w-100 content-center mt-1" method="POST">
        <input type="text" name="userIdDeact" id="deactId" class="hidden">
        <div class="content-haround">
          <button type="submit" name="deactUser" class="confirm-button w-button">Confirm</button>
          <div class="p-1"></div>
          <div id="cancelDeact" class="cancel-button w-button">Cancel</div>
        </div>
      </form>
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=6218915c9a38490ab1e4364b" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="js/webflow.js" type="text/javascript"></script>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>
<script>
  $(document).ready(function(){
    // $('#btn-add').click(function(){
    //   $('#add-modal').css("display", "flex")
    // })

    $('#modal-close-btn').click(function(){
      $('#add-modal').hide()
    })

    $('.deact-btn').click(function(){
      $('#deact-modal').css("display", "flex")
      console.log(this.id.split('-')[1])
      $('#deactId').val(this.id.split('-')[1])
    })
    
    $('#cancelDeact').click(function(){
      $('#deact-modal').hide()
    })

    $('.ban-btn').click(function(){
      $('#ban-modal').css("display", "flex")
      $('#banId').val(this.id.split('-')[1])
    })
    
    $('#cancelBan').click(function(){
      $('#ban-modal').hide()
    })

  })
</script>
</html>