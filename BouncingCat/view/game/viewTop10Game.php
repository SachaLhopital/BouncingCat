<?php
function top10($tu) {
	foreach ($tu as $u) {
		$id = $u->id;
		$l = $u->login;
		$s = $u->score;
		echo "<li><strong>$l</strong> $s</li>";
	}
}
?>

			<h2>Top 10 de <?php echo $_GET['id']; ?></h2>
			<ol>
			<?php top10($tab_util); ?>
			</ol>

