<?php
function top10g($tu) {
	foreach ($tu as $u) {
		$id = $u->id;
		$l = $u->login;
		$s = $u->score;
		
		echo "<li title=$id><strong>$l</strong> : $s</li>";
	}
}
?>
		<!-- Une variable $tab_util est donnée -->	
			<h2>Top 10 Général</h2>
			<ol>
			<?php top10g($tab_util); ?>
			</ol>

