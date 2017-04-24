<?php 
$cookie_name = "cookie";
$cookie_value = "name";

setcookie($cookie_name,$cookie_value, time() + 86400 * 50, "/"); // this will expire in 50 days as 86400 equals one day


?>