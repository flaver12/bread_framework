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
	new Lesscompiler();
	new Logger();
	$url = explode('/', $url);
	if (empty($url[0])) {
		$controller = "indexs";
		$action = "index";
		/**UGLY HACK**/
		$test1 = array('handi' => 'hansi');
		$queryString = $test1;
	} else {
		$controller = $url[0];
		$action = $url[1];
		if(empty($url[2])) {
			/**UGLY HACK**/
			$test1 = array('handi' => 'hansi');
			$queryString = $test1;
		} else {
			$queryString = $url[2];
		}
	}
	$controllerName = $controller;
	$controller = ucwords($controller);
	$controller .= 'Controller';

	$dispatch = new $controller($controllerName, $action);
	if((int)method_exists($controller, $action)) {
		call_user_func_array(array($dispatch, $action), $queryString);
	} else {
		throw new Exception("Class $controller coundt bee load");
	}
}

function __autoload($className) {
    if (file_exists(ROOT . '/core/Auth/' . strtolower($className) . '.class.php')) {
        require_once(ROOT . '/core/Auth' . strtolower($className) . '.class.php');
    } elseif (file_exists(ROOT . '/core/Compiler/' . strtolower($className) . '.class.php')) {
    	require_once(ROOT . '/core/Compiler/' . strtolower($className) . '.class.php');
    } elseif (file_exists(ROOT . '/core/DB/' . strtolower($className) . '.class.php')) {
    	require_once(ROOT . '/core/DB/' . strtolower($className) . '.class.php');
    } elseif (file_exists(ROOT . '/core/Exporter/' . strtolower($className) . '.class.php')) {
    	require_once(ROOT . '/core/Exporter/' . strtolower($className) . '.class.php');
    } elseif (file_exists(ROOT . '/core/Logger/' . strtolower($className) . '.class.php')) {
    	require_once(ROOT . '/core/Logger/' . strtolower($className) . '.class.php');
    } elseif (file_exists(ROOT . '/core/Mail/' . strtolower($className) . '.class.php')) {
    	require_once(ROOT . '/core/Mail/' . strtolower($className) . '.class.php');
    } elseif (file_exists(ROOT . '/core/PDF/' . strtolower($className) . '.class.php')) {
    	require_once(ROOT . '/core/PDF/' . strtolower($className) . '.class.php');
    } elseif (file_exists(ROOT . '/application/controllers/' . strtolower($className) . '.php')) {
    	require_once(ROOT . '/application/controllers/' . strtolower($className) . '.php');
    } elseif (file_exists(ROOT . '/core/' . strtolower($className) . '.class.php')) {
    	require_once(ROOT . '/core/' . strtolower($className) . '.class.php');
    } elseif (file_exists(ROOT . '/core/Cache/' . strtolower($className) . '.class.php')) {
    	require_once(ROOT . '/core/Cache/' . strtolower($className) . '.class.php');
    } else {
       throw new Exception("$className condt bee load, do you create it?");
    }
    //var_dump($className);
}
$breadcache = new Cache();
ErrorReporting();
callHook();
