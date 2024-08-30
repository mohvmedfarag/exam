<?php

require_once '../App.php';

if (! $session->get('user_id')) {
    $request->redirect('../login.php');
}
$session->remove('user_id');
$request->redirect('../login.php');