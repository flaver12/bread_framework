<?php
class TranslatesController extends Controller {

        function index() 
        {     
            $result = Translate::DbTranslate($_POST);
            echo $result;
	}
}
