<?php
include 'configfile.php';
session_start();

$Username = $_SESSION['username'] ;
$folderName = $_POST['folderName'];

if ($folderName)
{
    $date = date('d M o');
    mkdir($_SERVER['DOCUMENT_ROOT'] . "/My_Cloud_server/uploads/" .$Username. "/".$folderName,0777); //Creates a directory in the current users folder and then saves the folder under the name the user has specified in the modal on the User Interface.html file.
    $add = mysql_query("INSERT INTO files (Name,Username,Date_Added) VALUES ('$folderName','$Username','$date')"); //saves the information to the mySQL database table files.


    echo "<script> alert('Folder created successfully');
              window.location.href = '../User Interface.html';</script>";

}

else
{
    echo "<script> alert('Error,Folder not created');
              window.location.href = '../User Interface.html';</script>";

}


?>