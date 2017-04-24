<?php

include 'configfile.php';
session_start(); //start a session
$Username = $_SESSION['username']; //Username variable which creates an array to start a session for the current user by using the username.
$target_dir = $_SERVER['DOCUMENT_ROOT'] . "/My_Cloud_server/uploads/".$Username.'/'; //where to upload files (in the usernames folder)

echo "im here";
$files = $_POST['value'];
alert($files);
foreach ($_POST['value'] as $file) {
    if ($file) {
        $target_file = $target_dir . $file; // creates a variable called target file which gets the information from the target_dir variable and then sends the name of the file to the directory
        //echo $file;
        echo "<script> alert($files);
              window.location.href = '../User Interface.html';</script>";
        if(file_exists($target_file)){

              header('Content-Description: File Transfer');
              header('Content-Type: application/octet-stream');
              header('Content-Disposition: attachment; filename='.basename($file));
              header('Expires: 0');
              header('Cache-Control: must-revalidate');
              header('Pragma: public');
              header('Content-Length: ' . filesize($file));
              readfile($file);
              exit;

          }else{
              echo "failed find file";
          }


    }
}


?>