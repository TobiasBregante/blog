<?php
	session_start();
	$list_comments = $_POST['responseComment'];
	$id_publication = $_POST['list-comment-value'];
	$user_out = $_SESSION['user'];
	function list_comments($list_comments, $id_publication, $user_out){
		if (isset($list_comments) && $list_comments != ""){
			require_once("../confi.php");
			$list_comme = htmlentities($list_comments, ENT_QUOTES);
			mysqli_query($mysqli, "INSERT INTO list_comments (id_publication, user_out, comment) VALUES ('$id_publication', '$user_out', '$list_comme')");
			$mysqli->close();
		}
	}
	list_comments($list_comments, $id_publication, $user_out);
?>