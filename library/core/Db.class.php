<?php
//TODO WRITE IN PDO
class Db {
	protected $_dbHandle;
	protected $_result;

	protected function connect($adress, $account, $pwd, $name) {
		$this_dbHandle = @mysql_connect($adress, $account, $pwd);
		if ($this_dbHandle != 0) {
			if (mysql_select_db($name, $this->_dbHandle)) {
				return 1;
			} else {
				return 0;
			}
		} else {
			return 0;
		}
	}

	protected function disconnect() {
		if (@mysql_close($this->_dbHandle) != 0) {
			return 1;
		} else {
			return 0;
		}
	}

	//TDODO WRITE FUNCTIONS
}