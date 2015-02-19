<?php
/*
define('URL', 'http://localhost/trem');
define('JS', URL.'/js');
define('CSS', URL.'/css');
define('IMG', URL.'/img');


require 'vendor/autoload.php';
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
*/
require 'vendor/autoload.php';
require 'src/include/ApiTrem.php';

$app = new \Slim\Slim();
$app->response->headers->set('Content-Type', 'application/json');

$app->get('/', function () use ($app) {
	$api = new ApiTrem;

	echo json_encode($api->converterArrayParaJson($api->gerarListaImagensAleatorias(10)));
    $app->render('home.php'); 
});

$app->get('/adicione', function () use ($app) {
    $app->render('adicione.php');
});

$app->get('/busca', function () use ($app) {
    $app->render('busca.php');
});

$app->get('/footer', function () use ($app) {
    $app->render('footer.php');
});

$app->get('/header', function () use ($app) {
    $app->render('header.php'); 
});

$app->get('/pegue-o-trem', function () use ($app) {
	$api = new ApiTrem;

	echo json_encode($api->linhaTremParaJson($api->carregarLinhaTrem(10)));
    $app->render('pegue-o-trem.php'); 
});

$app->get('/sobre', function () use ($app) {
    $app->render('sobre.php'); 
});

$app->notFound(function () use ($app) {
    $app->render('404.php');
});

$app->run();

?>