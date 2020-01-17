<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="es-AR">
	<head>
		<meta charset="utf-8">
		<meta name="Keywords" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="Author" content="Tobías Nazareno Bregante">
		<meta name="Description" content="This is an exam blog for shared and give like me in the comments">
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="../public/css/styles.css">		
		<title>
			Blog | WeBlog	
		</title>
	</head>
	<body>
		<article class="container-fluid content-row-blog">
			<?php
			require_once('../src/templates/nav.php');
				$nav = new nav();
			?>			
			<article class="row row-s">
				<?php
				if (isset($_SESSION['user'])) {
				?>
					<aside class="aside bg-warning d-none">
						<h3>Usuarios</h3>
						<ul class="contact"></ul>				
				<?php
				}
				?>
				</aside>
				<article class="posted col-12 col-sm-12 col-lg-12 col-xl-12 p-0">
				<?php	
				if(isset($_SESSION['user'])){
				?>	
					<button type="button" class="btn btn-warning usuarios">Usuarios</button>
				<?php
				}if(isset($_SESSION['user'])){
				?>		
					<article class="content-shared col-12 col-sm-12 col-lg-11 col-xl-11 p-0">
						<article class="space-s col-12 col-sm-12 col-lg-12 col-xl-12 p-0"></article> 						
						<form class="frm-img" id="frm-img" method="POST" enctype="multipart/form-data">
							<button id="submit" type="submit" class="bg-primary d-none">Shared</button>
							<label for="submit" class="submit">
								<img src="../public/img/enviar.png">
							</label>
							<textarea name="shared" id="shared" class="shared text-dark" placeholder="Comenzá un debate" onfocus></textarea>
						    <label for="file" class="subir">
						    	<img class="logo-img" src="../public/img/img.png">
						    </label>
						    <input id="file" aria-label="Agregar foto o video" accept="image/*" class="shared-img" name="fichero" type="file">
						</form>
					</article>						
				<?php
				}
				?>
				</article>
			</article>
			<article class="row row-shared">
			</article>
			<article class="back-black d-none"></article>
			<form method="POST" id="exitBtn">
				<input type="radio" checked name="delete_sess" class="d-none" value="delete">
				<button type="submit" class="exitBtn d-none">x</button><br>
			</form>
			<article class="cont-edit-in d-none">
				<article class="frm-edit-post col-12 col-sm-12 col-lg-11 col-xl-11 p-0">
					<p class="titl-edit">Editar publicación</p>
					<article class="space col-12 col-sm-12 col-lg-12 col-xl-12 p-0"></article>
					<form id="frm-edit" class="frm-edit" method="POST" enctype="multipart/form-data">
						<button id="submit-edit" type="submit" class="bg-primary d-none">Shared</button>
						<input type="radio" checked name="id_pub_edit" class="d-none" value="frm-edit-<?php echo $_SESSION['val_id'];?>">
						<label for="submit-edit" class="submit">
							<img src="../public/img/enviar.png">
						</label>
						<textarea id="shared-edit" name="shared-edit" class="shared-edit text-dark" placeholder="Actualizar Debate" onfocus></textarea>
						<label for="file-edit" class="subir">
						   	<img class="logo-img" src="../public/img/img.png">
						</label>
					    <input id="file-edit" aria-label="Agregar foto o video" accept="image/*" class="shared-img" name="fichero-edit" type="file">
					</form><br>
					<img class="img-pre-edit" id="img-pre-edit" src="">
					<span class="text-pre-edit"></span><br> 						
					<form id="delete-publi" method="POST">
						<input type="radio" checked name="id_pub_delete" class="d-none" value="frm-edit-<?php echo $_SESSION['val_id'];?>">
						<button type="submit" class="btn btn-danger delete-pub">Eliminar Publicación</button><br>
					</form>
				</article>
			</article>
		<?php
			require_once('../src/templates/footer.php');
			$footer = new Footer();
		?>			
		</article>
		<script src="../public/js/App.js"></script>
	</body>
</html>