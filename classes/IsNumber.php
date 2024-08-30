<?php
namespace Exam\classes;
require_once 'Validator.php';
use Exam\classes\Validator;

class IsNumber implements Validator{
    public function check($key, $value){
        if(!is_numeric($value)){
            return "$key must be number";
        }else{
            return false;
        }
    }
}