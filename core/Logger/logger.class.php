<?php
/**
 * @author Flavio Kleiber <flavio@swagpeople.ch>
 * @copyright Flavio Kleiber, swagpeople.ch (c) 2014
 *
 * Errorlogger
 **/

class Logger {
	function __construct() {
		require (ROOT."/core/Library/KLogger/KLogger.php");
		$log = KLogger::instance(ROOT.'/logs/', KLogger::ERR, KLogger::WARN);
		/*$args1 = array('a' => array('b' => 'c'), 'd');
		$args2 = NULL;
		$log->logInfo('Info Test');
		$log->logNotice('Notice Test');
		$log->logWarn('Warn Test');
		$log->logError('Error Test');
		$log->logFatal('Fatal Test');
		$log->logAlert('Alert Test');
		$log->logCrit('Crit test');
		$log->logEmerg('Emerg Test');

		$log->logInfo('Testing passing an array or object', $args1);
		$log->logWarn('Testing passing a NULL value', $args2);*/
	}
}