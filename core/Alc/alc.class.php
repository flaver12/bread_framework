<?php
/**
 * @author Flavio Kleiber <flavio@swagpeople.ch>
 * @copyright Flavio Kleiber, swagpeople.ch (c) 2014
 *
 * Normal role class to get a user role
 **/
class Alc {
	/**
	 * All permissions will bi filled in here
	 * 
	 * @var array
	 * @access private
	 */
	protected $_permissions = array();

	/**
	 * Query object
	 * 
	 * @var DBQuery
	 * @access private
	 */
	protected $_query;

	/**
	 * Class constrcutor
	 */
	function __construct() {
		$this->_query = new DBQuery(); 
	}

	/**
	 * Get the permissons from a role
	 * 
	 * @param  Int $userId 
	 * @return Array $result
	 */
	public static function getPermissions($roleId) {
		$q = "SELECT * FROM b_permission WHERE id=$roleId";
		$result = $this->_query->sendQuery($q);
		return $result;
	}

	public static function getRole() {

	}
}