<?php
/**
 * @author Flavio Kleiber <flavio@swagpeople.ch>
 * @copyright Flavio Kleiber, swagpeople.ch (c) 2014
 *
 * Caching class
 **/
class Cache {
    /**
     * Get a file form cache
     *
     * @param $file
     * @return mixed
     * @throws Exception
     */
    public function get($file) {
		$file = ROOT .'/tmp/cache/' . $file.'.json';
		if (file_exists($file)) {
            $jsonData = file_get_contents($file);
            $jsonArray = json_decode($jsonData, true);
            return $jsonArray;
		} else {
			throw new Exception("$file could not be load");
		}
	}

	/**
	 * Save values in the cache
     *
	 * @param String $file
	 * @param Array $variable
     * @return void
	 */
	public function set($file,$variable = array()) {
		$file = ROOT. '/tmp/cache/' . $file . '.json';
		$handle = fopen($file, 'w');
		fwrite($handle, json_encode($variable));
		fclose($handle);
	}
}