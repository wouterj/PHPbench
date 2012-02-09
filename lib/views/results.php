<?php

$researchName = $research->getName();
$results = $research->getResults();
$times = $results['times'];
$perc = $results['percentages'];
$color = Array();

foreach( $times as $name => $time )
{
	$color[$name] = ((min($perc) + 15) >= $perc[$name]
									? 'green'
									: ((min($perc) + 30) >= $perc[$name]
										? 'orange'
										: 'red'));
}

?>
<div id=content>
	<div class=item>
		<h4><?php echo $researchName; ?></h4>
		<ul>
			<?php foreach( $times as $name => $time ) : ?>
			<li>
				<div class=<?php echo $color[$name]; ?>><?php echo $perc[$name]; ?></div>
				<p><?php echo $name; ?></p>
				<small>
					time: <?php echo round($time * 1E6); ?> &micro;s
				</small>
			</li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>
