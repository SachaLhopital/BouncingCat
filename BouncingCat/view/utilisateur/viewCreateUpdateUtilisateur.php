<form class="form-horizontal">
	<fieldset>

		<!-- Form Name -->
		<legend><?php echo $pagetitle?></legend>

		<!-- Text input -->
		<div class="form-group">
			<label class="col-md-4 control-label" for="login">Login</label>  
			<div class="col-md-4">
				<input name="login" placeholder="" class="form-control input-md" required="" type="text" value="<?php if (isset($u)) echo $u->login; ?>" <?php if ($action == "update") echo "readonly"; ?>>

			</div>
		</div>

		<!-- Password input-->
		<div class="form-group">
			<label class="col-md-4 control-label" for="mdp">Mot de passe</label>
			<div class="col-md-4">
				<input name="mdp" placeholder="" class="form-control input-md" value="" required="" type="password">

			</div>
		</div>

		<!-- Password input-->
		<div class="form-group">
			<label class="col-md-4 control-label" for="mdpConfirm">Confirmation</label>
			<div class="col-md-4">
				<input name="mdpConf" placeholder="" class="form-control input-md" value="" required="" type="password">

			</div>
		</div>

		<!-- Text input-->
		<div class="form-group">
			<label class="col-md-4 control-label" for="nom">Nom</label>  
			<div class="col-md-4">
				<input name="nom" placeholder="" class="form-control input-md" required="" type="text" value="<?php if (isset($u)) echo $u->nom; ?>">

			</div>
		</div>

		<!-- Text input-->
		<div class="form-group">
			<label class="col-md-4 control-label" for="prenom">Prénom</label>  
			<div class="col-md-4">
				<input name="prenom" placeholder="" class="form-control input-md" required="" type="text" value="<?php if (isset($u)) echo $u->prenom; ?>">

			</div>
		</div>

		<!-- Text input-->
		<div class="form-group">
			<label class="col-md-4 control-label" for="email">Adresse Email</label>  
			<div class="col-md-4">
				<input name="email" placeholder="" class="form-control input-md" required="" type="email" value="<?php if (isset($u)) echo $u->email; ?>">

			</div>
		</div>

		<input type="hidden" name="action" value="<?php echo $action; ?>d" />
		<input type="hidden" name="controller" value="utilisateur" />				

		<!-- Button -->
		<div class="form-group">
			<label class="col-md-4 control-label" for="bouton"></label>
			<div class="col-md-4">
				<button id="bouton" name="bouton" class="btn btn-default"><?php echo $pagetitle?></button>
			</div>
		</div>

	</fieldset>
</form>

	
