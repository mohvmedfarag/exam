<?php
require_once '../App.php';
require_once '../inc/connection.php';

// check id submit
if($request->check($request->post('submit')) && $request->check($request->get('id'))){

    $id = $request->get('id');

    $runQuery = $conn->prepare("select * from products where id =:id");
    $runQuery->bindParam(":id", $id, PDO::PARAM_INT);
    $runQuery->execute();
    if ($runQuery->rowCount() == 1) {
        
        $oldImgName = $runQuery->fetch(PDO::FETCH_ASSOC)['image'];
        // catch
        $title = $request->filter($request->post("title"));
        $price = $request->filter($request->post("price"));
        $desc = $request->filter($request->post("desc"));

        // validation
        $validation->endValidate("title",$title, ['Required', 'Str']);
        $validation->endValidate("price",$price, ['Required', 'IsNumber']);
        $validation->endValidate("desc",$desc, ['Required', 'Str']);

        
        
        if (! empty($image->get("img")['name'])) {

            // validation image
            $img = $image->get("img");
            $ext = $image->ext($img['name']);
            $tmpName = $img['tmp_name'];
            $newImageName = $image->newImgName($ext);
            $validation->endValidate("image",$ext,["ImgExt"]);
            $validation->endValidate("image",$img['size']/(1024*1024),["ImgSize"]);
            $validation->endValidate("image",$img['error'],["ImgErrors"]);


        } else {
            $newImageName = $oldImgName;
        }

        $errors = $validation->getErrors();

        // check errors if empty -> update
        if(empty($errors)){

            $runQuery = $conn->prepare("update products set `title` = :title , `price` = :price , `desc` = :desc , `image` = :image where id = :id");
            $runQuery->bindParam(":id", $id, PDO::PARAM_INT);
            $runQuery->bindParam(":price", $price, PDO::PARAM_INT);
            $runQuery->bindParam(":title", $title, PDO::PARAM_STR);
            $runQuery->bindParam(":desc", $desc, PDO::PARAM_STR);
            $runQuery->bindParam(":image", $newImageName, PDO::PARAM_STR);
            $result = $runQuery->execute();

            if ($result) {
                
                if (!empty($image->get("img")['name'])) {
                    $image->removeOldImg($oldImgName);
                    $image->uploadImg($tmpName, $newImageName);
                }
                $session->set("success", "product updating successfully");
                $request->redirect("../show.php?id=$id");

            } else {
                $session->set("errors", ['error while updating']);
                $request->redirect("../edit.php?id=$id");
            }
            

        }else{
            $session->set("errors", $errors);
            $request->redirect("../edit.php?id=$id");
        }
        

    } else {
        $session->set("errors", ["no products found"]);
        $request->redirect("../index.php");
    }
    
}else{
    $request->redirect("../index.php");
}
