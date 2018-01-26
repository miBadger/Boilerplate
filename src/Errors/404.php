<?php

	use miBadger\Mvc\View;

	echo View::get(__DIR__ . '/../Template/Header.php', ['title' => 'Page not found']);

?>

<h1>
	Page not found
</h1>

<p>
	Oh noes! Error 404, page not found.
</p>

<?php

	echo View::get(__DIR__ . '/../Template/Footer.php');

?>