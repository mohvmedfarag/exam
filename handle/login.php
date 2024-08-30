<?php

require_once '../App.php';
require_once '../inc/connection.php';

if ($request->check($request->post('submit'))) {

    // catch
    $email = $request->filter($request->post('email'));
    $password = $request->filter($request->post('password'));

    // validate
    $validation->endValidate("email", $email, ['Required', "IsEmail"]);
    $validation->endValidate("password", $password, ['Required']);

    $errors = $validation->getErrors();

    if (empty($errors)) {

        $runQuery = $conn->prepare("SELECT * FROM users WHERE `email` = :email");
        $runQuery->bindParam(":email", $email, PDO::PARAM_STR);
        $runQuery->execute();
        if ($runQuery->rowCount() == 1){

            $user = $runQuery->fetch(PDO::FETCH_ASSOC);
            $id = $user['id'];
            $name = $user['name'];
            $oldPassword = $user['password'];
            $status = $user['status'];

            $verify = $hash->verify($password, $oldPassword);

            if ($verify) {

                $session->set("user_id", $id);
                $session->set('status', $status);
                $session->set("success", "welcome $name");
                $request->redirect("../index.php");
                
            } else {

                $session->set("errors", ["password incorrect"]);
                $request->redirect("../login.php");

            }
            

        }else{
            $session->set("errors", ["user not found"]);
            $request->redirect("../login.php");
        }

    }else{
        $session->set("errors",$errors);
        $request->redirect("../login.php");
    }
    
} else {
    $request->redirect('../login.php');
}
