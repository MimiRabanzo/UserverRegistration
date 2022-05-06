<?php
    session_start();
    include 'includes/dbcon.php';

    $passwordError = '';
    $confirmPassError = '';
    $referral_code_error = '';
    $FName = '';
    $LName = '';
    $Email = '';
    $Contact = '';
    $bday = '';

    if(isset($_POST['register']))
    {
        $FName = $_POST['FName'];
        $LName = $_POST['LName'];
        $Email = $_POST['Email'];
        $Contact = $_POST['Contact'];
        $referral_code = $_POST['referral_code'];
        $bday = $_POST['bday'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];
        $referralStatus = 1;
        $passwordStat = 1;

        $_SESSION['valid_id'] = $_POST['validity_id'];
        $validity = $_SESSION['valid_id'];

        $val_query = "SELECT email, refercode FROM validity WHERE Validity_ID = $validity LIMIT 1";
        $run_val_query = mysqli_query($dbcon, $val_query);
        $val_result = mysqli_fetch_array($run_val_query);

        $encpass = password_hash($password, PASSWORD_BCRYPT);

        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);

        if(!$uppercase||!$lowercase||!$number||strlen($password) < 8)
        {
            $passwordError = "Password should be at least 8 characters and should include at least one uppercase letter, and one number.";
            
            $passwordStat = 0;
        }

        if($confirmPassword != $password)
        {
            $confirmPassError = "Password does not match.";
            $passwordStat = 0;
        }

        if($referral_code != $val_result['refercode'])
        {
            //echo "Referral Code is incorrect!";
            $referral_code_error =  "Referral Code is incorrect! Try checking your email for the referral code.";
            $referralStatus = 0;
        }

        if($referralStatus == 1 && $passwordStat==1)
        {
            $account_query = "INSERT into account(UserName, Password, UserType)
                                  VALUES('$Contact', '$encpass', 'SV')";
            $run_account_query = mysqli_query($dbcon, $account_query);
            
            # get User_ID from account table
            $get_account_query = mysqli_query($dbcon, "SELECT User_ID FROM account WHERE UserName = '$Contact' LIMIT 1");
            $get_account_result = mysqli_fetch_array($get_account_query);
            $userID = $get_account_result['User_ID'];

            # update basic_information table
            $update_query = "UPDATE basic_information SET LastName = '$LName', FirstName = '$FName', Birthdate = '$bday', email_Add = '$Email', ContactNo = '$Contact' WHERE User_ID = '$userID'";
            $run_update_query = mysqli_query($dbcon, $update_query);
            
            # insert into userver table
            $insert_userver_query = "INSERT INTO userver (User_ID) VALUES ($userID)";
            $run_userver_query = mysqli_query($dbcon, $insert_userver_query);

            # update validity table
            $update_validity_query = "UPDATE validity SET User_ID = '$userID' WHERE refercode = '$referral_code'";
            $run_update_validity_query = mysqli_query($dbcon, $update_validity_query);

            header('Location: registrationSuccessful.html');
            // echo '<script>alert("Registered Successfully! Welcome to UServe.")</script>';
        }

    }