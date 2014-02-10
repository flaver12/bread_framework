<?php
class IndexsController extends Controller {

	function index() {
		$test1 = "Hallo Welt!";
		$this->set('test1', $test1);
		$mail = new Mail();
        $mail->sendEmail('testmail');
	}
}