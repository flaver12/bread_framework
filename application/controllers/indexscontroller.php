<?php
class IndexsController extends Controller {

	function index() {
		$test1 = "Hallo Welt!";
		$this->set('test1', $test1);
		$query = new PDOCore();
		$test = $query->sendQuery("SELCT * FROM bBill");
		print_r($test);
	}
}