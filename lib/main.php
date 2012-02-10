<?php

chdir('lib');
define('LIB', getcwd().'\\');
chdir('..');
define('ROOT', getcwd().'\\');

chdir(LIB);

define('PHPbench_VERSION', '1.0');

function __autoload($className)
{
	$className = ltrim($className);
	$fileName = LIB;
	$namespaces = explode('\\', $className);

	$fileName .= implode(DIRECTORY_SEPARATOR, $namespaces).DIRECTORY_SEPARATOR.end($namespaces).'.php';

    require strtolower($fileName);
}
