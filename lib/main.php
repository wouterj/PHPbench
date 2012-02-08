<?php

chdir('lib');
define('LIB', getcwd().'\\');
chdir('..');
define('ROOT', getcwd().'\\');

chdir(LIB);

function __autoload( $name )
{
	chdir(LIB);

	if( is_dir(strtolower($name)) )
	{
		chdir($name);
		if( file_exists(strtolower($name).'.php') )
		{
			require_once strtolower($name).'.php';
		}
	}
}

function array_gem( $arr )
{
	return (array_sum($arr) / count($arr));
}
