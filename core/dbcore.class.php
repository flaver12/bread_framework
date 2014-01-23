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

	/**
	 * Send a query to the database
	 * @param  String $q 
	 * @return Array or NULL
	 */
	public function sendQuery($q = NULL) {
		if (!isset($q)) {
			throw new Exception("Empty query string");
		}
		$result = mysql_query($q);
		if (empty($result)) {
			return NULL;
		} else {
			while ($all = mysql_fetch_assoc($result)){
				$all_arr[]=$all;
			}
			return $all_arr;
		}
	}
}