<?php
/**
 * @author Flavio Kleiber <flavio@swagpeople.ch>
 * @copyright Flavio Kleiber, swagpeople.ch (c) 2014
 *
 * Caching class
 **/
class Cache {
	/**
	 * Get a file from cache
	 * @param  String $file
	 * @return File
	 */
	public function get($file) {
		$file = ROOT .'/tmp/cache/' . $file;
		if (file_exists($file)) {
			$handel = fopen($file, 'rb');
			$value = fread($handel, filesize($file));
			fclose($handel);
			return unserialize($value);
		} else {
			throw new Exception("$file count not be load");
		}
	}

	/**
	 * Save values in the cache
	 * @param String $file
	 * @param Multi $variable
	 */
	public function set($file,$variable) {
		$file = ROOT. '/tmp/cache/' . $file;
		$handle = fopen($file, 'a');
		fwrite($handle, serialize($variable));
		fclose($handle);
	}
}