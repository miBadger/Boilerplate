<?php

require('vendor/autoload.php');
require('config.php');

use miBadger\Boilerplate\Controller\HomeController;
use miBadger\Http\ServerResponseException;
use miBadger\Http\Session;
use miBadger\Mvc\View;
use miBadger\Router\Router;
use miBadger\Settings\Settings;

Session::start();

$router = new Router();

$router->set('GET', '/', function () {
	return (new HomeController())->indexAction();
});

try {
	echo $router->resolve();
} catch (ServerResponseException $exception) {
	if ($exception->getServerResponse()->getStatusCode() == 404) {
		echo View::get('404.php');
	} else {
		echo View::get('500.php');
	}
} catch (Exception $exception) {
	if (DEBUG) {
		echo View::get('Debug.php', ['exception' => $exception]);
	} else {
		echo View::get('500.php');
	}
}
