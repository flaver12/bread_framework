<?php
/**
 * @author syz <aurel@swag
 people.ch>
 * @copyright syz, swagpeople.ch (c) 2014
 *
 * Auth class
 **/

class Auth {
	private $_sessionUser = $_SESSION['loggedIn'];

	public function isUserloggedIn() {
			

		if($_sessionUser != 'loggedIn')
		{
		return	Null
		}
		else {return true}
	}

	public function autolog() {
		// Someone smart have to work here
		 if exist cookie
		get cookie
		 $this->Auth->Login(CookieVariableUser,CookieVariable)
		
		
		
	}
	
	public function Login(User,Password)
	{
	setRow(Username);
	set(User);
	$result = find();
	if ($result == 0)
	{
	return Null
	}
	else {
	// Hend mir Sho Session Funktione?
	//put data to Session LoginFlag
	
	return $result}
	
 
	
	
	}
}