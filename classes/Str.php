<?php
namespace Exam\classes;
require_once 'Validator.php';
use Exam\classes\Validator;

class Str implements Validator{
    public function check($key, $value){
        if(is_numeric($value)){
            return "$key must be string";
        }else{
            return false;
        }
    }
}