<?php
/**
 * @author Flavio Kleiber <flavio@swagpeople.ch>
 * @copyright Flavio Kleiber, swagpeople.ch (c) 2014
 *
 * Lesscompiler class
 **/

class Lesscompiler {

	function __construct() {
		require (ROOT."/core/Library/lesscompiler/lessc.inc.php");
		$less = new lessc;
		try {
			$less->compileFile(ROOT.'/weebroot/less/main.less', ROOT.'/weebroot/css/main.css');
		} catch (Exception $e) {
			echo "LessError <b>" . $e->getMessage() . "</b>";
		}
	}
}