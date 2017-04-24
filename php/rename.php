<?php

include  'configfile.php';
session_start();
$Username = $_SESSION['username'] ; //Username variable which creates an array to start a session for the current user by using the username.
$newName = $_POST['renameFile'];
$target_dir = $_SERVER['DOCUMENT_ROOT'] . "/My_Cloud_server/uploads/".$Username.'/'; //where to upload files (in the usernames folder)
  if(isset($_POST['renamebtn']))
  {
      foreach ($_POST['chkbox'] as $file) {
          if ($file) {
              $target_file = $target_dir . $file; // creates a variable called target file which gets the information from the target_dir variable and then sends the name of the file to the directory

              if (file_exists ($target_file))
              {
                  $oldName = mysql_query("SELECT * FROM files WHERE Name = $file");
                  rename(target_file.$oldName,$target_file.$newName);

                  echo "<script> alert('Rename Successful')
           window.location.host = '../User Interface.html';</script>";
              }

              else {

                  echo "<script> alert('Error, You have not selected a file')
           window.location.host = '../User Interface.html';</script>";
              }


          }
      }


  }



?>