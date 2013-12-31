<?php

function stripSlashesDeep($value) {
	$value = is_array($value) ? array_map('stripSlashesDeep', $value) : stripslashes($value);
	return $value;
}

function removeMagicOuotes() {
	if (get_magic_quotes_gpc()) {
		$_GET = stripSlashesDeep($_GET);
		$_POST = stripSlashesDeep($_POST);
		$_COOKIE = stripSlashesDeep($_COOKIE);
	}
}

function unregisterGlobals() {
	if (ini_get('register_globals')) {
		$array = array('_SESSION', '_POST', '_GET', '_COOKIE', '_REQUEST', '_SERVER', '_ENV', '_FILES');
		foreach ($array as $array) {
			foreach ($GLOBALS[$value] as $key => $var) {
				if ($var == $GLOBALS[$key]) {
					unset($GLOBALS[$key]);
				}
			}
		}
	}
}

function callHook() {
	global $url;

	$urlArray = array();
	$urlArray = explode("/", $url);

	$controller = $urlArray[0];
	array_shift($urlArray);
	$action = $urlArray[0];
	array_shift($urlArray);
	$queryString = $urlArray[0];

	$controllerName = $controller;
	$controller = ucwords($controller);
	$model =  rtrim($controller, "s");
	$controller .= 'Controller';
	$dispatch = new $controller($model, $controllerName , $action);

	if ((int)method_exists($controller, $action)) {
		call_user_func_array(array($dispatch,$action), $queryString);
	} else {
		throw new Exception('<b stle="color: red;">Controller or action not found</b>');	
	}
}

function __autoload($className) {
	//Do not forgett to add the api
	if (file_exists(ROOT . DS . 'library' . DS . 'core' . DS strtolower($className) . '.class.php')) {
        require_once(ROOT . DS . 'library' . DS .'core' . DS strtolower($className) . '.class.php');
    } else if (file_exists(ROOT . DS . 'application' . DS . 'controllers' . DS . strtolower($className) . '.php')) {
        require_once(ROOT . DS . 'application' . DS . 'controllers' . DS . strtolower($className) . '.php');
    } else if (file_exists(ROOT . DS . 'application' . DS . 'models' . DS . strtolower($className) . '.php')) {
        require_once(ROOT . DS . 'application' . DS . 'models' . DS . strtolower($className) . '.php');
    } else {
        /* Error Generation Code Here */
    }
}

setReporting();
removeMagicQuotes();
unregisterGlobals();
callHook();
