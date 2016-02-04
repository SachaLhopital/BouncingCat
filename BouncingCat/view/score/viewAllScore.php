<?php
function view1($tu) {  
	foreach ($tu as $u) {
		$l = $u->login;
		$id = $u->id;
		$s = $u->score;
		$d = $u->date;
		
		
		echo <<< EOT
		<TR> 
 			<TH> $l </TH> 
 			<TD> $s </TD> 
 			<TD> $id </TD> 
 			<TD> $d </TD> 
 		</TR> 
EOT;
	}

}
?>

			<TABLE BORDER="1" style="width: 100%"> 
                          <CAPTION> Liste des scores </CAPTION> 
 				<TR> 
 				<TH> Joueur </TH> 
 				<TH> Points </TH> 
 				<TH> Jeu </TH> 
 				<TH> Date </TH> 
 				 </TR> 
  				 <?php view1($tab_util); ?>
			</TABLE>
			
			<?php if(Session::is_user("admin")){ echo "<p><a href='?action=create&controller=score'>Ajouter un score</a></p>";} ?>
			
