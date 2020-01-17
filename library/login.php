<?php
	session_start();
	$user_login_mail = $_POST['mail'];
	$user_login_pdw = $_POST['pdw'];
	/**
	 * Users register verify. 
	 */
	function us_log($user_login_mail, $user_login_pdw){
		$user_login_mail = addslashes($user_login_mail);
		$user_login_pdw = addslashes($user_login_pdw);
		if (strlen($user_login_mail) > 50 || strlen($user_login_pdw) > 50) {
			$login_status = false;
		}else if(strlen($user_login_mail) < 50 && strlen($user_login_pdw) < 50){
			$login_status = true;
		}
		if ($login_status && isset($user_login_mail) && isset($user_login_pdw)) {
			require_once('../confi.php');
			$q = mysqli_query($mysqli, "SELECT * FROM user WHERE  mail = '$user_login_mail' && pdw = '$user_login_pdw'");
			$users_existents = $q->num_rows;
			if ($users_existents == 0) {
				unset($_POST['mail']);
				unset($_POST['pdw']);
				echo "400";
			}else if($users_existents == 1){
				echo "200";
				$_SESSION['user'] = $user_login_mail;
				$q = mysqli_query($mysqli, "SELECT * FROM user");
				while ($row = mysqli_fetch_array($q)){
					if ($row['mail'] == $user_login_mail) {
						$_SESSION['id_user'] = 	$row['id'];
					}
				}
				unset($_POST['mail']);
				unset($_POST['pdw']);
			}			
		}
		$mysqli->close();
	}		
	us_log($user_login_mail, $user_login_pdw);
?>