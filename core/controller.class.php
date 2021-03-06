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

    /**
     * Class constructor
     *
     * @param $controller
     * @param $action
     * @return mixed
     */
    function __construct( $controller, $action) {
    	$this->_controller = $controller;
    	$this->_action = $action;

        //Make the new IMPORTANT CLASSES  for the controller
    	$this->_template = new Template($controller, $action);
        $this->breadcache = new Cache();
        $this->auth = new Auth();
    }

    /**
     * Set a variable in the Template class
     *
     * @param $name
     * @param $value
     * @return void
     */
    protected function set($name, $value) {
    	$this->_template->set($name, $value);
    }

    protected function hasNoView($value = true) {
        $this->_template->hasNoViews($value);
    }

    /**
     * Checks is the request a post request
     *
     * @return Boolean
     * 
     */
    protected function isPost() {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Destructor of the class calls the render function form
     * the template class
     *
     * @return void
     */
    function __destruct() {
    	$this->_template->render();
    }
 
}