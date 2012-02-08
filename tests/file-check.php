<?php

$research = new Research('file check if exists');

$research->addTest( new Test( 'file_exists( $file )', function() {
	if( file_exists('hello.php') )
		file_get_contents('hello.php');
}) );

$research->addTest( new Test('is_file( $file )', function() {
	if( is_file('hello.php') )
		file_get_contents('hello.php');
}) );

$research->addTest( new Test('without', function() {
	@file_get_contents('hello.php');
}) );

$research->runTests();