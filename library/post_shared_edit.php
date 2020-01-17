<?php
	session_start();
	$post_text = $_POST['shared-edit'];
	$id_pub_edit = $_SESSION['val_id'];
	$uploadfile_temporal=$_FILES['fichero-edit']['tmp_name']; 
	$post_text = addslashes($_POST['shared-edit']);
	$ruta="../../public/img/shared/";//ruta carpeta donde queremos copiar las imágenes 
	$uploadfile_nombre=$ruta.$_FILES['fichero-edit']['name'];
	if (isset($uploadfile_temporal) && empty($post_text)){
		require_once('../confi.php');
		$q = mysqli_query($mysqli, "SELECT * FROM publication WHERE id_publication = '$id_pub_edit'");
		while ($row = mysqli_fetch_array($q)) {
			$post_text_predefined = $row['body'];
			$id_user = $_SESSION['id_user'];
		    move_uploaded_file($uploadfile_temporal,$uploadfile_nombre);
		    $ruta="img/shared/"; 
			$uploadfile_nombre=$ruta.$_FILES['fichero-edit']['name'];
			$id_user = $_SESSION['id_user'];
			move_uploaded_file($uploadfile_temporal,$uploadfile_nombre);
			$ruta="img/shared/"; 
			$uploadfile_nombre=$ruta.$_FILES['fichero-edit']['name'];
			mysqli_query($mysqli, 
				"UPDATE publication 
				SET body = '$post_text_predefined',
					image = '$uploadfile_nombre'
				WHERE id_publication = '$id_pub_edit'");
			echo "primero";	
			$mysqli->close();	 	
		}
	}
	if(isset($uploadfile_temporal) && isset($post_text)){
		require_once('../confi.php');
		$id_user = $_SESSION['id_user'];
	    move_uploaded_file($uploadfile_temporal,$uploadfile_nombre);
	    $ruta="img/shared/"; 
		$uploadfile_nombre=$ruta.$_FILES['fichero-edit']['name'];
		$id_user = $_SESSION['id_user'];
		move_uploaded_file($uploadfile_temporal,$uploadfile_nombre);
		$ruta="img/shared/"; 
		$uploadfile_nombre=$ruta.$_FILES['fichero-edit']['name'];
		mysqli_query($mysqli, 
			"UPDATE publication 
			SET body = '$post_text',
				image = '$uploadfile_nombre'
			WHERE id_publication = '$id_pub_edit'");
		echo "segundo";	
		$mysqli->close();	 
	}
	if(empty($uploadfile_temporal) && isset($post_text)){
		require_once('../confi.php');
		$q = mysqli_query($mysqli, "SELECT * FROM publication WHERE id_publication = '$id_pub_edit'");
		while ($row = mysqli_fetch_array($q)) {
			$post_img_predefined = $row['image'];
			$id_user = $_SESSION['id_user'];
			mysqli_query($mysqli, 
				"UPDATE publication 
				SET body = '$post_text',
				 image = '$post_img_predefined'
				WHERE id_publication = '$id_pub_edit'");
			echo "tercero";	
			$mysqli->close();	 
		}
	}						
?>