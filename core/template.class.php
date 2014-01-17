<?php
/**
 * @author Flavio Kleiber <flavio@swagpeople.ch>
 * @copyright Flavio Kleiber, swagpeople.ch (c) 2014
 *
 * The template engine
 **/

 class Template {
 	protected $variables = array();
 	protected $_controller;
 	protected $_action;

 	function __construct($controller, $action) {
 		$this->_controller = $controller;
 		$this->_action = $action;
 	}

 	function set($name, $value) {
 		$this->variables[$name] = $value;
 	}

 	function render() {
		extract($this->variables);
	 
	    if (file_exists(ROOT .'/application/views/' . $this->_controller . '/header.php')) {
	        include (ROOT . '/application/views/' .$this->_controller .'/header.php');
	    } else {
	        include (ROOT .'/application/views/header.php');
	    }

	include (ROOT . '/application/views/' . $this->_controller . '/' . $this->_action . '.php');      
	     
	    if (file_exists(ROOT . '/application/views/'. $this->_controller .'/footer.php')) {
	        include (ROOT . '/application/views/'. $this->_controller . '/footer.php');
	    } else {
	        include (ROOT . '/application/views/footer.php');
	    }
 	}
 }