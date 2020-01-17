<?php
	error_reporting(0);
	/**
	 * This is an nav
	 */
	class nav{
		function __construct(){
		?>
			<nav class="row fixed-top">
				<article class="col-3 col-sm-3 col-lg-3 col-xl-3 p-0">
					<ul>
						<li>
						<?php
						if ($_SERVER['REQUEST_URI'] == '/blogexam/' || $_SERVER['REQUEST_URI'] == '/blogexam/index.php'){
							?>
							<img class="logo" src="public/img/logo.png">
							<?php						
						}else{
							?>
							<img class="logo" src="../public/img/logo.png">
							<?php
						}
						?>
						</li>
						<li class="title-logo">
							WeBlog
						</li>
					</ul>
				</article>
				<article class="col-9 col-sm-9 col-lg-9 col-xl-9 p-0">
				<?php
				if (isset($_SESSION['user'])){
				?>
					<ul class="profile">
						<li>
							<img class="img-user" src="../public/img/user.png">
						</li>
						<li>
							<img class="img-nav" src="../public/img/menu.png">
						</li>
					</ul>
					<article class="option-user bg-warning d-none">
						<ul>
							<li class="profile-li">
								Usuario <?php echo $_SESSION['user'];?>
							</li>
							<li class="profile-li">
								ID usuario: <?php echo $_SESSION['id_user'];?>
							</li>
							<li>
								<a href="../src/library/logout.php">
									<img class="logout-user" src="../public/img/logout.png">
								</a>
							</li>
						</ul>
					</article>
				<?php
				}else{
				?>
					<ul class="profile">
						<li>
							<?php
							if ($_SERVER['REQUEST_URI'] == '/blogexam/public/blog.php') {
							?>
								<a href="../index.php">
									<button class="btn btn-primary">Login or Register</button>
									
								</a>
							<?php			
							}if($_SERVER['REQUEST_URI'] != '/blogexam/public/blog.php'){
							?>
								<a href="public/blog.php">
									<button class="btn btn-primary">Soy expectador</button>
								</a>
							<?php									
							}
							?>
						</li>
					</ul>				
				<?php					
				}
				?>					
				</article>
			</nav>
		<?php
		}
	}
?>