<?php
/**
 * @author Flavio Kleiber <flavio@swagpeople.ch>
 * @copyright Flavio Kleiber, swagpeople.ch (c) 2014
 *
 * ALC main class
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
	 * Get the permissons from a role
	 * 
	 * @param  Int $permissionId 
	 * @return Array $result
	 */
	public static function getPermissions($permissionId) {
		$query = new DBQuery();
		$q = "SELECT * FROM b_permission WHERE id=$permissionId";
		$result = $query->sendQuery($q);
		return $result;
	}

	/**
	 * Get the role 
	 * 
	 * @param  Int $roleId 
	 * @return Array $result
	 */
	public static function getRole($roleId) {
		$query = new DBQuery();
		$q = "SELECT * FROM b_role WHERE id=$roleId";
		$result = $query->sendQuery($q);
		return $result; 
	}

	/**
	 * Get user permissions
	 * 
	 * @param  Int $user 
	 * @return Array $result
	 */
	public static function getUser($user) {
		$query = new DBQuery();
		$q = "SELECT b_user.username, b_role.permissions
			FROM b_user
			JOIN b_user_role ON b_user.id = b_user_role.user_id
			JOIN b_role ON b_user_role.role_id = b_role.id
			WHERE b_user.id = $user";
		$result = $query->sendQuery($q);
		return $result; 
	}

	/**
	 * Return a permissions string as array
	 * 
	 * @param  String $permissions 
	 * @return Array $permissionsArr 	 
	 */
	public static function permissionsToArray($permissions) {
		$permissionsArr = array();
		$permissionsArr = explode(',', $permissons);
		return $permissionsArr;
	}
}