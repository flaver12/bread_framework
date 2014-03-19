<?php
/**
 * @author Flavio Kleiber <flavio@swagpeople.ch>
 * @copyright Flavio Kleiber, swagpeople.ch (c) 2014
 *
 * This is the Indexfile,
 * do only changes here when you know what you are doing!
 */
$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
define('APPLICATION_PATH', $uri);
define('ROOT', dirname(__FILE__));
$url = isset($_GET['url']) ? $_GET['url'] : NULL;

require_once(ROOT . '/core/bootstrap.php');
