<?php
	session_start();
	$id_pub_edit = $_SESSION['val_id'];
	if(isset($id_pub_edit)){
		require_once('../confi.php');
		mysqli_query($mysqli, "DELETE FROM list_comments WHERE id_publication = $id_pub_edit");
		mysqli_query($mysqli, "DELETE FROM like_publication WHERE id_publication = $id_pub_edit");
		mysqli_query($mysqli, "DELETE FROM publication WHERE id_publication = $id_pub_edit");
		unset($_SESSION['val_id']);
		unset($_SESSION['image_edit']);
		unset($_SESSION['text_edit']);		
	}
?>