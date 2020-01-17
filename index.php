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
		<link rel="stylesheet" type="text/css" href="public/css/styles.css">
		<title>
			Login or Register
		</title>
	</head>
	<body>
		<article class="container-fluid">
			<?php
			require_once('src/templates/nav.php');
				$nav = new nav();
			?>
			<article class="row content-row">
				<article class="content-entry col-12 col-sm-12 col-lg-6 col-xl-3 p-0">
					<form required method="POST" id="frm_register_or_login" class="col-11 col-sm-11 col-lg-11 col-xl-11 p-0" >
						<h1 class="login-title">Login</h1>
						<h1 class="register-title d-none">Register</h1><br>
						<img class="verify-false-1" src="public/img/error.png"><img class="verify-true-1" src="public/img/successful.png"><span class="text-false">Este usuario no está disponible.</span><span class="text-true">Creación Exitosa!</span><span class="text-false-login">Los datos son incorrectos.</span>
						<input type="mail" name="mail" autofocus required placeholder="Mail"><br><br>
						<input type="password" name="pdw" autofocus required placeholder="Password"><br>
						<button type="submit" class="btn btn-entry btn-primary">Submit</button><br><br>
						<article class="register-link col-4 col-sm-4 col-lg-4 col-xl-4 p-0">
							<span>Or Register</span>
						</article>
						<article class="register-link-2 col-4 col-sm-4 col-lg-4 col-xl-4 p-0 d-none">
							<span>Login</span>
						</article>
					</form>
				</article>
			</article>
			<?php
				require_once('src/templates/footer.php');
				$footer = New Footer();
			?>
		</article>
		<script src="public/js/App.js"></script>
	</body>
</html>