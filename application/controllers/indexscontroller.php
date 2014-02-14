<?php
class IndexsController extends Controller {

	function index() {
		$test1 = "Hallo Welt!";
		$this->set('test1', $test1);
        $this->trans->loadTranslationFile('default');
        $this->trans->echoText('MENU_SETTINGS_TEXT');
	}
}