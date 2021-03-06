<?php
/**
 * @author Flavio Kleiber <flavio@swagpeople.ch>
 * @copyright Flavio Kleiber, swagpeople.ch (c) 2014
 *
 * This us the DBCORE class
 **/

class DBQuery extends DBCore {

    /**
     * Send a query to the db
     *
     * @param null $q
     * @param bool $noResult
     * @return array|bool|null
     * @throws Exception
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

    /**
     * Count the number of rows
     *
     * @param null $tabel
     * @return int|null
     * @throws Exception
     */
    public function getNumberOfRows($tabel = NULL) {
		if (!isset($tabel)) {
			throw new Exception("getNumberOfRows needs a Tabel");
		}
		$result = mysql_query("SELECT * 
							FROM $tabel");
		if (empty($result)) {
			return NULL;
		} else {
			$numRows = mysql_num_rows($result);
			return $numRows;
		}
	}
}
