<?php

require 'lib/main.php';

?>
<!doctype html>
<html lang=nl>
<head>
	<link rel="stylesheet" type="text/css" href="assets/css/default.css">
	<meta charset=utf-8>
	<title>Welcome at PHPbench</title>
</head>
<body>
	<nav>
		<img src="assets/images/logo-small.png" alt="PHPbench">

		<h1>PHPbench</h1>

		<ul>
			<li>
				<a href="?addTest">Toevoegen</a>
			</li>
			<li><a>Tests</a>
				<ul>
					<?php $i =0; foreach( glob(ROOT.'tests/*.php') as $test ) :
							$test = basename($test, '.php');
							if( ++$i > 10 )
								break;
					 ?>
						<li><a href="<?php echo '?test='.$test; ?>"><?php echo str_replace('-', ' ', $test); ?></a></li>
					<?php endforeach; ?>
				</ul>
			</li>
		</ul>
	</nav>

	<div id="page-wrap">
		<?php
			if( isset($_GET['test']) && file_exists(ROOT.'tests/'.$_GET['test'].'.php') ) 
			{
				require ROOT.'tests/'.$_GET['test'].'.php';
				require LIB.'views/results.php';
			}
			elseif( isset($_GET['addTest']) )
				require LIB.'views/addTest.php';
			else
				require LIB.'views/default.php';
		?>
	</div>