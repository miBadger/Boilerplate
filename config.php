<?php

use miBadger\Mvc\View;

/**
 * Debug
 */

define('DEBUG', false);

if (DEBUG) {
	ini_set('display_errors', 'On');
	ini_set('display_startup_errors', 'On');
	ini_set('error_reporting', -1);
}

/**
 * Timezone
 */

ini_set('date.timezone', 'Europe/Amsterdam');

/**
 * Charset
 */

ini_set('default_charset', 'UTF-8');
mb_internal_encoding('UTF-8');

/**
 * View base path
 */

View::setBasePath(__DIR__ . '/src/View/');
