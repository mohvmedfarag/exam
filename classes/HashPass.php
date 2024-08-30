<?php
namespace Exam\classes;

class HashPass{
    public function hash($value){
        return password_hash($value, PASSWORD_DEFAULT);
    }
    public function verify($password, $oldPassword){
        return password_verify($password, $oldPassword);
    }
}