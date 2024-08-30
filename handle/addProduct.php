<?php

require_once '../App.php';
require_once '../inc/connection.php';

// check
if ($request->check($request->post("submit"))) {

    // catch
    $title = $request->filter($request->post("title"));
    $price = $request->filter($request->post("price"));
    $desc = $request->filter($request->post("desc"));

    
    // validation (name and desc -> Required & String , price->number)
    $validation->endValidate("title",$title, ['Required', 'Str']);
    $validation->endValidate("price",$price, ['Required', 'IsNumber']);
    $validation->endValidate("desc",$desc, ['Required', 'Str']);
    
    // validation image -> extensions & size & errors
    $img = $image->get('img');
    $ext = $image->ext($img['name']);
    $tmpName = $img['tmp_name'];
    $newImageName = $image->newImgName($ext);
    $validation->endValidate("image",$ext,["ImgExt"]);
    $validation->endValidate("image",$img['size']/(1024*1024),["ImgSize"]);
    $validation->endValidate("image",$img['error'],["ImgErrors"]);
    
    

    $errors = $validation->getErrors();

    if(empty($errors)){

        // insert
        $runQuery = $conn->prepare("INSERT INTO products (`title`, `price`, `desc`, `image`) VALUES (:title, :price, :desc, :image)");
        $runQuery->bindParam(":title", $title, PDO::PARAM_STR);
        $runQuery->bindParam(":price", $price, PDO::PARAM_INT);
        $runQuery->bindParam(":desc", $desc, PDO::PARAM_STR);
        $runQuery->bindParam(":image", $newImageName, PDO::PARAM_STR);
        $result = $runQuery->execute();
        if ($result) {
            $image->uploadImg($tmpName, $newImageName);
            $session->set("success", "product inserted successfully");
            $request->redirect("../index.php");
        } else {
            $session->set("errors",["error while inserting product"]);
            $request->redirect("../index.php");
        }
        
    }else{
        // errors
        $session->set("errors",$errors);
        $request->redirect("../add.php");
    }



} else {
    $request->redirect("../index.php");
}


