<?php

define('URL', 'http://localhost/trem');
define('JS', URL.'/templates/js');
define('CSS', URL.'/templates/css');
define('IMG', URL.'/templates/img');


require 'vendor/autoload.php';
include 'templates/header.php';

$uri = $_SERVER['REQUEST_URI'];
$array_uri = explode('/', $uri);

$page = $array_uri[2];
if ($page == '') {
	$page = 'home';
}

if ( file_exists('templates/'.$page.'.php') ) {
	include 'templates/'.$page.'.php';
} 
else {
	include 'templates/404.php';
}

include 'templates/footer.php'; 



require 'vendor/autoload.php';
require 'src/include/ApiTrem.php';

// Carrega o namespace Slim
use Slim\Slim;

$app = new Slim();

// Definicao de rotas
$app->get('/','carregarImagensHome');
$app->get('/adicione', function () {});
$app->get('/busca', function () {});
$app->get('/locais/:id','carregarEstabelecimento');
$app->get('/eventos/:id','carregarEvento');
$app->get('/footer', function () {});
$app->get('/header', function () {});
$app->get('/pegue-o-trem', 'carregarLinhaTrem');
$app->get('/sobre', function () {});
$app->notFound(function () {});

$app->post('/adicione', 'adicionarConteudo');

$app->run();

function adicionarConteudo($json) {
	$api = new ApiTrem;
	$app = Slim::getInstance();
	$app->contentType('application/json');
}

function carregarLinhaTrem() {
	$api = new ApiTrem;
	$app = Slim::getInstance();
	$app->contentType('application/json');
	echo json_encode($api->converterLinhaTremParaJson($api->carregarLinhaTrem(10)));
}

function carregarImagensHome() {
	$api = new ApiTrem;
	$app = Slim::getInstance();
	$app->contentType('application/json');
	echo json_encode($api->converterArrayParaJson($api->gerarListaImagensAleatorias(10)));
}

function carregarEstabelecimento($id) {
	$api = new ApiTrem;
	$app = Slim::getInstance();
	$app->contentType('application/json');
	echo json_encode($api->converterAtracaoParaJson($api->carregarEstabelecimento($id)));
}

function carregarEvento($id) {
	$api = new ApiTrem;
	$app = Slim::getInstance();
	$app->contentType('application/json');
	echo json_encode($api->converterAtracaoParaJson($api->carregarEvento($id)));
}



?>