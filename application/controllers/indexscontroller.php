<?php
class IndexsController extends Controller {

	function index() {
		$test1 = "Hallo Welt!";
		$this->set('test1', $test1);
		$row = new DBRow();
		$row->setRow('bUser');
		$row->set('username', 'hansi');
        $row->set('email');
        if($row->find()) {
            echo "Super";
        }

	}
}