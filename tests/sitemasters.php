<?php

$research = new Research('Lightweight random');

$research->addTest(new Test('Martijn 1', function() {
    if(time()%2==0){echo 'a';}else{echo'b';}
}));

$research->addTest(new Test('UpLink', function() {
    echo substr('ab',rand(0,1),1);
}));

$research->addTest(new Test('koosax', function() {
    $a=array('a','b');
    echo $a[array_rand($a)];
}));

$research->addTest(new Test('Martijn 2', function() {
    $a=array('a','b');
    echo current(shuffle($a));
}));

$research->addTest(new Test('Pieter', function() {
    echo (mt_rand(6,7)===6)?'a':'b';
}));

$research->addTest(new Test('Wouter', function() {
    echo (mt_rand(0,1)&&print'a')||print'b';
}));

$research->addTest(new Test('Martijn 3', function() {
    echo uniqid()%2===0?'a':'b';
}));

$research->addTest(new Test('vinTage', function() {
    echo (mt_rand()&1&&print'a')||print'b';
}));

$research->runTests();
