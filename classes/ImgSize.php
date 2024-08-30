<?php
namespace Exam\classes;
require_once 'Validator.php';
use Exam\classes\Validator;
class ImgSize implements Validator{
    public function check($key, $value)
    {
        
        if($value > 1){
            return "$key size is too large";
        }else{
            return false;
        }
    }
}