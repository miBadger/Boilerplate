<?php

	define('DEBUG', true);

	if (DEBUG) {
		ini_set('display_errors', 'On');
		ini_set('display_startup_errors', 'On');
		ini_set('error_reporting', -1);
	}

	ini_set('date.timezone', 'Europe/Amsterdam');
	ini_set('default_charset', 'UTF-8');
	mb_internal_encoding('UTF-8');

	require('vendor/autoload.php');

	use miBadger\Http\Session;
	use miBadger\Http\ServerResponseException;
	use miBadger\Router\Router;
	use miBadger\Settings\Settings;
	use miBadger\Mvc\View;

	use ProjectNamespace\Website\Test\Controller as TestController;


	Session::start();

	$router = new Router();

	$router->set('GET', '/', function () {
		return (new TestController())->index();
	});


	try
	{
		echo $router->resolve();
	}catch (ServerResponseException $exception)
	{
		if($exception->getServerResponse()->getStatusCode() == 404)
		{
			echo View::get(__DIR__ . '/src/Errors/404.php');
		}else{
			echo View::get(__DIR__ . '/src/Errors/generic.php', ['exception' => $exception]);
		}
	} catch (Exception $exception) {
		if(DEBUG)
		{
			echo View::get(__DIR__ . '/src/Errors/debug.php', ['exception' => $exception]);
		}else{
			echo View::get(__DIR__ . '/src/Errors/generic.php', ['exception' => $exception]);
		}
	}

