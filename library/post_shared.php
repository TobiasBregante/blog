<?php
	session_start();
	$post_text = $_POST['shared'];
	$uploadfile_temporal=$_FILES['fichero']['tmp_name']; 
	$post_text = addslashes($_POST['shared']);
	$post_text = htmlentities($post_text, ENT_QUOTES);
	$ruta="../../public/img/shared/";//ruta carpeta donde queremos copiar las imágenes 
	$uploadfile_nombre=$ruta.$_FILES['fichero']['name'];
	if (is_uploaded_file($uploadfile_temporal)){
		require_once('../confi.php');
		$id_user = $_SESSION['id_user'];
		$mail = $_SESSION['user'];
	    move_uploaded_file($uploadfile_temporal,$uploadfile_nombre);
	    $ruta="img/shared/"; 
		$uploadfile_nombre=$ruta.$_FILES['fichero']['name'];
		mysqli_query($mysqli, "INSERT INTO publication (id, body, image, mail) VALUES ('$id_user', '$post_text', '$uploadfile_nombre', '$mail')");
		echo "Envío exitoso!".$uploadfile_nombre;
	}
	else{ 
		echo "error al cargar la imagen."; 
	} 
?>