<?php
/**
 * @author Flavio Kleiber <flavio@swagpeople.ch>
 * @copyright Flavio Kleiber, swagpeople.ch (c) 2014
 *
 * This is the app class
 **/
class App {
	protected static $views = array();

    protected static $view = false;

	protected static $routes = array(
		'community' => array('indexs', 'index'),
		'login'		=> array('communitys', 'login'),
        'upload'	=> array('images', 'index')
		);

	public static function hasViews($controller, $action, $view=false) {
		if ($view) {
		 	return self::$views;
		 	unset(self::$views);
		 } else {
			self::$views[] = $controller;
			self::$views[] = $action;
		 }
	}

	public static function checkRouts($controller) {
		$values = array();
		$values = self::$routes[$controller];
		if(!empty($values)) {
			return $values;
		} else {
			return NULL;
		}
	}

	public static function includeTemplate($template) {
		$temp = ROOT.'/application/views/templates/'.$template.'_template.phtml';
        if(file_exists($temp)) {
            include $temp;
        } else {
            return false;
        }
	}
}