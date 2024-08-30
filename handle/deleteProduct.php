<?php

require_once '../App.php';
require_once '../inc/connection.php';

// check id
if ($request->check($request->get('id'))) {
    
    $id = $request->get('id');

    $runQuery = $conn->prepare("select * from products where id =:id");
    $runQuery->bindParam(":id", $id, PDO::PARAM_INT);
    $runQuery->execute();
    if ($runQuery->rowCount() == 1){

        $image = $runQuery->fetch(PDO::FETCH_ASSOC)['image'];

        $runQuery = $conn->prepare("DELETE FROM products WHERE id =:id");
        $runQuery->bindParam(":id", $id, PDO::PARAM_INT);
        $result = $runQuery->execute();

        if ($result) {
            $session->set("success", "product deleted successfully");
            $request->redirect("../index.php");

        } else {
            $session->set("errors", ["error while deleting product"]);
            $request->redirect("../index.php");
        }
        

    }else{
        $session->set("errors", ["product not found"]);
        $request->redirect("../index.php");
    }

} else {
    $request->redirect("../index.php");
}
