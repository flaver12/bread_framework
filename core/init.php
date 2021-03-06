<?php
/**
 * @author Flavio Kleiber <flavio@swagpeople.ch>
 * @copyright Flavio Kleiber, swagpeople.ch (c) 2014
 *
 * Init
 **/

/**
 * Set the error reporting
 *
 * @return void
 */
function ErrorReporting() {
	if ('DEV' == TRUE) {
		error_reporting(E_ALL);
		ini_set('display_errors', 1);
        ini_set('log_errors', 1);
        ini_set('error_log', ROOT.'/logs/error.log');
	} else {
		error_reporting(E_ALL);
		ini_set('display_errors', 'Off');
        ini_set('log_errors', 1);
		ini_set('error_log', ROOT.'/logs/error.log');
	}
}

/**
 * This is the nice little hacked callHook function
 *
 * @throws Exception
 * @return void
 */
function callHook() {
	global $url;
    $queryString = array();
    ob_start();
    if(LESS == true) {
        new Lesscompiler();
    }
    //new Logger();
	$url = explode('/', $url);
    $routes = App::checkRouts($url[0]);
    if (!empty($routes)) {
        $controller = $routes[0];
        $action = $routes[1];
        $emptyArr = array();
        $queryString[] = $emptyArr;
    } else {
        if (empty($url[0])) {
            $controller = "indexs";
            $action = "index";
            /**UGLY HACK**/
            $test1 = array('handi' => 'hansi');
            $queryString[] = $test1;
        } else {
            $controller = $url[0];
            $action = $url[1];
            if (empty($action)) {
                $action = "index";
            }
            if(empty($url[2])) {
                $emptyArr = array();
                $queryString[] = $emptyArr;
            } else {
                $queryString[] = $url[2];
            }
        }
    }
	$controllerName = $controller;
	$controller = ucwords($controller);
	$controller .= 'Controller';
	$dispatch = new $controller($controllerName, $action);
	if((int)method_exists($controller, $action)) {
		call_user_func_array(array($dispatch, $action), $queryString);
	} else {
		return false;
	}
}

/**
 * A amazing function !!!!<3
 *
 * @return void
 */
function session() {
	session_start();
}

/**
 * Class __autoloader but thx php is outdated
 *
 * @param $className
 * @throws Exception
 * @return void
 */
function __autoload($className) {
    if (file_exists(ROOT . '/core/Auth/' . strtolower($className) . '.class.php')) {
        require_once(ROOT . '/core/Auth/' . strtolower($className) . '.class.php');
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
    } elseif (file_exists(ROOT . '/core/HTML/' . strtolower($className) . '.class.php')) {
    	require_once(ROOT . '/core/HTML/' . strtolower($className) . '.class.php');
    } elseif (file_exists(ROOT . '/core/Formulator/' . strtolower($className) . '.class.php')) {
    	require_once(ROOT . '/core/Formulator/' . strtolower($className) . '.class.php');
    } elseif (file_exists(ROOT . '/core/Formulator/Fields/' . strtolower($className) . '.class.php')) {
    	require_once(ROOT . '/core/Formulator/Fields/' . strtolower($className) . '.class.php'); 
    } elseif (file_exists(ROOT . '/core/Alc/' . strtolower($className) . '.class.php')) {
    	require_once(ROOT . '/core/Alc/' . strtolower($className) . '.class.php');
    } elseif (file_exists(ROOT . '/application/helpers/' . strtolower($className) . '.php')) {
    	require_once(ROOT . '/application/helpers/' . strtolower($className) . '.php');
    } else {
       throw new Exception("$className condt bee load, do you create it?");
    }
    //var_dump($className);
}
session();
ErrorReporting();
callHook();
