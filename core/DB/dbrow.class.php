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
     * @param $key
     * @return void
     */
    public function set($value, $key = NULL) {
        if($key == NULL) {
            $this->_values[] = $value;
        } else {
            $this->_values[$key] = $value;
        }

    }

    /**
     * Find a value
     *
     * @return array|null
     */
    public function find() {
        //Make me a nice String
        $value = implode(",", $this->_values);
        $q = 'SELECT '.$value. ' FROM '.$this->_row ;
        $result = mysql_query($q);
        //Clean the array
        unset($this->_values);
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
     * Find a value in db with where
     *
     * @return array|null
     */
    public function findByKey() {
        $q_tmp = array();
        $key[] = array_keys($this->_values);
        $value[] = $this->_values;
        $value = $value[0];
        if(count($key[0]) > 1) {
            foreach($this->_values as $field => $values) {
                $q_tmp[$field] = $field ." = ". "'$values'";
            }
            $q = "SELECT * FROM ".$this->_row ." WHERE " .implode(" AND ", $q_tmp);
        } else {
            //TODO:Change here query
            $q = 'SELECT * FROM '.$this->_row .' WHERE ' .$key[0][0] .' = '. "$value[$key[0][0]]";
        }
        //Clean the array
        unset($this->_values);
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
}