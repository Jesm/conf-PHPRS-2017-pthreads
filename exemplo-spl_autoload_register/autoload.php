<?php

function class_autoload($class){
	$path = __DIR__ . '/classes/' . $class . '.php';
	if(file_exists($path))
		require $path;
}

spl_autoload_register('class_autoload');
