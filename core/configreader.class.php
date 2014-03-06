<?php
class ConfigReader {

    public static function read($name, $type = 'live') {
        $iniArray = parse_ini_file('config/'.$name.'.ini', true);
        return $iniArray[$type];
    }
}