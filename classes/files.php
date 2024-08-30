<?php
namespace Exam\classes;

class Files{
    private $image;
    public function get($key){
        $this->image = $_FILES[$key];
        return $this->image;
    }

    public function ext($imgName){
        return strtolower(pathinfo($imgName, PATHINFO_EXTENSION));
    }

    public function newImgName($ext){
        return uniqid() . "." . $ext;
    }

    public function uploadImg($tmpName, $newImageName){
       return move_uploaded_file($tmpName, "../images/$newImageName");
    }

    public function removeOldImg($oldImgName){
        return unlink("../images/$oldImgName");
    }
}