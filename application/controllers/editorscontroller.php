<?php
class EditorsController extends Controller {
	function Index(){}

	function save() {
		//Need to check
		$mgs = $_POST['editorInput'];
		$user_id = 1; //falver
		$query = new DBQuery();
		$q = "INSERT INTO b_comment (user_id, comment) VALUES ($user_id, '$mgs')";
		$query->sendQuery($q);
		echo "Query send";
	}
}