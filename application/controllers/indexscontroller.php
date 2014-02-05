<?php
class IndexsController extends Controller {

	function index() {
		$test1 = "Hallo Welt!";
		$this->set('test1', $test1);
		$row = new DBRow();
		$row->setRow('fUser');
		$row->get('username');
		$row->debug();
	}
}