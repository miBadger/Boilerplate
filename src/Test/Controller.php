<?php

	namespace ProjectNamespace\Website\Test;

	use miBadger\Mvc\ControllerInterface;
	use miBadger\Mvc\View;

	class Controller implements ControllerInterface
	{
		public function index()
		{
			return View::get(__DIR__ . '/index.php', ['title' => 'Welcome!']);
		}
	}

?>
