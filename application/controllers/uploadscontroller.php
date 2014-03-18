<?php
/**
 * @author Flavio Kleiber <flavio@swagpeople.ch>
 * @copyright Flavio Kleiber, swagpeople.ch (c) 2014
 *
 * This is our uploads controller, he handels all the uploads. 
 * It looks in the $_FILES variable to the type and sends it to the right place.
 **/
class UploadsController extends Controller {

        public function index() {} //Get me translation und do some stuff

    	public function upload() {
    		if(Request::isPost()) {
    			Request::redirect('images', 'index', $_FILES['file']['tmp_name']);
    		}
    	}
}
