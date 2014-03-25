<?php
/**
 * @author Flavio Kleiber <flavio@swagpeople.ch>
 * @copyright Flavio Kleiber, swagpeople.ch (c) 2014
 *
 * This is the Request class
 **/

class Request {

	public static function redirect($controller, $action='index', $query) {
		$host = $_SERVER['HTTP_HOST'];
 		$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		header("Location:http://$host$uri/$controller/$action/$query");
	}

    public static function getParams($key) {
        return $_POST[$key];
    }

    public static function getLang() {
       return strtoupper(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2));
    }

    public static function route($route) {
        $host = $_SERVER['HTTP_HOST'];
        $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        header("Location:http://$host$uri/$route");
    }
}
