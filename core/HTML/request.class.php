<?php
/**
 * @author Flavio Kleiber <flavio@swagpeople.ch>
 * @copyright Flavio Kleiber, swagpeople.ch (c) 2014
 *
 * This is the Request class
 **/

class Request {

	public static function redirect($page) {
		header('Location:http://localhost/bread_framework/'.$page);
	}

    public static function getParams($key) {
        return $_POST[$key];
    }

    public static function getLang() {
       return strtoupper(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2));
    }
}
