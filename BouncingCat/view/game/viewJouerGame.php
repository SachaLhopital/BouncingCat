<?php
function view1($u) {
	$id = $u->id;	
	require "./jeuxHTML/$id.php";

}
view1($tab_util);
?>

<a href= "./index.php">Retour à l'accueil</a>

