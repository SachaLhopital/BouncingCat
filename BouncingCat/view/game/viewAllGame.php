<?php
function view1($tu) {
	foreach ($tu as $u) {
		$id = $u->id;
		$d = $u->descript;

		echo "<br><li>$id : $d <a href='?action=read&controller=game&id=$id'>Voir</a>";
		if(!Session::is_user('admin')) { 
			if($id<>'CatDefend'){
				echo "<a href='?action=jouer&controller=game&id=$id' target='blank'> Jouer</a></li>";
			}
			else {
				echo "<a href='../testJeu/index.html'target='blank'> Jouer</a></li>";
			}
		
		} else {
			echo "</li>";
		}
	}
}

?>
			<h2>Liste des jeux:</h2>
			<ul>
			<?php view1($jeux); ?>
			</ul> 
			<?php
				if(Session::is_user('admin')){ echo "<p><a href='?action=create&controller=game'>Ajouter un jeu</a></p>";} 
			?>
