<?php
$file = $_POST['valid_id_file'];
$cert_file = $_POST['cert_file'];

if(isset($_POST['validID']))
{
    // Add header to load pdf file
    header('Content-type: application/pdf'); 
    header('Content-Disposition: inline; filename="' .$file. '"'); 
    header('Content-Transfer-Encoding: binary'); 
    header('Accept-Ranges: bytes'); 
    @readfile($file);
}

if(isset($_POST['cert']))
{
    // Add header to load pdf file
    header('Content-type: application/pdf'); 
    header('Content-Disposition: inline; filename="' .$cert_file. '"'); 
    header('Content-Transfer-Encoding: binary'); 
    header('Accept-Ranges: bytes'); 
    @readfile($cert_file);
}
