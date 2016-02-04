<?php
	if(!empty($_SESSION['log'])) {
						echo "<p>Vous etes connecté en tant que ".$_SESSION['log']."<p>";
						echo '<a href="?controller=utilisateur&action=deconnect" class="btn btn-sm btn-default">Se déconnecter</a>';
					} 
	else {
	echo <<<EOT
		
		<form class="form-horizontal" id="connexion" method="get" action="./index.php">
		<fieldset>

		<!-- Form Name -->
		<legend>Connexion</legend>

		<!-- Text input-->
		<div class="form-group">
			<label class="col-md-4 control-label" for="login">Login</label>  
			<div class="col-md-5">
				<input name="log" placeholder="" class="form-control input-md" required="" type="text">

			</div>
		</div>

		<!-- Password input-->
		<div class="form-group">
			<label class="col-md-4 control-label" for="mdp">Mot de passe</label>
			<div class="col-md-5">
				<input name="mdp" placeholder="" class="form-control input-md" required="" type="password">

			</div>
		</div>
		
		<input type="hidden" name="action" value="connected" />
		<input type="hidden" name="controller" value="utilisateur" />
		
		<!-- Button -->
		<div class="form-group">
			<div class="col-md-4">
				<button class="btn btn-default" type="submit">Se connecter</button>
			</div>
		</div>
		
		<!-- Help Block -->
		<p class="help-block"><a href="?controller=utilisateur&action=create">Pas encore inscrit ?</a></p>
		
		</fieldset>
		</form>
			
EOT;
}
?>
