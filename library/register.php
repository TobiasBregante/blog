<?php
	session_start();
	$user_register_mail = $_POST['mail'];
	$user_register_pdw = $_POST['pdw'];
	$user_register_mail = addslashes($user_register_mail);
	$user_register_pdw = addslashes($user_register_pdw);
	/**
	 * Users register verify. 
	 */
	function us_reg($user_register_mail, $user_register_pdw){
		if (strlen($user_register_mail) > 50 || strlen($user_register_pdw) > 50) {
			$register_status = false;
		}else if(strlen($user_register_mail) < 50 && strlen($user_register_pdw) < 50){
			$register_status = true;
		}
		if ($register_status && isset($user_register_mail) && isset($user_register_pdw)) {
			require_once('../confi.php');
			$user_register_mail = mysqli_real_escape_string($mysqli, "$user_register_mail");
			$q = mysqli_query($mysqli, "SELECT * FROM user WHERE  mail = '$user_register_mail'");
			$users_existents = $q->num_rows;
			if ($users_existents == 0) {
				mysqli_query($mysqli, "INSERT INTO user (mail, pdw) VALUES ('$user_register_mail', '$user_register_pdw')");
				unset($_POST['mail']);
				unset($_POST['pdw']);
				echo "1";
			}else if($users_existents > 0){
				echo "0";
				unset($_POST['mail']);
				unset($_POST['pdw']);
			}			
		}
		$mysqli->close();
	}		
	us_reg($user_register_mail, $user_register_pdw);	
?>