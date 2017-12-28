<?php

error_reporting(-1);
ini_set('display_errors', 1);

require "vendor/autoload.php";

use \Slim\App;
use \local\Model;
use Construtora\page;
use Construtora\Model\User;
use Construtora\Model\Nota;
use Construtora\Model\Cliente;
use Construtora\Model\Usuario;
use Construtora\Model\Construtora;
use Construtora\controllers;

$config = [
    'settings' => [
        'displayErrorDetails' => true # change this <------
    ],
];

$app = new App($config);

$app->get('/', function () {

	$page = new Page();
	$page->setTpl("index");

});

$app->get('/clientes', function () {

	$clientes = Cliente::listAll();

	$page = new Page();
	$page->setTpl("clientes-list", array(
		"clientes"=>$clientes
	));

});

$app->get('/clientes/{id}', function ($request, $response, $args) {

	$cliente = new Cliente();

	$cliente->get((int)$args['id']);

	$page = new Page();
	$page->setTpl("clientes-edit", array(
		"cliente"=>$cliente->getValues()
	));
});


$app->post('/clientes/{id}', function ($request, $response, $args) {

	$cliente = new Cliente();

	$cliente->get((int)$args['id']);	
	$cliente->setData($_POST);

	$cliente->save();

	header("location: /cliente/clientes");
	exit;
});


$app->get('/construtoras', function () {

	$construtoras = Construtora::listAll();

	$page = new Page();
	$page->setTpl("construtoras-list", array(
		"construtoras"=>$construtoras
	));

});


$app->get('/construtoras/{id}', function ($request, $response, $args) {

	$construtora = new Construtora();

	$construtora->get((int)$args['id']);

	$page = new Page();
	$page->setTpl("construtoras-edit", array(
		"construtora"=>$construtora->getValues()
	));
});


$app->post('/construtoras/{id}', function ($request, $response, $args) {

	$construtora = new Construtora();

	$construtora->get((int)$args['id']);	
	$construtora->setData($_POST);

	$construtora->save();

	header("location: /construtora/construtoras");
	exit;
});

$app->get('/usuarios', function () {

	$usuarios = Usuario::listAll();

	$page = new Page();
	$page->setTpl("usuarios-list", array(
		"usuarios"=>$usuarios
	));

});

$app->get('/usuarios/{id}', function ($request, $response, $args) {

	$usuario = new Usuario();

	$usuario->get((int)$args['id']);

	$page = new Page();
	$page->setTpl("usuarios-edit", array(
		"usuarios"=>$usuario->getValues()
	));
});


$app->post('/usuarios/{id}', function ($request, $response, $args) {

	$usuario = new Usuario();

	$usuario->get((int)$args['id']);	
	$usuario->setData($_POST);

	$usuario->save();

	header("location: /construtora/usuarios");
	exit;
});

$app->run();

?>