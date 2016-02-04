<?php

function view1($g) {
	$id = $g->id;
	$d = $g->descript;

	echo <<<EOT
	<h2>$id</h2>
	<p>$d</p>
EOT;

	if(!Session::is_user('admin')){
		if($id<>'CatDefend'){
				echo "<a href='?action=jouer&controller=game&id=$id' target='blank'> Jouer</a></li>";
			}
			else {
				echo "<a href='../testJeu/index.html'target='blank'> Jouer</a></li>";
			}
	}
}
?>

<?php view1($g); ?>		
