<?php
/**
 * @author Flavio Kleiber <flavio@swagpeople.ch>
 * @copyright Flavio Kleiber, swagpeople.ch (c) 2014
 *
 * This us the DBCORE class
 **/

class DBQuery extends DBCore {

	/**
	 * Send a query to the database
	 * @param  String $q 
	 * @return Array or NULL
	 */
	public function sendQuery($q = NULL, $noResult=false) {
		if (!isset($q)) {
			throw new Exception("Empty query string");
		}
		$result = mysql_query($q);
		if ($noResult) {
			return true;
		} else {
			if (empty($result)) {
				return NULL;
			} else {
				while ($all = mysql_fetch_assoc($result)){
				$all_arr[]=$all;
			}
				return $all_arr;
			}
		
		}
	}
}
