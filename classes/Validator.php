<?php
namespace Exam\classes;

interface Validator{
    public function check($key, $value);
}