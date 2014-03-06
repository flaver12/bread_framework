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

	public function autolog($hash) {
		// Someone smart have to work here
		$row = new DBRow();
	    $row->setRow('bUser');
		//die Usernamerainbowtabelrow  muss noch hinzugefügt werden
	    $row->set($User, 'username');
		$row->set($hash, 'usernamerainbowtabel');

	    $result = $row->findByKey();
		if (empty($result))
		{
		return false;
		}
		else {
		/**is now fixed**/
		$_SESSION['loggedIn'] = true;
			
			return $result;
		}
	}
	
	public function Login($User,$Password)
	{
		if(isset($_COOKIE['autologger']))
		{
			$hash = $_COOKIE['autologger']; 
			$userhash = $this->Auth->autolog($hash);
		}
		if($userhash != false){
			$q = "INSERT INTO bUser (Usernamerainbowtabel) VALUES ('$userhash') WHERE username ='$User';";
			$this->$DB->sendquery();
		}
		else {
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
				$Month = 2592000 + time(); 
	  			setcookie('autologger',($cookiestring = md5($User)), $Month);
				$_SESSION['loggedIn'] = true;
				return $result;
			}
		}
	}
}