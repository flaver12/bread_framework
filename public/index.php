<?php
define('ROOT', dirname(dirname(__FILE__)));
define('DS', DIRECTORY_SEPARATOR);
$url = $_GET['url'];
require_once(ROOT . DS . 'library' . DS . 'core' . DS . 'bootstrap.php');