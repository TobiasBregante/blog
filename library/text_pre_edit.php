<?php
	include('val_id.php');
	if (isset($_SESSION['text_edit'])){
			$l = $_SESSION['text_edit'];
			echo $l;
	}
?>