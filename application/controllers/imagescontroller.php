<?php
/**
 * @author Flavio Kleiber <flavio@swagpeople.ch>
 * @copyright Flavio Kleiber, swagpeople.ch (c) 2014
 *
 * Image class
 **/
//App::hasViews('indexs', 'index');
class ImagesController extends Controller {
	public function index($fileName = NULL){
		/*$filenummber = exif_imagetype($fileName);
		$fileType = $this->getImageType($filenummber);*/
		echo $fileType;
		die;
	}

	private function getImageType($filenummber) {
		switch ($filenummber) {
			case 2:
				$file = 'JPEG';
				break;
			case 3:
				$file = 'PNG';
				break;
			default:
				$file = NULL;
				break;
			return $file;
		}
	}
}