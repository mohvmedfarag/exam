<?php
namespace Exam\classes;
require_once 'Validator.php';
use Exam\classes\Validator;
class ImgExt implements Validator{
    public function check($key, $value)
    {
        $arr = ['jpg', 'png', 'jpeg'];
        if(! in_array($value, $arr)){
            return "$key extension not valid";
        }else{
            return false;
        }
    }
}



// public function checkSize($value){
//     if($value > 1){
//         return false;
//     }else{
//         echo true;
//     }
// }
// public function checkErrors($value){
//     if($value != 0){
//         return false;
//     }else{
//         return true;
//     }
// }
// public function checkExt($value){
//     $arr = ["jpg", "png", "jpeg",];
//     if(! in_array($value, $arr)){
//         return false;
//     }else{
//         return true;
//     }
// }