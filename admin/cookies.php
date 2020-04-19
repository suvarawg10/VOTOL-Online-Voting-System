<?php
	ini_set ("display_errors", "1");
	error_reporting(E_ALL);
	ob_start();
	session_start();
	require('../connection.php');
     print_r($_COOKIE);    //output the contents of the cookie array variable 
	 echo $_SESSION['curname'];
	 echo $_SESSION['curpass'];
?>