<?php
class JobsController extends Controller {
	
	function index() {
		$test1 = "Hallo Welt!";
		$this->set('test1', $test1);
		$link = $this->link('jobs', 'Team');
		echo $link;
	}
}