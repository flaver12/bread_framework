<?php
class IndexsController extends Controller {

	function index() {
		$test1 = "Hallo Welt!";
		$this->set('test1', $test1);
		//TODO: CALL ON A NONE OBJECT?! WTF
		//$this->set('items', $this->Index->selectAll());
		$mebers = new DBQuery();
		$q = "SELECT * 
			FROM members";
		$meberList = $mebers->sendQuery($q);
		$halllo = "Hans";
		$this->breadCache("meineListe", $halllo);
	}
}