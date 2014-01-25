<?php
/**
 * @author syz <aurel@swagpeople.ch>
 * @copyright syz, swagpeople.ch (c) 2014
 *
 * Auth class
 **/

class Auth {
	private $_sessionUser = $_SESSION['loggedIn'];

	public function isUser() {
		$this->_sessionUser;
	}

	public function autholog() {
		
	}
}