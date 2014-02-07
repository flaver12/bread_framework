<?php
/**
 * @author Flavio Kleiber <flavio@swagpeople.ch>
 * @copyright Flavio Kleiber, swagpeople.ch (c) 2014
 *
 * 
 **/
class DBRow extends DBCore {
	/**
	 * @var String 
	 */
	protected $_row;
    /**
     * @var String
     */
    protected $_debug;
    /**
     * @var array
     */
    protected $_values = array();

	/**
	 * Set a Row
	 * @param String $row
	 */
	public function setRow($row) {
		$this->_row = $row;
	}

	/**
	 * Get a User by ID
	 * @param  integer $id
	 * @return array $all_arr
	 */
	public function getUserbyId($id = 0) {
		$q = "SELECT * FROM fUser WHERE id = $id";
		$result = mysql_query($q);
		if (empty($result)) {
				return NULL;
			} else {
				while ($all = mysql_fetch_assoc($result)){
				$all_arr[]=$all;
			}
				return $all_arr;
			}
	}

	/**
	 * get a Value form DB
	 * @param  $value
	 * @return array
	 */
	public function get($value) {
		$q = "SELECT $value FROM $this->_row";
		$this->_debug = $q;
		if (empty($result)) {
				return NULL;
			} else {
				while ($all = mysql_fetch_assoc($result)){
				$all_arr[]=$all;
			}
				return $all_arr;
			}
	}

    /**
     * Set a SELECT Value for DBRow
     *
     * @param $value
     * @return void
     */
    public function set($value) {
        $this->_values[] = $value;
    }

    public function find() {
        //Make me a nice String
        $value = implode(",", $this->_values);
        $q = 'SELECT '.$value. ' FROM '.$this->_row ;
        $result = mysql_query($q);
        if (empty($result)) {
            return NULL;
        } else {
            while ($all = mysql_fetch_assoc($result)){
                $all_arr[]=$all;
            }
            return $all_arr;
        }
    }
	/**
	 * Little dbeug HACK
	 * @return [type] [description]
	 */
	public function debug() {
		var_dump($this->_row);
		var_dump($this->_debug);
	}
	
}