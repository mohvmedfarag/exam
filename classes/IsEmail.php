<?php
namespace Exam\classes;
require_once 'Validator.php';
use Exam\classes\Validator;

class IsEmail implements Validator{
    public function check($key, $email){
        // else if(! filter_var($email, FILTER_VALIDATE_EMAIL)){
       // $errors[] = "invalid email address";

       if(! filter_var($email, FILTER_VALIDATE_EMAIL)){
            return "Invalid $key address";
       }else{
        return false;
       }
    }
    
}