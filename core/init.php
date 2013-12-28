<?php
/**
 * init
 *
 * @author Flavio Kleiber flavio@swagpeople.ch
 * @copyright Informatik Atelie GmbH (c) 2013
 */

/**
 * This function makes the controller instances usw.
 * 
 * @return void
 * @throws error If a controller is not there or if a action is not there
 */
function callHook() {
	$url = REQUEST_URI;
	$urlArray = array();
	$url = preg_match('/\?.+$/i', $url);
	$urlArray = explode("/", $url);
	if (!count($urlArray)) {
		$urlArray[0] = "index";
		$urlArray[1] = "index";
	} elseif (count($urlArray) < 2) {
		$urlArray[1] = "index"; 
	}

	$controller = $urlArray[0];
	array_shift($urlArray);
	$action = $urlArray[0];
	array_shift($urlArray);
	$params = array_map('urldecode', $urlArray);

	$controllerName = $controller;
	$controller = ucwords($controller);
	$controller.='Controller';

	try {
		if (class_exists($controller)) {
			$dispatch = new $controller;
		} else {
			throw new Exception("Invalid call to non-existent class {$controller}.");
		}

		if (method_exists($dispatch, $action)) {
			call_user_func_array(array($dispatch,$action), $params);
		} else {
			throw new Exception("Invalid call to non-existent {$controller}::{$action}.");
		}
	} catch (Exception $e) {
		echo "<pre>" . $e->getMessage() . "</pre>";
	}
}

/**
 * [__autoload description]
 * @param  [type] $className [description]
 * @return [type]            [description]
 */
function __autoload($className) {
	if (file_exists(ROOT.'/core/'. strtolower($className). 'php')) {
		require_once(ROOT.'/core/'. strtolower($className). 'php');
	}
	if (file_exists(ROOT.'/core/library/'. strtolower($className). 'php')) {
		require_once(ROOT.'/core/library/'. strtolower($className). 'php');
	}
	if (file_exists(ROOT . '/application/controllers/' . strtolower(preg_replace("/controller/i", "", $className)) . '.php'))  {
		require_once(ROOT . '/application/controllers/' . strtolower(preg_replace("/controller/i", "", $className)) . '.php');
	}
	if (file_exists(ROOT . '/application/models/' . strtolower($className) . '.php')) {
		require_once(ROOT . '/application/models/' . strtolower($className) . '.php');
	}
}

try {
	callHook();
} catch(Exception $e) {
	echo $e->getMessage();
}