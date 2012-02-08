<header>
	<img src="assets/images/logo-big.png">
	<h1>PHPbench</h1>
</header>
<div id="content">
	<h2>Testen</h2>
	<p>De tests die zijn aangemaakt zijn:
	<ul>
		<?php foreach( glob(ROOT.'tests/*.php') as $test ) :
				$test = basename($test, '.php'); ?>
		<li><a href="?test=<?php echo $test; ?>"><?php echo $test; ?></a></li>
		<?php endforeach; ?>
	</ul>
</div>