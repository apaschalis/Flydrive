<?php

include 'configfile.php';
session_start(); //start a session
$Username = $_SESSION['username']; //Username variable which creates an array to start a session for the current user by using the username.
$target_dir = $_SERVER['DOCUMENT_ROOT'] . "/My_Cloud_server/uploads/".$Username.'/'; //where to upload files (in the usernames folder)

foreach ($_POST['chkbox'] as $file) {
    if ($file) {
        $target_file = $target_dir . $file; // creates a variable called target file which gets the information from the target_dir variable and then sends the name of the file to the directory

        if (unlink($target_file)) {

            mysql_query("DELETE FROM files WHERE Name='$file'");
            echo "<script> alert('Files deleted successfully');
              window.location.href = '../User Interface.html';</script>";
        } else {

            echo "<script> alert('Error, File not deleted');
              window.location.href = '../User Interface.html';</script>";

        }
    }
}

//echo "<script>window.location.href = '../User Interface.html';</script>;"

?>