<?php
/**
 * @author Flavio Kleiber <flavio@swagpeople.ch>
 * @copyright Flavio Kleiber, swagpeople.ch (c) 2014
 *
 * This is the default Model
 **/

class Model extends DBCore {
	protected $_model;

	function __construct() {
		//CHANGE ME!
		$this->connect(DB_HOST, DB_USER, DB_PW, DB_DB);
		$this->_model = get_class($this);
		$this->_table = strtolower($this->_model)."s";
	}

	function __destruct(){}
}