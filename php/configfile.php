<?php
error_reporting(E_ALL ^ E_DEPRECATED);

$sql_pass = '';
$database_connect_error ='Error could not find database';
$sql_db = 'flydrive';
mysql_connect('127.0.0.1','root',$sql_pass) or die(mysql_error());
mysql_select_db($sql_db) or die($database_connect_error);

?>