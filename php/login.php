<?php
       //session_start();
      include 'configfile.php';

     $username = $_POST['username'];
	 $password = $_POST['password'];
	if ($username && $password)
	{
	 $query = mysql_query("SELECT * FROM users WHERE username='$username'");

      //  $safe_username = mysql_real_escape_string($username);
	 if (mysql_num_rows($query) != 0) // not null then get the information from mySQL.
		{ 
		   $row = mysql_fetch_assoc($query);
		   $fdbusername = $row['Username'];
		   $fdbpassword = $row['Confirm_Password'];
           // $Secure_password = crypt($password,$fdbpassword);
            $pass = crypt($password,'salt');
		 }
		 
		  else
          {
              echo "<script> alert('Error, Incorrect username has been entered')
              window.location.href = '../index.html';</script>";
          }


        if ($username == $fdbusername &&  $pass  == $fdbpassword)
        {
            session_start();

            $_SESSION['username']=$username ;

            header('Location: ../User Interface.html');
        }

		  else
		      // echo "<script> alert('Error, Incorrect password has been entered') </script>";
              echo "<script> alert('Error, Incorrect password has been entered')
              window.location = '../index.html';</script>";

              // header('Location: ../index.html');
	
	}
   
	
	

?>