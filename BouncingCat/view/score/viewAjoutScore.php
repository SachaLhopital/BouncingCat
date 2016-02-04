<?php
function view1($tu) {
	foreach ($tu as $u) {
		$id = $u->id;
		
		echo <<< EOT
		<option value="$id">$id </option>;
EOT;
		
	}
}
?>


		<form method="get" action="">
			<fieldset>
				<legend>Ajouter un score</legend>
				<p>
					<label for="login">Login du joueur</label> :
					<input type="text" placeholder="svettel" name="login" id="id_login" required/>
				</p>
				<select name="id" id="id_id" required>
					<?php view1($tab_util); ?>
				</select>
				
				
				
				<p>
					<label for="score">Score</label> :
					<input type="int" placeholder="14" name="score" id="id_score" required/>
				</p>
				<input type="hidden" name="action" value="created" />
				<input type="hidden" name="controller" value="score" />				
				<p>
					<input type="submit" value="Ajouter un score" />
				</p>
			</fieldset>
		</form>
