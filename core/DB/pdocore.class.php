<?php
/**
 * @author Flavio Kleiber <flavio@swagpeople.ch>
 * @copyright Flavio Kleiber, swagpeople.ch (c) 2014
 *
 * PDO CoreClass
 **/

class PDOCore {
	protected $_dbHandler;
	protected $_

	public function __construct() {
		$this->PDOConnect(DB_HOST, DB_USER, DB_PW, DB_DB);
	}

	protected function PDOConnect($host, $username, $pw, $db) {
		$connectionString = 'mysql:host='.$host.';dbname='.$db;
		$dbh = new PDO($connectionString, $username, $pw);
	}

	public function sendQuery($q) {
		$row = $dbh->query($q);
		return $row;
	}
}