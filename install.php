<?php

// korv

require 'template_engine.php';
template_engine('/templates/install'); // $m = new Mustache_Engine

$complete = false;

if (isset($_GET['complete']) && file_exists('config.php')) {
	$complete = true;
}

// Form elements
$form_elements = array('sitename', 'adminuser', 'adminpassword', 'dbuser', 'dbpassword', 'dbname', 'dbhost', 'install');
$form_elements = array_combine($form_elements, $form_elements);

// When the install form has been sent
if (isset($_POST[$form_elements['install']])) {
	echo $_POST[$form_elements['sitename']];
	
	
	// Install has been completed
	header('Location: install.php?complete&variable=' . $_POST[$form_elements['sitename']]);
}

// Load the installer index template
$tpl = $m->loadTemplate('index'); // loads __DIR__ . '/templates/install/index.m';
echo $tpl->render(array(
	'lang' => 'en-US',
	'charset' => 'utf-8',
	'title' => 'Reograf Installer',
	'form_elements' => $form_elements,
	'complete' => $complete
));

?>