<?php
    include 'includes/dbcon.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require 'vendor/autoload.php';

  function sendemail_verify($email, $verify_code, $validity_id)
  {
      $mail = new PHPMailer(true);
      $mail->SMTPOptions = array(
          'ssl' => array(
          'verify_peer' => false,
          'verify_peer_name' => false,
          'allow_self_signed' => true
          )
          );
      $mail->isSMTP();
      $mail->SMTPAuth = true;
      $mail->Host       = 'smtp.gmail.com';       //Set the SMTP server to send through
      $mail->Username   = 'userve.synergy@gmail.com';  //SMTP username
      $mail->Password   = 'Itis2021'; 
      $mail->SMTPSecure = "tls";            //Enable implicit TLS encryption
      $mail->Port       = 587;
      $mail->setFrom('userve.synergy@gmail.com');
      $mail->addAddress($email);     //Add a recipient
      //Content
      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = 'Application Verification from UServe';
      $email_template = "
                        <h2>You have been approved by UServe for your application.</h2>
                        <h4>Click the link below to register in UServe.</h4>
                        <h4>Take note of the referral code since you will need that to successfully register and become an official UServer.</h4>
                        <br>
                        <h4>referral code: $verify_code</h4>
                        <a href='http://localhost/USERVEREGISTRATION/UServerRegistration/registration.php?id=$validity_id'>";

      $mail->Body = $email_template;
      $mail->send();
      // echo "Message has been sent.";
  }

  if(isset($_POST['sendEmail']))
  {
    $email = $_POST['Email'];
    $verify_code = $_POST['referral_code'];
    $validity_id = $_POST['validity_id'];

    sendemail_verify("$email", "$verify_code", "$validity_id");

    echo "<script>alert('Email sent!');</script>";
  }