<?php
	/**
	 * Connect to the DDDBB
 	*/
	$user = "root"; 
	$host = "localhost";
	$pass = "";
	$db = "blogexam";
	$mysqli = new mysqli($host, $user, $pass, $db);
	if (mysqli_connect_errno()){
	      echo "Failed to connect to MySQL: " . mysqli_connect_error();
	     exit();
	}
	/* Change character set to utf8 */
	if (!$mysqli->set_charset("utf8")) {
		$mysqli->error;
	}else {
	    $mysqli->character_set_name();
	}
?>