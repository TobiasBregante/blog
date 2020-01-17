<?php
	session_start();
	if (isset($_POST['validate_id_publi'])){
		$val_id = $_POST['validate_id_publi'];
		require_once('../confi.php');
		$_SESSION['val_id'] = $val_id;
		$val_id = $_SESSION['val_id'];
		$q = mysqli_query($mysqli, "SELECT * FROM publication WHERE id_publication = $val_id");
		while ($row = mysqli_fetch_array($q)) {
			$_SESSION['image_edit'] = $row['image'];
			$_SESSION['text_edit'] = $row['body'];
			$r = $_SESSION['image_edit'];
			echo $r;
		}
		$l = $_SESSION['text_edit'];
	}
?>