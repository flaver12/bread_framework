<?php
/**
 * @author Flavio Kleiber <flavio@swagpeople.ch>
 * @copyright Flavio Kleiber, swagpeople.ch (c) 2014
 *
 * This us the DBCORE class
 **/

class DBCore {
	protected $_dbHandler;
	protected $_result;

	function __construct() {
		$this->connect(DB_HOST, DB_USER, DB_PW, DB_DB);
	}

	protected function connect($host, $username, $pw, $db) {
		$this->_dbHandler = mysql_connect($host, $username, $pw);
		if (!$this->_dbHandler) {
			throw new Exception("Error! MYSQL say: ".  mysql_error());
		} else {
			if (mysql_select_db($db, $this->_dbHandler)) {
				return 1;
			} else {
				return 0;
			}
		}
	}

	protected function disconnect() {
		if (mysql_close($this->_dbHandler) !=0) {
			return 1;
		} else {
			return 0;
		}
	}
}