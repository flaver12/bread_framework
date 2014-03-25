<?php
/**
 * @author Flavio Kleiber <flavio@swagpeople.ch>
 * @copyright Flavio Kleiber, swagpeople.ch (c) 2014
 *
 * Image Controller,
 * create a folder from the upload year usw.
 *
 * !!IT WORKS ONLY WITH JPEG IN THE MOMENT!!
 **/
class ImagesController extends Controller {
	public function index(){} //Normal index

    /**
     * Uploads the picture!
     *
     * @throws Execptions
     * @return void
     */
    public function upload() {
        $this->hasNoView();
        $umaskOld = umask(0);
        $mineType = $this->getMimeType($_FILES['file']['tmp_name']);
        switch($mineType) {
            case 'image/jpeg':
                $mineType = "jpeg";
            break;
            default:
                echo "nix gut!";
        }
        $newName = $this->createName($_FILES['file']['name']);
       try {
            $this->createThumb($_FILES['file']['tmp_name']);
            move_uploaded_file($_FILES['file']['tmp_name'], ROOT.'/weebroot/uploads/images/'.$newName);
            chmod(ROOT.'/weebroot/uploads/images/'.$newName, 0755);
            umask($umaskOld);
       } catch (Exception $e) {
            echo "=======================<br />";
            echo $e->getMessage().'<br />';
            echo "=======================<br />";
       }
       Request::route('community');
    }

    private function getMimeType($tmp) {
        $imgData = getimagesize($tmp);
        $mimeType = image_type_to_mime_type($imgData[2]);
        return $mimeType;
    }

    private function createName($image) {
        $timestamp = time();
        $imgName = date("d-M-Y", $timestamp);
        $newName = $imgName.'-'.$image;
        return $newName;
    }

    private function createThumb($image) {
        try {
            $folder = ROOT.'/weebroot/uploads/images/thumbmails';
            $thumb = "thumbnails_".$_FILES["file"]["name"];
            $width = 500;
            $size = getimagesize($image);
            $height = round($width*$size[1]/$size[0]);
            $imageOrg = imagecreatefromjpeg($image);
            $x = imagesx($imageOrg);
            $y = imagesy($imageOrg);
            $imageFin = imagecreatetruecolor($width, $height);
            imagecopyresized($imageFin, $imageOrg, 0, 0, 0, 0, $width+1, $height+1, $x, $y);
            imagejpeg($imageFin, $folder.'/'.$thumb);
            imagedestroy($imageFin);
            imagedestroy($imageOrg);
            return;
        } catch(Exception $e) {
            echo "=======================<br />";
            echo $e->getMessage().'<br />';
            echo "=======================<br />";
        }
            
    }
}