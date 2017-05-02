<?php

require __DIR__ . '/vendor/autoload.php';

$file_path = __DIR__ . '/app.log';
$test1 = new ThreadExample\Test($file_path, 'Foo');
$test2 = new ThreadExample\Test($file_path, 'Bar');

$test1->start();
$test2->start();

$test1->join();
$test2->join();
