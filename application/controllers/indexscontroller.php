<?php
class IndexsController extends Controller {

	function index() {
		$test1 = "Hallo Welt!";
		$this->set('test1', $test1);
		//var_dump(Alc::getPermissions(1));
		$query = new DBQuery();
		$q = "SELECT * FROM b_comment";
		$result = $query->sendQuery($q);
		$this->set('comments', $result);
	}
	 
}