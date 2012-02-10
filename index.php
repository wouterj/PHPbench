<?php

require_once 'lib/markdown/markdown.php';

?>
<!doctype html>
<html lang=nl>
<head>
	<link rel="stylesheet" type="text/css" href="assets/css/default.css">
	<meta charset=utf-8>
	<title><?php if(isset($_GET['title'])) : echo ucwords(str_replace('-', ' ', $_GET['title'])); ?> :: PHPbench Documentatie <?php else : ?>PHPbench - A benchmark libary for PHP<?php endif; ?></title>
</head>
<body>
	<header style="padding-top: 50px;">
		<img src="assets/images/logo-big.png">
		<h1><a href="?">PHPbench</a></h1>
	</header>

	<div id="content">
		<?php if(!isset($_GET['title'])) { $home = true; $_GET['title'] = 'home'; } else $home=false; ?>
		<h2>Documentatie :: <?php echo ucwords(str_replace('-', ' ', $_GET['title'])); ?></h2>

		<?php echo Markdown(file_get_contents('docs'.DIRECTORY_SEPARATOR.$_GET['title'].'.markdown')); ?>
		<?php if( $home == true ) : ?>
			<br>
			<ul>
				<?php foreach( glob('docs/*.markdown') as $doc ) :
						$doc = basename($doc, '.markdown');
						if( $doc == 'home' ) continue; ?>
				<li><a href="?title=<?php echo $doc; ?>"><?php echo ucwords(str_replace('-', ' ', $doc)); ?></a></li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>
	</div>
