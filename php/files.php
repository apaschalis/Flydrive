<?php
include 'configfile.php';//gets database connection information from the php file  configfile.
//include 'register.php';
//$ composer require ircmaxell/password_compat
session_start(); //start a session
$_SESSION['username'];//set the session to the current user.

$name = basename($_FILES["fileToUpload"]["name"]); //name variable which creates an array to collect the name of the file being uploaded.
$Username = $_SESSION['username']; //Username variable which creates an array to start a session for the current user by using the username.
$target_dir = $_SERVER['DOCUMENT_ROOT'] . "/My_Cloud_server/uploads/".$Username.'/'; //where to upload files (in the usernames folder)
$target_file = $target_dir . $name; // creates a variable called target file which gets the information from the target_dir variable and then sends the name of the file to the directory

//echo $target_file; // prints the name of the file to the directory

/*if ($_FILES["fileToUpload"]["size"] > 100000)
{
  die("Error uploading failed- File too big");
}  */

// if ($_FILES['file'] != null)
// {
// $_FILES['file']['name'];
// $_FILES['file']['Date Modified'];
// $_FILES['file']['type'];
// $_FILES['file']['size'];
// }
// else
    // die("Error file could not be uploaded.");

// exec("clamscan --stdout " . $_FILES["myFile"]["tmp_name"], $out, $return);
// if ($return) {
    // die("Error unable to upload file because the file looks like it may be infected");
// }

// else


if (file_exists($target_dir) && is_writable($target_dir)) { //if folder exists and is writable.

	if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) // checks if file has been moved to new location.
	{

        echo "<script> alert('File upload successful')
       window.location.href = '../User Interface.html';</script>";
		//echo 'file uploaded successfully'; // prints file uploaded successfully.
		//header('Location: ../User Interface.html');
	
		//echo $_FILES["fileToUpload"]["tmp_name"]; // prints new temp file name and location.
        $size = $_FILES["fileToUpload"]['size']; // sends file information
        $date = date('d M o');
        $add = "INSERT INTO files (Name, File_Size, username, Date_Added) VALUES ('$name', '$size','$Username', '$date')"; // sends information about file to mySQL table files.
        $res = mysql_query($add); //sends the $add query to a mysql_query.
	}
	else{ // file did not upload file successfully.
        echo "<script> alert('Error,File Upload failed')
       window.location.href = '../User Intrerface.html';</script>";// prints file upload failed.
	}
} else { //folder does not exist or is not writable.
    //echo 'Upload directory is not writable, or does not exist.'; //prints Upload directory is not writable or does not exist.
    echo "<script> alert('Error,Upload directory is not writable, or does not exist.')
       window.location.href = '../User Interface.html';</script>";
   // mkdir($_SERVER['DOCUMENT_ROOT'] . "/My_Cloud_server/uploads/" .$Username);


}
?>