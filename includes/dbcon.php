<?php
    $dbcon = mysqli_connect('localhost', 'root', '');

    if($dbcon)
        mysqli_select_db($dbcon, "paramakagraduate-6");
    else
    {
        echo "error";
        die;
    }