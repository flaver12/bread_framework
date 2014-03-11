<?php
class UploadsController extends Controller {

        public function index() {} //Get me translation und do some stuff

    	public function upload() {
    		print_r($_FILES);
    		die;
    	} //Call uplodhelper to resize it!
}
