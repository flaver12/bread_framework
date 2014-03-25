<?php
/**
 * @author Flavio Kleiber <flavio@swagpeople.ch>
 * @copyright Flavio Kleiber, swagpeople.ch (c) 2014
 *
 *  This is the ALC class
 */
class Alc {
	/**
	 * All permissions
	 * 
	 * @access private
	 * @var array
	 */
	private $perms     	= array();
	/**
	 * The user id
	 * 
	 * @access private
	 * @var integer
	 */
	private $userID    	= 0;
	private $userRoles 	= array();
	/**
	 * The dbobject
	 * 
	 * @access private
	 * @var DBQuery
	 */
	private $query 		= new DBQuery();

	/**
	 * Class constructor
	 */
	function __construct() {
		if($userID != '') {
			$this->userID = floatval($userID);
		} else {
			$this->userID = floatval()//get from auth
		}
		$this->userRoles = $this->getUserRoles('ids');
		$this->buildALC();
	}

	/**
	 * Get the usere Roles form DB
	 *
	 * @return Array|NULL $result
	 */
	private function getUserRoles() {
		$q = "SELECT * FROM b_userRole WHERE user_id". floatval($this->userID) . "ORDER BY addDate ASC";
		$result = $this->query->send($q);
		return $result;
	}

	/**
	 * Get all roles from db
	 * 
	 * @param  string $format 
	 * @return Array|NULL $result
	 */
	private function getAllRoles($format='') {
		$q = "SELECT * FROM b_role ORDER BY roleName ASC"
		$format = strtolower($format);
		$result = $this->query->send($q);
		return $result;
	}

	/**
	 * Build the ALC
	 * 
	 * @return void
	 */
	private function buildALC() {
		if (count($this->userRoles > 0)) {
			$this->perms = array_merge($this->perms, $this->getAllRoles($this->userRoles));
		}
		$this->perms = array_merge($this->perms,$this->getUserPerms($this->userID));
	}

	private function getPermKeyFromID($permID) {
		$q = "SELECT permName FROM b_permission WHERE id = ".floatval($permID)."LIMIT 1";
		$result = $this->query->send($q);
		return $result[0];
	}

	private function getRoleNameFromID($roleID) {
		$q = "SELECT roleName FROM b_role WHERE id =". floatval($roleID) . " LIMIT 1";
		$result = $this->query->send($q);
		return $result[0];
	}
}