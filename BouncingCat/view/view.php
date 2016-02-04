<?php
function jeux($tu) {			//dans le menu liste de tous les jeux
	foreach ($tu as $u) {
		$id = $u->id;
		//lien direct pour voir les détails du jeu
		echo <<< EOT
		<li><a href='?action=read&controller=game&id=$id'>$id</a></li>  
EOT;
		
	}
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset ="UTF-8">
		<link rel="stylesheet" href="CSS/dist/css/bootstrap.min.css" type="text/css"  />
		<!--
		<link rel="stylesheet" href="CSS/style.css" type="text/css"  />
		-->
		<title><?php echo $pagetitle; ?></title>
		<style>
			[class*="col-"] {
				
			}
			header {
				background-color: #DDD;
			}
			/* Style pour le footer */
			html {
				position: relative;
				min-height: 100%;
			}
			body {
				/* Taille du footer */
				margin-bottom: 60px;
			}
			.footer {
				position: absolute;
				bottom: 0;
				width: 100%;
				height: 60px;
				/* Taille du footer */
				padding-top: 20px;
				background-color: #DDD;
			}
		</style>
	</head>
	<body>	
		<div class="container-fluid">
			<div class="row">
				<header class="col-lg-12 text-center">
					<h1><a href="./index.php">Bouncing Cat</a></h1>
				</header>
			</div>
			
			<div class="row">
				<div class="col-lg-3">
					<nav class="col-lg-12">
						<?php require VIEW_PATH.'utilisateur'.DS.'viewConnectUtilisateur.php'; ?>
						<hr />
						<ol> 
							<?php if (Session::is_user('admin')) echo "<li><a href='./?&action=all&controller=utilisateur'>Liste utilisateurs</a></li>";?>
							<li><a href="./?&action=all&controller=game">Liste jeux</a>
								<ul><?php jeux($jeux) ?></ul>
							</li>
							<li><a href="./?&action=all&controller=score">Scores</a></li>
						</ol>
					</nav>
					<aside class="col-lg-12">
						<p class="text-center">PUB</p>
					</aside>
				</div>

				<div id="jeu" class="parent col-lg-6">	
					<?php
						require VIEW_PATH.$controller.DS.'view'.ucfirst($view).ucfirst($controller).'.php';
					?>
				</div>
				
				<div class="col-lg-3">
					<aside id="classement" class="col-lg-12">
						<?php
							$action="classement";
							require ROOT . DS . 'controller' . DS . 'ControllerGame.php';
						 ?>
					</aside>
					<aside class="col-lg-12">
						<p class="text-center">PUB</p>
					</aside>
				</div>			
		</div>
		<div class="row">
			<footer class="footer text-center">
					<p>Copyright BouncingTeam</p>
			</footer>
		</div>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="CSS/dist/js/bootstrap.min.js"></script>
	</body>
</html>
