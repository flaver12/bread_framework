<?php
/**
 * @author Flavio Kleiber <flavio@swagpeople.ch>
 * @copyright Flavio Kleiber, swagpeople.ch (c) 2014
 *
 * This us the DBCORE class
 **/

class DBCore {
	protected $_dbHandler;

    /**
     * Class constructor
     *
     * @return mixed
     */
    function __construct() {
        $dbConf = ConfigReader::read('database');
		$this->connect($dbConf['host'], $dbConf['username'], $dbConf['password'], $dbConf['database']);
	}

    /**
     * Make a connection to the database
     *
     * @param $host
     * @param $username
     * @param $pw
     * @param $db
     * @return int
     * @throws Exception
     */
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

    /**
     * Disconnect from a database
     *
     * @return int
     */
    protected function disconnect() {
		if (mysql_close($this->_dbHandler) !=0) {
			return 1;
		} else {
			return 0;
		}
	}
}