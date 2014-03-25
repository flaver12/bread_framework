<?php
/**
 * @author Flavio Kleiber, Aurel Syz, <flavio@swagpeople.ch, <aurel@swagpeople.ch>>
 * @copyright Flavio Kleiber, Aurel Syz, swagpeople.ch (c) 2014
 * 
 * Translate class
 **/
class Translate {
    /**
     * XML variable
     * 
     * @var String
     * @access protected
     */
    protected $_xml;

    /**
     * Language array
     * 
     * @var array
     * @access protected
     */
    protected $_languageArray = array();

    /**
     * Load a xml file by name
     *
     * @param $file
     * @return bool
     * @throws Exception
     */
    public function loadTranslationFile($file) {
        if(is_file($file)) {
            if($this->_xml = simplexml_load_file(($file))) {
                return true;
            } else {
                throw new Exception("$file count be load");
            }
        }
    }
    
    /**
     * 
     * Get translate values from db
     * 
     * @param int $pageid
     * @return json $result
     */
    public function DbTranslate ($pageid)        
    {
       $translateId = $this->loadLanuageId();
       $query = new DBQuery();
       $q = "SELECT $translateId FROM b_translate WHERE pageID = $pageid ";
       $result = $query->sendQuery($q);
       $result = json_encode($result);
       return $result;
    }

    /**
     * Echo a text
     *
     * @param $textId
     * @throws Exception
     * @return void
     */
    public function echoText($textId) {
        if($this->_xml != "") {
            $lang = $this->loadLanuageId();
            $path = "/language[@id=\"$lang\"]/loctext[@id=\"$textId\"]";
            $res = $this->_xml->xpath($path);
            echo $res[0]->text;
        } else {
            throw new Exception("Please load first the XML-File!");
        }
    }

    /**
     * Load only a text
     *
     * @param $textId
     * @return mixed
     * @throws Exception
     */
    public function loadText($textId) {
        if($this->_xml != "") {
            $lang = $this->loadLanuageId();
            $path = "/language[@id=\"$lang\"]/loctext[@id=\"$textId\"]";
            $res = $this->_xml->xpath($path);
            $translation = $res[0]->text;
        } else {
            throw new Exception("Please load first the XML-File!");
        }
        return $translation;
    }

    /**
     * Load lang array
     *
     * @return mixed
     * @throws Exception
     */
    public function loadLangArray() {
        if($this->_xml != "") {
            $lang = $this->loadLanuageId();
            $translations = array();
            $path = "/language[@id=\"$lang\"]/loctext";
            $tempArray[] = $this->_xml->xpath($path);
            foreach ( (array) $tempArray as $index => $node ) {
                $out[$index] = ( is_object ( $node ) ) ? xml2array ( $node ) : $node;
            }
            print_r($out[0][0]);
        } else {
            throw new Exception("Please load first the XML-File!");
        }
        return $this->_languageArray;
    }

    /**
     * Returns the language from the auth class
     *
     * @return string
     */
    protected function loadLanuageId() {
        $langId = Request::getLang();
        return $langId;
    }
}