<?php
namespace Exam\classes;

require_once 'Required.php';
require_once 'Str.php';
require_once 'IsNumber.php';
require_once 'ImgExt.php';
require_once 'ImgSize.php';
require_once 'ImgErrors.php';
require_once 'IsEmail.php';


class Validation{
    private $errors;

    public function endValidate($key, $value, $options){

        foreach($options as $option){

            $option = "Exam\classes\\" . $option;
            $obj = new $option;
            $result =  $obj->check($key, $value);

            if ($result != false){
                $this->errors[] = $result;
            }
        }
    }
    
    public function getErrors(){
        return $this->errors;
    }
}
