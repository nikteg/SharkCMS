<?php

require 'libs/Mustache/Autoloader.php';
Mustache_Autoloader::register();

function template_engine($directory = '/templates', $extension = '.m') {
	global $m;
	
	$m = new Mustache_Engine(array(
		'loader' => new Mustache_Loader_FilesystemLoader(dirname(__FILE__) . $directory, array('extension' => $extension))
	));
}

?>