<?php
	session_start();
	$author = $_SESSION['id_user'];
	$like_id_publication = $_POST['like_id_publication'];
	function like($author, $like_id_publication){
		require_once('../confi.php');
		$q_like_verify = mysqli_query($mysqli, "SELECT * FROM like_publication WHERE like_now = '$author' AND id_publication = '$like_id_publication'");
		$q_like_replies = $q_like_verify->num_rows;
		if ($q_like_replies == 0){
			mysqli_query($mysqli,"INSERT INTO like_publication (id_publication, like_now) VALUES ('$like_id_publication', '$author')");
		}if ($q_like_replies > 0){
			mysqli_query($mysqli,"DELETE FROM like_publication WHERE like_now = '$author' AND id_publication = '$like_id_publication'");
		}
		$mysqli->close();
	}
	like($author, $like_id_publication);
?>