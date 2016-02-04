<?php
function view1($tu) {
	foreach ($tu as $u) {
		$l = $u->login;
		$n = $u->nom;
		$p = $u->prenom;
		$e = $u->email;
		
		// La syntaxe suivante permet de créer facilement des chaînes de caractères multi-lignes
		echo <<< EOT
		<li> Sous le login $l se trouve l'utilisateur $p $n dont l'email est $e.
			<a href='?action=read&controller=utilisateur&login=$l'> Détails </a>
		</li>
EOT;
	}
}
?>
		<!-- Une variable $tab_util est donnée -->	
		<div>
			<h2>Liste des utilisateurs:</h2>
			<ol>
			<?php view1($users); ?>
			</ol>
			<?php if (Session::is_user("admin")) {echo "<p><a href='?action=create&controller=utilisateur'>Créer un nouvel utilisateur</a></p>";} ?>
		</div>
