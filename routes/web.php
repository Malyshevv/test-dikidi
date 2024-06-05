<?php

use App\Controllers\Home\HomeController;
use App\Controllers\Auth\AuthController;
use App\Controllers\FileManager\FileManagerController;

use Slim\Factory\AppFactory;
use DI\Container;
use Slim\Views\PhpRenderer;

$container = new Container();
AppFactory::setContainer($container);

$container->set('view', function () {
	return new PhpRenderer('../view/');
});

$container->get('view')->setLayout('../view/layout.php');

$app = AppFactory::create();
$app->addErrorMiddleware(true, true, true);

$app->get('/', [HomeController::class, 'index']);
$app->get('/login', [AuthController::class, 'index']);
$app->get('/file-manager', [FileManagerController::class, 'index']);

$app->run();