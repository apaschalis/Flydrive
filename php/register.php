<?php

 include 'configfile.php';

$First_Name = $_POST['firstName'];
$Last_Name = $_POST['lastName'];
$Gender = $_POST['gender'];
$Username = $_POST['Username'];
$Confirm_Email = $_POST['confirmEmail'];
$Confirm_Password = $_POST['confirmPassword'];
$res = "";

$query = mysql_query("SELECT * FROM users WHERE Username='$Username' AND Confirm_Email='$Confirm_Email'");
 $numberRows = mysql_num_rows($query);
 
 if ($numberRows != 0)
 {
   while($rows = mysql_fetch_assoc($query))
   {
   $dbUsername = $rows['Username'];
   $dbEmail = $rows['Confirm_Email'];
       echo "<script> alert('Error, You have already registered with these details')
       window.location.host = '../index.html';</script>";
   }
 }  
   else
   {
      $Confirm_Password = crypt($Confirm_Password,'salt');
       $add = "INSERT INTO users (First_Name,Last_Name,Gender,Username,Confirm_Email,Confirm_Password) VALUES ('$First_Name','$Last_Name','$Gender','$Username','$Confirm_Email','$Confirm_Password')";
       $res = mysql_query($add);
   }


   if($res)
   {
       echo "<script> alert('You have successfully registered!')
              window.location = '../index.html';</script>";

	 mkdir($_SERVER['DOCUMENT_ROOT'] . "/My_Cloud_server/uploads/" .$Username, 0755);
   }
   
   else {
   //die ("Error, Registration failed: " .mysql_error());
       echo "<script> alert('Error Registration failed');
              window.location = '../index.html';</script>";
   }

   function name()
   {
    return $_POST['firstName'];

   }

?>