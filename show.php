<?php 
include 'inc/header.php'; 
require_once 'App.php';
require_once 'inc/connection.php';
?>

<?php
    if($request->check($request->get('id'))){
        $id = $request->get('id');
        $runQuery = $conn->prepare("select * from products where id = :id");
        $runQuery->bindParam(":id", $id, PDO::PARAM_INT);
        $runQuery->execute();
        if ($runQuery->rowCount() == 1){
            $product = $runQuery->fetch(PDO::FETCH_ASSOC);
        }else{
            echo "Product not found";
        }
    }else{
        $request->redirect("index.php");
    }
?>


<div class="container my-5">

    <div class="row">
    <?php require_once 'inc/success.php' ?>
    
        <div class="col-lg-6">
            <img src="images/<?= $product['image'] ?>" class="card-img-top">
            </div>
            <div class="col-lg-6">
            <h5 ><?= $product['title'] ?></h5>
            <p class="text-muted">Price: <?= $product['price'] ?> EGP</p>
            <p><?= $product['desc'] ?></p>
            <a href="index.php" class="btn btn-primary">Back</a>

            <?php 
                if ($session->get("user_id")) {
                    if($session->get("status") == 'admin'){
                    ?>
                    <a href="edit.php?id=<?= $product['id'] ?>" class="btn btn-info">Edit</a>
                    <a href="handle/deleteProduct.php?id=<?= $product['id'] ?>" class="btn btn-danger">Delete</a>
             <?php  } }
            ?>
            


        </div>
        
    </div>
</div>



<?php include 'inc/footer.php'; ?>