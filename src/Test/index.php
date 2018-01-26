<?php

	use miBadger\Mvc\View;

	echo View::get(__DIR__ . '/../Template/Header.php', ['title' => $title]);

?>

Hello world

<?php

	echo View::get(__DIR__ . '/../Template/Footer.php');

?>
