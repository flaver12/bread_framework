<?php
/**
 * @author Flavio Kleiber <flavio@swagpeople.ch>
 * @copyright Flavio Kleiber, swagpeople.ch (c) 2014
 *
 * Image class
 **/
class ImagesController extends Controller {
	public function index(){} //Normal index

    public function upload() {
        $this->hasNoView();
        //print_r($_FILES);
        $mineType = $this->getMimeType($_FILES['file']['tmp_name']);
        switch($mineType) {
            case 'image/jpeg':
                $mineType = "jpeg";
            break;
            default:
                echo "nix gut!";
        }
        $image = imagecreatefromjpeg($_FILES['file']['name']);
        imagejpeg($image, ROOT.'weebroot/uplods/images/'.$_FILES['file']['name']);
    }

    private function getMimeType($tmp) {
        $imgData = getimagesize($tmp);
        $mimeType = image_type_to_mime_type($imgData[2]);
        //$extension = image_type_to_extension($imgData[2]);
        return $mimeType;
    }
}