<?php
/**
 * @author Flavio Kleiber <flavio@swagpeople.ch>
 * @copyright Flavio Kleiber, swagpeople.ch (c) 2014
 *
 * Init
 **/

/**
 * Set the Errorreporting
 *
 * @return void
 */
function ErrorReporting() {
	if ('DEV' == TRUE) {
		error_reporting(E_ALL);
		ini_set('display_errors', 'On');
	} else {
		error_reporting(E_ALL);
		ini_set('display_errors', 'Off');
		ini_set('error_log', ROOT.'/logs/error.log');
	}
}

function callHook() {
	global $url;
	$url = explode('/', $url);
	if (empty($url[0])) {
		//$url[0] = 'index';
		//$url[1] = 'index';
	}

	$controller = $url[0];
	$action = $url[1];
	$queryString = $url[2];
	$controllerName = $controller;
	$controller = ucwords($controller);
	$model = rtrim($controller, 's');
	$controller .= 'Controller';

	$dispatch = new $controller($model, $controllerName, $action);
	if((int)method_exists($controller, $action)) {
		call_user_func_array(array($dispatch, $action), $queryString);
	} else {
		throw new Exception("Class $controller coundt bee load");
	}
}

function __autoload($className) {
    if (file_exists(ROOT . '/core/' . strtolower($className) . '.class.php')) {
        require_once(ROOT . '/core/' . strtolower($className) . '.class.php');
    } else {
        die('Error');
    }
}

ErrorReporting();
callHook();