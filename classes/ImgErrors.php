<?php
namespace Exam\classes;
require_once 'Validator.php';
use Exam\classes\Validator;
class ImgErrors implements Validator{
    public function check($key, $value)
    {
        
        if($value != 0){
            return "Error in $key";
        }else{
            return false;
        }
    }
}


















//public function checkErrors($value){
//     if($value != 0){
//         return false;
//     }else{
//         return true;
//     }
// }