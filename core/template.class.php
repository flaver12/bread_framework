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
    protected $trans;

 	function __construct($controller, $action) {
 		$this->_controller = $controller;
 		$this->_action = $action;
        $this->trans = new Translate();
        $this->translateLoader();
    }

 	function set($name, $value) {
 		$this->variables[$name] = $value;
 	}

    function translateLoader() {
        $lang = Request::getLang();
        strtolower($lang);
        if(file_exists(ROOT.'/language/'. $lang .'/'.$this->_controller.'.xml')) {
            $file = ROOT.'/language/'. $lang .'/'.$this->_controller.'.xml';
            $this->trans->loadTranslationFile($file);
        } else {
            $file = ROOT.'/language/'.$lang.'/default.xml';
            $this->trans->loadTranslationFile($file);
        }
    }

    function translater($key) {
        $this->trans->echoText($key);
    }

 	function render() {
		extract($this->variables);
	 
	    if (file_exists(ROOT .'/application/views/' . $this->_controller . '/header.phtml')) {
	        include (ROOT . '/application/views/' .$this->_controller .'/header.phtml');
	    } else {
	        include (ROOT .'/application/views/header.phtml');
	    }

		include (ROOT . '/application/views/' . $this->_controller . '/' . $this->_action . '.phtml');      
	     
	    if (file_exists(ROOT . '/application/views/'. $this->_controller .'/footer.phtml')) {
	        include (ROOT . '/application/views/'. $this->_controller . '/footer.phtml');
	    } else {
	        include (ROOT . '/application/views/footer.phtml');
	    }
 	}
 }