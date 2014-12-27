<?php

define('URL', 'http://localhost/trem');
define('JS', URL.'/js');
define('CSS', URL.'/css');
define('IMG', URL.'/img');



include 'template/header.php';

$uri = $_SERVER['REQUEST_URI'];
$array_uri = explode('/', $uri);

$page = $array_uri[2];
if ($page == '') {
	$page = 'home';
}

if ( file_exists('template/'.$page.'.php') ) {
	include 'template/'.$page.'.php';
} 
else {
	include 'template/404.php';
}

include 'template/footer.php'; 

?>