<?php
	session_start();
	$delete_sess = $_POST['delete_sess'];
		echo "Listo! $delete_sess";		
	function dele($delete_sess){
		unset($_SESSION['text_edit']);
		unset($_SESSION['image_edit']);
		echo $_SESSION['image_edit'];
	}
	if (isset($delete_sess)){
		dele($delete_sess);
	}
?>