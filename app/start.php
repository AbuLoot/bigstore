<?php

header('Content-Type: text/html; charset=utf-8');

session_start();

ini_set('display_errors', 'On');

define('APP_ROOT', __DIR__);
define('BASE_URL', 'http://bigstore');
define('VIEW_ROOT', APP_ROOT . '/views');

$db = new PDO('mysql:host=localhost;dbname=bigstore', 'bigstore_user', 'secret');

require 'functions.php';
