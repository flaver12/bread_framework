<?php
class IndexsController extends Controller {

	function index() {
		$test1 = "Hallo Welt!";
		$this->set('test1', $test1);
		/*$dtdte = Alc::getUser(1);
		var_dump($dtdte);
		var_dump(Alc::permissionsToArray($dtdte[0]['permissions']));*/
	}
}