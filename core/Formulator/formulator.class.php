<?php
/**
 * @author Flavio Kleiber <flavio@swagpeople.ch>
 * @copyright Flavio Kleiber, swagpeople.ch (c) 2014
 *
 * Main Formulator class
 **/

class Formulator {

	/**
	 * Formname
	 * 
	 * @var string
	 * @access protected
	 */
	protected $_formName = '';

	/**
	 * Class constructor
	 * 
	 * @param String $name
	 * @return void
	 */
	public function __construct($name) {
		if (empty($name)) {
			throw new Exception("Formname can not be empty");
		} else {
			$this->_formName = $name;
		}
	}

	public function callTemplate($name) {
		
	}
}