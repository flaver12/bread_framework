<?php
class Errorhandler {

	function __construct() {
		$this->setReport();
	}

	private function setReport() {
		if (DEV_ENV == true) {
			error_reporting(E_ALL);
			ini_set('display_errors', 'On');
		} else {
			error_reporting(E_ALL);
			ini_set('display_errors', 'Off');
			ini_set('log_errors', 'On');
			ini_set('error_log', ROOT . DS . 'logs' . DS . 'error.log');
		}
	}
}