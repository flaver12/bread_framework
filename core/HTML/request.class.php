<?php
/**
 * @author Flavio Kleiber <flavio@swagpeople.ch>
 * @copyright Flavio Kleiber, swagpeople.ch (c) 2014
 *
 * This is the Request class
 **/

class Request {

	public static function redirect($page) {
		
	}

    public static function getParams() {
        return $_POST;
    }

    public static function getLang() {
       return strtoupper(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2));
    }
}
