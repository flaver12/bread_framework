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
    protected $hasViews;
    protected $hasNoView;

   /**
    * Class constructor
    *
    * @param $controller
    * @param $action
    * @return mixed
    */
   function __construct($controller, $action) {
  	$this->_controller = $controller;
  	$this->_action = $action;
    $this->trans = new Translate();
    $this->translateLoader();
    $this->hasViews = App::hasViews('test', 'test', true);
    $this->hasNoView = false;
  }

     /**
      * Set a variable to the view
      *
      * @param $name
      * @param $value
      * @return void
      */
     function set($name, $value) {
 		$this->variables[$name] = $value;
 	}

    function hasNoViews($value = true) {
        $this->hasNoView = $value;
    }
 /**
  * Load the translation xml
  *
  * @return void
  */
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

 /**
  * Translate a text
  *
  * @param $key
  * @return void
  */
 function translater($key) {
    echo "<pre>";
    $this->trans->loadLangArray($key);
    //$this->trans->echoText($key);
}

 /**
  * Renders the view
  *
  * @return void
  */
 function render() {
      //Ugly hack for ajax
       echo $this->hasNoView;
      if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' || $this->hasNoView == true) {
        die();
      } 

    extract($this->variables);

      if (file_exists(ROOT .'/application/views/' . $this->_controller . '/header.phtml')) {
          include (ROOT . '/application/views/' .$this->_controller .'/header.phtml');
      } else {
          include (ROOT .'/application/views/header.phtml');
      }
      if(!isset($this->hasViews) || empty($this->hasViews)) {
        include (ROOT . '/application/views/' . $this->_controller . '/' . $this->_action . '.phtml');
      } else {
        include (ROOT . '/application/views/' . $this->hasViews[0] . '/' . $this->hasViews[1] . '.phtml');
      }
            
       
      if (file_exists(ROOT . '/application/views/'. $this->_controller .'/footer.phtml')) {
          include (ROOT . '/application/views/'. $this->_controller . '/footer.phtml');
      } else {
          include (ROOT . '/application/views/footer.phtml');
      }
  }
}