<?php
	session_start();
	require_once('../confi.php');
	$q = mysqli_query($mysqli, "SELECT mail FROM user");
	while ($row = mysqli_fetch_array($q)){
	?>
	<li><img class="img-user" src="../public/img/user.png"><?php echo $row['mail'];?></li>
	<?php
	}
?>