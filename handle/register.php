<?php
require_once '../App.php';
require_once '../inc/connection.php';

if ($request->check($request->post('submit'))) {
    
    // catch
    $name = $request->filter($request->post('name'));
    $email = $request->filter($request->post('email'));
    $password = $request->filter($request->post('password'));

    // validation
    $validation->endValidate("username", $name, ['Required', "Str"]);
    $validation->endValidate("email", $email, ['Required', "IsEmail"]);
    $validation->endValidate("password", $password, ['Required']);

    $errors = $validation->getErrors();

    if (empty($errors)) {

        $passwordHash = $hash->hash($password);
        
        $runQuery = $conn->prepare("insert into users (`name`, `email`, `password`) values (:name, :email, :password)");
        $runQuery->bindParam(":name", $name, PDO::PARAM_STR); 
        $runQuery->bindParam(":email", $email, PDO::PARAM_STR); 
        $runQuery->bindParam(":password", $passwordHash, PDO::PARAM_STR); 

        $result = $runQuery->execute();
        if ($result) {
            $session->set("success", "user inserted successfully");
            $request->redirect("../login.php");
        } else {
            $session->set("errors", ['error while register']);
            $request->redirect("../register.php");
        }
        

    } else {
        $session->set("errors",$errors);
        $request->redirect("../register.php");
    }
    


} else {
    $request->redirect("../register.php");
}
