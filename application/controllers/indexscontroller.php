<?php
class IndexsController extends Controller {

	function index() {
		$test1 = "Hallo Welt!";
		$this->set('test1', $test1);
        $result = $this->auth->Login('username','pw');
        $this->set('user', $result);
	}
}