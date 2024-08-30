<?php

require_once 'inc/connection.php';
require_once 'classes/request.php';
require_once 'classes/session.php';
require_once 'classes/files.php';
require_once 'classes/Validation.php';
require_once 'classes/HashPass.php';



use Exam\classes\Request;
use Exam\classes\Session;
use Exam\classes\Files;
use Exam\classes\Validation;
use Exam\classes\HashPass;



$request = new Request;
$session = new Session;
$image = new Files;
$validation = new Validation;
$hash = new HashPass;

