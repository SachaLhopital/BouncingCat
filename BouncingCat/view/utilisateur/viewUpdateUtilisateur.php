<?php
echo <<< EOT
		<form method="get" action="">
			<fieldset>
				<legend>Mettre à jour un utilisateur</legend>
				<p>
					<label for="login">Login du conducteur</label> :
					<input type="text" value="$l" name="login" id="id_login" readonly/>
				</p>
				<p>
					<label for="id_nom">Nom</label> :
					<input type="text" value="$n" name="nom" id="id_nom" required/>
				</p>
				<p>
					<label for="id_prenom">Prénom</label> :
					<input type="text" value="$p" name="prenom" id="id_prenom" required/>
				</p>
				<p>
					<label for="id_email">Email</label> :
					<input type="text" value="$e" name="email" id="id_email" required/>
				</p>
				<input type="hidden" name="action" value="updated" />
				<input type="hidden" name="controller" value="utilisateur" />				
				<p>
					<input type="submit" value="Mettre à jour" />
				</p>
			</fieldset>
		</form>
EOT
?>
