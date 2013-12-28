<?php
/**
 * Bootstrap
 *
 * @author Flavio Kleiber flavio@swagpeople.ch
 * @copyright Informatik Atelie GmbH (c) 2013
 */
$config = parse_ini_file('./config/bf_MainConfig.ini');
define('BASE_DIR', $config['site']['BASE_DIR']);
define('HTTP_PATH', 'http://'. $_SERVER['SERVER_NAME'] . '/' .BASE_DIR);
define('FS_PATH', $_SERVER['DOCUMENT_ROOT']. '/' . BASE_DIR);
define('REQUEST_URI', preg_replace('/\?' . $_SERVER['QUERY_STRING'] . '/i', '', $_SERVER['REQUEST_URI']));
require_once(ROOT. '/core/init.php');