<?php
/**
 * @author Flavio Kleiber <flavio@swagpeople.ch>
 * @copyright Flavio Kleiber, swagpeople.ch (c) 2014
 *
 * Translate class
 **/
class Translate {
    protected $_xml;

    /**
     * Load a xml file by name
     *
     * @param $file
     * @return bool
     * @throws Exception
     */
    public function loadTranslationFile($file) {
        //Create the file path
        //TODO:Get the langugae code form the Auth class
       $file = ROOT.'/language/de/'.$file.'.xml';
        if(is_file($file)) {
            if($this->_xml = simplexml_load_file(($file))) {
                return true;
            } else {
                throw new Exception("$file count be load");
            }
        }
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
            $path = "/language[@id=\"$lang\"]";
            $res = $this->_xml->xpath($path);
        } else {
            throw new Exception("Please load first the XML-File!");
        }
        return $res;
    }

    /**
     * Returns the language from the auth class
     *
     * @return string
     */
    protected function loadLanuageId() {
        //TODO:Get the langugae code form the Auth class, possible withe the $_SERVER[’HTTP_ACCEPT_LANGUAGE’]
        $langId = "de";
        return $langId;
    }
}