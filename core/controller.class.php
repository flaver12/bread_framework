<?php
/**
 * @author Flavio Kleiber <flavio@swagpeople.ch>
 * @copyright Flavio Kleiber, swagpeople.ch (c) 2014
 *
 * This is the default Controller
 **/

class Controller {
	protected $_model;
    protected $_controller;
    protected $_action;
    protected $_template;

    function __construct($model, $controller, $action) {
    	$this->_model = $model;
    	$this->_controller = $controller;
    	$this->_action = $action;
        
    	$this->_model = new $model;
    	$this->_template = new Template($controller, $action);
    }

    protected function set($name, $value) {
    	$this->_template->set($name, $value);
    }

    function __destruct() {
    	$this->_template->render();
    }
 
}