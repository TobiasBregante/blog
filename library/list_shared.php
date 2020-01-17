<?php
	session_start();
	require_once('../confi.php');
	$q_res = mysqli_query($mysqli, "SELECT id_comment, id_publication FROM list_comments");
	$q_response = mysqli_query($mysqli, "SELECT * FROM list_comments");	
	$q = mysqli_query($mysqli, "SELECT * FROM publication ORDER BY id_publication DESC");
	while ($row = mysqli_fetch_array($q)){
		$time = strtotime($row['time_shared']);
		$day = date("d", $time);
		$month = date("m", $time);
		$year = date("y", $time);
		$hour = date("g", $time);
		$minutes = date("i", $time);
		$ap = date("a", $time);
		if(isset($_SESSION['val_id']) && isset($q_v_id)){
			$q_val_id = mysqli_query($mysqli, "SELECT * FROM list_comments WHERE id_publication = $id_sess_publ");
			$q_v_id = $q_val_id->num_rows;
			$_SESSION['img_s'] = $row['image'];
			$id_sess_publ = $_SESSION['val_id'];
		}
	?>
			<article class="mypost col-12 col-sm-12 col-lg-8 col-xl-8 p-0">
				
			<span class="who-shared">
				<?php echo $row['mail'];?>
					<span class="who-shared-conex">publicó</span>
			</span>
			<span class="time_shared">
				<?php echo "$day-$month-$year";?>
				<span class="hour">
					<?php echo "$hour:$minutes $ap";?>
				</span>							
			</span><br><hr>
		<?php
		if (isset($_SESSION['id_user']) 
			&& $row['mail'] == $_SESSION['user'] 
			|| isset($_SESSION['user']) 
			&& $_SESSION['user'] == "admin@mail.com") {
		?>
			<form method="POST" onsubmit="val_id(this)" id="validate-id-<?php echo $row['id_publication'];?>">
				<input type="radio" checked name="validate_id_publi" class="d-none" value="<?php  echo $row['id_publication'];?>">								
				<button onclick="post_edit(this)" style="border: 0;background-color: rgba(0, 0, 0, 0);" class="cont-edit" type="submit">
					<img class="edit-icon" src="img/editar.png">
				</button>				
			</form>			
		<?php
		}
		?>
			<img src="<?php echo $row['image'];?>"><br><hr>			
			<p class="text-content-shared"><?php echo $row['body'];?></p><br><hr>
			<article class="list-response-comment col-12 col-sm-12 col-lg-11 col-xl-11 p-0">
				<?php
				$id_publ = $row['id_publication'];
				$q_response = mysqli_query($mysqli, "SELECT * FROM list_comments WHERE id_publication = '$id_publ'");
				$q_response_count = $q_response->num_rows;
				if ($q_response_count == 0){
				?>
				<span class="title-response-comment" id="title-com-<?php echo $row['id_publication'];?>">Sin comentarios</span><br><br>
				<?php
				}if ($q_response_count == 1){
				?>
				<span class="title-response-comment" id="title-com-<?php echo $row['id_publication'];?>"><?php echo $q_response_count;?> Comentario</span><br><br>
				<?php
				}if($q_response_count > 1){
				?>
				<span class="title-response-comment" id="title-com-<?php echo $row['id_publication'];?>"><?php echo $q_response_count;?> Comentarios</span><br><br>
				<?php					
				}
				?>			
				<ul class="list_response_comments_ul">
				<?php
				$q_response = mysqli_query($mysqli, "SELECT * FROM list_comments");
					while ($row_response = mysqli_fetch_array($q_response)){
						$time_r = strtotime($row_response['time_response_comment']);
						$day_r = date("d", $time_r);
						$month_r = date("m", $time_r);
						$year_r = date("y", $time_r);
						$hour_r = date("g", $time_r);
						$minutes_r = date("i", $time_r);
						$ap_r = date("a", $time_r);
						if($row_response['id_publication'] == $row['id_publication']){
					?>
						<li>
							<span class="who-res">
								<img class="img-user" src="../public/img/user.png">
								<?php
								echo $row_response['user_out']
								;?>
								<span class="who-res-conex"> - Respondió</span>
								<span class="day_r">
									<?php echo "$day_r-$month_r-$year_r";?>	
									<span class="hour_r"><?php echo "$hour_r:$minutes_r $ap_r";?></span>
									</span>
							</span>							
						</li>	
						<li class="resp-text"><br>
							<?php echo $row_response['comment'];?>		
						</li><hr>
					<?php
						}
					}
				?>	
				</ul>
			</article>
			<?php
			$id_pub = $row['id_publication'];
		$q_like_list = mysqli_query($mysqli, "SELECT id_publication FROM like_publication WHERE id_publication = $id_pub");
		$like_count =  $q_like_list->num_rows;
	
		?>
			<span class="like-list" id="like-list-<?php echo $row['id_publication'];?>"><?php echo $like_count;?></span><img style="width: 15px; height: 15px; margin-left: 1%;" src="../public/img/corazon.png">
		<?php					
		if(isset($_SESSION['user'])){
		?>		
			<form method="POST" class="like_frm" id="like-frm-<?php echo $row['id_publication'];?>" onsubmit="on_like(this)"><hr>
				<input type="check" checked value="<?php echo $row['id_publication'];?>" name="like_id_publication" class="d-none">
				<button class="like-frm-<?php echo $row['id_publication'];?>" type="submit">
				<?php
					$id_us_conf = $_SESSION['id_user'];
					$q_like_confirm = mysqli_query($mysqli, "SELECT id_publication, like_now FROM like_publication WHERE id_publication = $id_pub AND like_now = '$id_us_conf'");
					$like_count =  $q_like_confirm->num_rows;
					if ($like_count == 0){
					?>
						<img class="like" id="like-<?php echo $row['id_publication'];?>" style="width: 20px; height: 20px; margin-bottom: 2%;" src="../public/img/like.png">
					<?php
					}if ($like_count == 1){
					?>
						<img class="like" id="like-<?php echo $row['id_publication'];?>" style="width: 20px; height: 20px; margin-bottom: 2%;" src="../public/img/corazon.png">
					<?php
					}
				?>	
				</button><br><br>
			</form>	
			<form method="POST" onsubmit ="clickaction(this)" class="frm-response-comment" id="frm-comment-<?php echo $row['id_publication'];?>">
				<textarea class="comment" placeholder="Has un comentario" name="responseComment"></textarea>
				<input class="d-none" type="radio" checked name="list-comment-value" value="<?php echo $row['id_publication'];?>">
				<button id="submit-response-comment-<?php echo $row['id_publication'];?>" type="submit" class="bg-primary d-none">Shared</button>
				<label for="submit-response-comment-<?php echo $row['id_publication'];?>" class="submit-c">
					<img src="../public/img/enviar.png">
				</label>				
			</form><br>		
		<?php
		}
		?>
		</article>		
	<?php
	}
	$mysqli->close();
?>