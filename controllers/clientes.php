<?php 

namespace Notas\Controllers;

use \Slim\App;


$app->get('/clientes', function () {

	//$clientes = Cliente::listAll();

	$page = new Page();
	$page->setTpl("clientes-list", array(
		"clientes" => null//$clientes
	));

});

$app->get('/clientes/{id}', function ($request, $response, $args) {

	$cliente = new Cliente();

	$cliente->get((int)$args['id']);

	$page = new Page();
	$page->setTpl("clientes-edit", array(
		"Cliente"=>$cliente->getValues()
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


 ?>