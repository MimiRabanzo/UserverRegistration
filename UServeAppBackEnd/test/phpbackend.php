<?php
define("PROJECT_ROOT_PATH", __DIR__ . "/../");
$dp = "paramakagraduate";
$host = "localhost";
$dbuser = "Graduate";
$dbpass = "Ryuushiro63";

$arrQueryStringParams = parse_str($_SERVER['QUERY_STRING'], $query);
$arr = $_SERVER['QUERY_STRING'];
$arr = explode('&', $arr);
$arf = array();
foreach($arr as $fr)
{
    $fr = explode('=', $fr);
    array_push($arf,$fr[1]);
}
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri = explode( '/', $uri );       
        switch($uri[4]){
            case "account":
                {
               switch($uri[5]){

                   case "list":
                        if (isset($arf)){
                        try {
                            $link = mysqli_connect($host, $dbuser, $dbpass);
                            mysqli_select_db($link, $dp); 
                            $accountquery = mysqli_query($link,"SELECT * FROM account ORDER BY user_id ASC LIMIT ".$arf[0]);
                            $accountresult = mysqli_fetch_all($accountquery,MYSQLI_ARRAY);
                            $json = json_encode($accountresult);
                            echo $json;
                        } catch(Exception $e) {
                            throw New Exception( $e->getMessage() );
                        }
                        }
                        break;
                           
                    
                    case "getprofilepic":
                        if (isset($arf)){
                            try {
                                $link = mysqli_connect($host, $dbuser, $dbpass);
                                mysqli_select_db($link, $dp); 
                                $accountquery = mysqli_query($link,"SELECT * FROM profile_images WHERE user_id = ".$arf[0]." LIMIT 1");
                                $accountresult = mysqli_fetch_array($accountquery);
                                $json = json_encode($accountresult);
                                echo $json;
                            } catch(Exception $e) {
                                throw New Exception( $e->getMessage() );
                            }
                        }
                        break;
                    
                    case "search":
                        if (isset($arf)){
                            try {
                                $link = mysqli_connect($host, $dbuser, $dbpass);
                                mysqli_select_db($link, $dp); 
                                $accountquery = mysqli_query($link,"SELECT * FROM account WHERE user_id = ".$arf[0]." LIMIT 1");
                                $accountresult = mysqli_fetch_array($accountquery);
                                $json = json_encode($accountresult);
                                echo $json;
                            } catch(Exception $e) {
                                throw New Exception( $e->getMessage() );
                            }
                        }
                        break;
                    case "login":
                        if (isset($arf)){
                            try {
                                $link = mysqli_connect($host, $dbuser, $dbpass);
                                mysqli_select_db($link, $dp); 
                                $accountquery = mysqli_query($link,"SELECT * FROM account WHERE UserName = ".$arf[0]." LIMIT 1");
                                $accountresult = mysqli_fetch_assoc($accountquery);
                                if(password_verify($arf[1],$accountresult["Password"]))
                                {
                                $json = json_encode($accountresult);
                                echo $json;
                                }
                                else
                                {
                                    echo "Wrong Password";
                                }
                            } catch(Exception $e) {
                                throw New Exception( $e->getMessage() );
                            }
                        }
                        break;
                    case "signup":
                            if (isset($arf)){
                                try {
                                    $link = mysqli_connect($host, $dbuser, $dbpass);
                                    mysqli_select_db($link, $dp); 
                                    $options = [
                                        'cost' => 11  
                                    ];
                                    $hushedpass = password_hash($arf[1], PASSWORD_BCRYPT, $options);

                                    $insertquesry = "INSERT INTO `account` ( `UserName`, `Password`, `UserType`) VALUES ('".$arf[0]."', '".$hushedpass."', 'SK')";
                                    $accountinsertquery = mysqli_query($link,$insertquesry);
                                    
                                    $link1 = mysqli_connect($host, $dbuser, $dbpass);
                                    mysqli_select_db($link1, $dp); 
                                    $accountquery = mysqli_query($link1,"SELECT User_ID FROM account WHERE username = ".$arf[0]." LIMIT 1");
                                    $accountresult = mysqli_fetch_array($accountquery);
                                    
                                    $updatequery = "UPDATE `basic_information` SET `LastName` = '".$arf[2]."', `FirstName` = '".$arf[3]."', `email_Add` = '".$arf[6]."', `ContactNo` = '".$arf[0]."' WHERE `basic_information`.`User_ID` = '".$accountresult["User_ID"]."'";
                                    $link2 = mysqli_connect($host, $dbuser, $dbpass);
                                    mysqli_select_db($link2, $dp); 
                                    $accountresultn = mysqli_query($link1,$updatequery);

                                    $link3 = mysqli_connect($host, $dbuser, $dbpass);
                                    mysqli_select_db($link3, $dp); 
                                    $insertquesry = "INSERT INTO `useeker` ( `User_ID`) VALUES ('".$arf[0]."')";
                                    $accountresultn = mysqli_query($link1,$updatequery);
                                    
                                    $json = json_encode($accountresult);
                                    echo $json;
                                } catch(Exception $e) {
                                    throw New Exception( $e->getMessage() );
                                }
                            }
                            break;
                    case "checkusername":
                                if (isset($arf)){
                                    try {
                                        
                                        $link1 = mysqli_connect($host, $dbuser, $dbpass);
                                        mysqli_select_db($link1, $dp);
                                        $accountquery = mysqli_query($link1,"SELECT user_id FROM `account` WHERE `UserName` = ".$arf[0]." LIMIT 1");
                                        $accountresult = mysqli_fetch_array($accountquery);
                                        
                                        $json = json_encode($accountresult);
                                        echo $json;
                                    } catch(Exception $e) {
                                        throw New Exception( $e->getMessage() );
                                    }
                                }
                                break;
                    case "getseekertype":
                                    if (isset($arf)){
                                        try {
                                            
                                            $link2 = mysqli_connect($host, $dbuser, $dbpass);
                                            mysqli_select_db($link2, $dp);
                                            $accountquery2 = mysqli_query($link2,"SELECT * FROM `getseekers` WHERE user_id = ".$arf[0]." LIMIT 1");
                                            $accountresult2 = mysqli_fetch_assoc($accountquery2);
                                            $json = json_encode($accountresult2);
                                            echo $json;
                                            
                                        } catch(Exception $e) {
                                            throw New Exception( $e->getMessage() );
                                        }
                                    }
                                    break;
                    case "getservertype":
                                        if (isset($arf)){
                                            try {
                                                
                                                $link2 = mysqli_connect($host, $dbuser, $dbpass);
                                                mysqli_select_db($link2, $dp);
                                                $accountquery2 = mysqli_query($link2,"SELECT * FROM `getservers` WHERE user_id = ".$arf[0]." LIMIT 1");
                                                $accountresult2 = mysqli_fetch_assoc($accountquery2);
                                                $json = json_encode($accountresult2);
                                                echo $json;
                                                
                                            } catch(Exception $e) {
                                                throw New Exception( $e->getMessage() );
                                            }
                                        }
                                        break;
                    case "getupdateseeker":
                                        if (isset($arf)){
                                            try {
                                                $link = mysqli_connect($host, $dbuser, $dbpass);
                                                mysqli_select_db($link, $dp);
                                                $updatequery = "UPDATE `basic_information` SET `LastName` = '".$arf[1]."', `FirstName` = '".$arf[2]."' WHERE `basic_information`.`User_ID` = '".$arf[0]."'";
                                                $accountresult = mysqli_query($link,$updatequery);
                                                $link2 = mysqli_connect($host, $dbuser, $dbpass);
                                                mysqli_select_db($link2, $dp);
                                                $accountquery2 = mysqli_query($link2,"SELECT * FROM `getseekers` WHERE user_id = ".$arf[0]." LIMIT 1");
                                                $accountresult2 = mysqli_fetch_array($accountquery2);
                                                $json = json_encode($accountresult2);
                                                echo $json;
                                                
                                            } catch(Exception $e) {
                                                throw New Exception( $e->getMessage() );
                                            }
                                        }
                                        break;
                                        
                    default:
                    header("HTTP/1.1 404 Not Found");
                    exit();
               }
            }
            break;
            case 'notification2':{
                    if (isset($arf)){
                        try {
                        $link2 = mysqli_connect($host, $dbuser, $dbpass);
                        mysqli_select_db($link2, $dp);
                        $accountquery2 = mysqli_query($link2,"SELECT * FROM `notification` WHERE user_id = ".$arf[0]." ORDER BY Notification_ID DESC");
                        if (!$accountquery2) {
                            printf("Error: %s\n", mysqli_error($link2));
                            exit();
                        }
                        $myArray = array();
                        while ($row = mysqli_fetch_array($accountquery2,MYSQLI_ASSOC)) {
                            array_push($myArray,$row);
                        }
                        $json = json_encode($myArray);
                        echo $json;
                        } catch(Exception $e) {
                            throw New Exception( $e->getMessage() );
                        }
                    }
                }
                break;
            case 'report':{
                        if (isset($arf)){
                            try {
                            $link2 = mysqli_connect($host, $dbuser, $dbpass);
                            mysqli_select_db($link2, $dp);
                            $insertquesry = "INSERT INTO `reports` (`ReportBody`, `Sender_ID`, `Reported_ID`) VALUES ('".$arf[0]."', '".$arf[1]."', '".$arf[2]."')";
                            $accountinsertquery = mysqli_query($link2,$insertquesry);
                            } catch(Exception $e) {
                                throw New Exception( $e->getMessage() );
                            }
                        }
                        
                    }
                    break;
            case 'rateandfeed':
                switch($uri[5])
                        {
                        case "getsinglerate":{
                            if (isset($arf)){
                                try {
                                    $link2 = mysqli_connect($host, $dbuser, $dbpass);
                                    mysqli_select_db($link2, $dp);
                                    $accountquery2 = mysqli_query($link2,"SELECT * FROM `rating_feedback` WHERE UServer_ID = ".$arf[0]."AND USeeker_ID = ".$arf[1]);
                                    $accountresult2 = mysqli_fetch_assoc($accountquery2);
                                    $json = json_encode($accountresult2);
                                    echo $json;
                                } catch(Exception $e) {
                                    throw New Exception( $e->getMessage() );
                                }
                            }
                            break;
                        }
                        case "postsinglerf":{
                            if (isset($arf)){
                                try {
                                    $link2 = mysqli_connect($host, $dbuser, $dbpass);
                                    mysqli_select_db($link2, $dp);
                                    $insertquesry = "INSERT INTO `rating_feedback` (`USeeker_ID`, `UServer_ID`, `Rating`, `Feedback`) VALUES (".$arf[1].", ".$arf[0].", ".$arf[2].", ".$arf[3].")";
                                    $accountinsertquery = mysqli_query($link2,$insertquesry);
                                } catch(Exception $e) {
                                    throw New Exception( $e->getMessage() );
                                }
                            }
                            break;
                        }
                        case "updatesinglerf":{
                            if (isset($arf)){
                                try {
                                    $link2 = mysqli_connect($host, $dbuser, $dbpass);
                                    mysqli_select_db($link2, $dp);
                                    $insertquesry = "UPDATE `rating_feedback` SET `Rating` = ".$arf[2]." ,`Feedback`= ".$arf[3]." WHERE UServer_ID = ".$arf[0]."AND USeeker_ID = ".$arf[1];
                                    $accountinsertquery = mysqli_query($link2,$insertquesry);
                                } catch(Exception $e) {
                                    throw New Exception( $e->getMessage() );
                                }
                            }
                            break;
                        }
                        case "getallrf":{
                            if (isset($arf)){
                                try {
                                    $link2 = mysqli_connect($host, $dbuser, $dbpass);
                                    mysqli_select_db($link2, $dp);
                                    $accountquery2 = mysqli_query($link2,"SELECT * FROM `getallratesandfeed` WHERE UServer_ID = ".$arf[0]);
                                    $accountresult2 = mysqli_fetch_all($accountquery2,MYSQLI_ASSOC);
                                    $json = json_encode($accountresult2);
                                    echo $json;
                                } catch(Exception $e) {
                                    throw New Exception( $e->getMessage() );
                                }
                            }
                            break;
                        }
                        case "getallrate":{
                            if (isset($arf)){
                                try {
                                    $link2 = mysqli_connect($host, $dbuser, $dbpass);
                                    mysqli_select_db($link2, $dp);
                                    $accountquery2 = mysqli_query($link2,"SELECT `Rating` FROM `rating_feedback` WHERE UServer_ID = ".$arf[0]);
                                    $accountresult2 = mysqli_fetch_all($accountquery2,MYSQLI_ASSOC);
                                    $myArray = [];
                                    foreach ($accountresult2 as $row) {
                                        $myArray += $row["Rating"];
                                        }
                                    $json = json_encode($myArray);
                                    echo $json;
                                } catch(Exception $e) {
                                    throw New Exception( $e->getMessage() );
                                }
                            }
                            break;
                        }
                        default:{
                        header("HTTP/1.1 404 Not Found");
                            }
                        }
        case "services":{
            switch($uri[5]){
                case "getservices":{
                    if (isset($arf)){
                        try {
                        $link2 = mysqli_connect($host, $dbuser, $dbpass);
                        mysqli_select_db($link2, $dp);
                        $accountquery2 = mysqli_query($link2,"SELECT * FROM `getservices` WHERE UserStatus = ' Active'");
                        if (!$accountquery2) {
                            printf("Error: %s\n", mysqli_error($link2));
                            exit();
                        }
                        $myArray = array();
                        while ($row = mysqli_fetch_array($accountquery2,MYSQLI_ASSOC)) {
                            array_push($myArray,$row);
                        }
                        $json = json_encode($myArray);
                        echo $json;
                        } catch(Exception $e) {
                            throw New Exception( $e->getMessage() );
                        }
                    }
                }
                default:
                {
                header("HTTP/1.1 404 Not Found");
                exit();
                }
            }
        }
        default:
        {
        header("HTTP/1.1 404 Not Found");
        exit();
        }
    }

?>