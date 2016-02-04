<?php
function ajoue($aj) {
if ($aj!=null)
echo "Il a déja joué à : <ul>";
	foreach ($aj as $u) {
	$id = $u->id;
	$sc= $u ->score;

	echo "<li>$id , $sc points <a href='?action=read&controller=game&id=$id'>Voir</a></li>";
	}
echo "</ul>";

}

function view1($u,$aj) {
	$l = $u->login;
	$n = $u->nom;
	$p = $u->prenom;
	$e = $u->email;

	echo "Sous le login $l se trouve l'utilisateur $p $n dont l'email est $e."; 
	ajoue($aj);
	
	if( Session::is_user($l) || Session::is_user('admin')) {
		echo <<<EOT
		<p>
			<a href='?action=update&controller=utilisateur&login=$l'>Mettre à jour</a>, <a onclick="return (confirm('Etes vous sur?'));" href='?action=delete&controller=utilisateur&login=$l'>Supprimer</a>
		</p>
EOT;
	}
}
?>
	
		<?php view1($u,$aj); ?>
	
		<p>
			Retour à la <a href="./index.php">page principale</a>.
		</p>
		
