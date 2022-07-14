<?php
error_reporting(0);
ini_set('display_errors', 0);
define("DATABASE","trpmanagement");
define("DATABASEUSERNAME","trpmanagement");
define("DATABASEHOSTNAME","localhost");
define("DATABASEPASSWORD","trpmanagement");
date_default_timezone_set('Asia/Kolkata');
 
 
$connect=new mysqli(DATABASEHOSTNAME,DATABASEUSERNAME,DATABASEPASSWORD,DATABASE) ;
		
		if ($connect->connect_error) {
   			 die("Connection failed: " . $connect->connect_error);
		}



?>	