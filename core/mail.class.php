<?php
/**
 * @author Flavio Kleiber <flavio@swagpeople.ch>
 * @copyright Flavio Kleiber, swagpeople.ch (c) 2014
 *
 * Mailingclass
 **/

class Mail {
	protected $_usermail;
	protected $_title:
	protected $_text;

	function __construct() {}

	public function sendMail($usermail, $title, $text) {
		$this->_usermail = $usermail;
		$this->_title = $title;
		$this->_text = $text;
		mail($this->_usermail, $this->_title , $this->_text);
	}
}