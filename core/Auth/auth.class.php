<?php
/**
 * @author syz <aurel@swagpeople.ch>
 * @copyright syz, swagpeople.ch (c) 2014
 *
 * Auth class
 **/

class Auth {
	private $_sessionUser;

	public function isUserloggedIn() {
        $this->_sessionUser = $_SESSION['loggedIn'];

		if($this->_sessionUser != 'loggedIn')
		{
		return	Null;
		}
		else {return true;}
	}

	/*
	 * Because of errors its in the comments now
	 * public function autolog() {
		// Someone smart have to work here
		 if exist cookie
		get cookie
		 $this->Auth->Login(CookieVariableUser,CookieVariable)
		
		
		
	}*/
	
	public function Login($User,$Password)
	{
    //Make a md5 hash of the pw
    $Password = md5($Password);
    $row = new DBRow();
    $row->setRow('bUser');
    $row->set($User, 'username');
    $row->set($Password, 'pw');
    $result = $row->findByKey();
	if (empty($result))
	{
	return Null;
	}
	else {
	/**is now fixed**/
	$_SESSION['loggedIn'] = true;
	return $result;}
	}
}