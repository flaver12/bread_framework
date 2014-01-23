<?php
/**
 * @author Flavio Kleiber <flavio@swagpeople.ch>
 * @copyright Flavio Kleiber, swagpeople.ch (c) 2014
 *
 * This is the exporter
 **/
//error_reporting(0);
class Exporter {
	protected $_type;
	protected $_data;

	function __construct($type = "xml", $data = "LoremIpsum") {
		$this->_type = $type;
		$this->_data = $data;
	}

	public function export() {
		$doc = DOMImplementation::createDocument(null,null);
		$doc->formatOutput = true;
		$root = $doc->createElement('Test');
		$root = $doc->appendChild($root);

		$data_tag = $doc->createElement('Under1');
		$data_tag = $root->appendChild($data_tag);
		$data = $doc->createTextNode($this->_data);
		$data_tag->appendChild($data);
		$doc->save(ROOT."/weebroot/exporter/test.xml");	
	}
}