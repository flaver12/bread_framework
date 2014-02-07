<?php
/**
 * @author Flavio Kleiber <flavio@swagpeople.ch>
 * @copyright Flavio Kleiber, swagpeople.ch (c) 2014
 *
 * This is the default Controller
 **/

class Controller {
    protected $_controller;
    protected $_action;
    protected $_template;
    protected $breadcache;
    protected $auth;

    function __construct( $controller, $action) {
    	$this->_controller = $controller;
    	$this->_action = $action;
        
        //Make the new IMPORTANT CLASSES  for the controller
    	$this->_template = new Template($controller, $action);
        $this->breadcache = new Cache();
        //$this->auth = new Auth();
    }

    protected function set($name, $value) {
    	$this->_template->set($name, $value);
    }

    function __destruct() {
    	$this->_template->render();
    }
 
}