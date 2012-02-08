<?php

$research = new Research('Echo vs print');

$research->addTest( new Test('echo \'hello\'', function() {
	echo 'hello';
}) );

$research->addTest( new Test('print \'hello\'', function() {
	print 'hello';
}) );

$research->addTest( new Test('echo(\'hello\')', function() {
	echo('hello');
}) );

$research->addTest( new Test('print(\'hello\')', function() {
	print('hello');
}) );

$research->runTests();