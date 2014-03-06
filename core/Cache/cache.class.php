<?php
/**
 * @author Flavio Kleiber <flavio@swagpeople.ch>
 * @copyright Flavio Kleiber, swagpeople.ch (c) 2014
 *
 * The cache class
 **/
class Cache {
    /**
     * phpFastCache object
     *
     * @access protected
     * @var phpFastCache
     */
    protected $cache;

    /**
     * Constant for the cache time
     */
    const CACHE_TIME = 300;

    /**
     * Class constructor
     *
     * @return mixed
     */
    function __construct() {
        include (ROOT."/core/Library/cache/phpfastcache.php");
        $this->cache = new phpFastCache();
    }

    /**
     * Save a value in the cache
     *
     * @param $key
     * @param $data
     * @return void
     */
    public function write($key, $data) {
        $cacheTime = self::CACHE_TIME;
        $this->cache->set($key, $data, $cacheTime);
    }

    /**
     * Get a value form the cache
     *
     * @param $key
     * @return null|object
     */
    public function get($key) {
        $value = $this->cache->get($key);
        return $value;
    }

    /**
     * Is the object in the key?
     *
     * @param $key
     * @return bool
     */
    public function exist($key) {
        $value = $this->cache->isExisting($key);
        return $value;
    }

    /**
     * Delete a value from cache
     *
     * @param $key
     * @return void
     */
    public function delete($key) {
        try {
            $this->cache->delete($key);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

}