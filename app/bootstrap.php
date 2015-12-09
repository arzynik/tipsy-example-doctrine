<?php

error_reporting(E_ALL ^ (E_NOTICE | E_STRICT));
ini_set('display_errors',true);

require_once __DIR__ . '/../vendor/autoload.php';

\Tipsy\Tipsy::config();
\Tipsy\Tipsy::config(__DIR__.'/config.ini');

if (getenv('DATABASE_URL')) {
	\Tipsy\Tipsy::config([db => [url => getenv('DATABASE_URL')]]);
}
