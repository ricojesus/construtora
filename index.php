<?php

error_reporting(-1);
ini_set('display_errors', 1);

require "vendor/autoload.php";

use \Slim\App;
use Notas\page;
use Notas\Model\User;
use Notas\Model\Nota;
use Notas\Model\Cliente;
use \local\Model;
use Notas\controllers;

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

	header("location: /clientes");
	exit;
});


$app->run();

?>