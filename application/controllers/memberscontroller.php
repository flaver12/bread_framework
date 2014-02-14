<?php
/**
 * @author Flavio Kleiber <flavio@swagpeople.ch>
 * @copyright Flavio Kleiber, swagpeople.ch (c) 2014
 *
 * Memberscontroller
 **/
class MembersController extends Controller {
    function index() {
        echo "Hellow";
        $test = Request::getParams();
        echo $test;
    }

    function register() {
       $test = Request::getParams();
        print_r($test);
    }
}
