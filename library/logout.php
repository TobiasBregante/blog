<?php
	session_start();
	$id_user = $_SESSION['id_user'];
	function logout($id_user){
		session_destroy();
		header("Location: ../../index.php");
	}
	logout($id_user);
?>