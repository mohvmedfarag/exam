<?php 
include 'inc/header.php'; 
require_once 'App.php';
require_once 'inc/connection.php';
?>

<div class="container my-5">
    <?php
    require_once 'inc/success.php';
    require_once 'inc/errors.php';
    ?>
    <div class="row">
        
    <?php

    $runQuery = $conn->query("select `id`, `title`, `price`, `image`, substring(`desc`, 1, 50) as `desc` from products");
    if ($runQuery->rowCount() > 0) {
        $products = $runQuery->fetchAll(); 
        foreach ($products as $product){ ?>
            
            <div class="col-lg-4 mb-3">
                <div class="card">
                    <img src="images/<?= $product['image'] ?>" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title"><?= $product['title'] ?></h5>
                        <p class="text-muted"><?= $product['price'] ?> EGP</p>
                        <p class="card-text"><?= $product['desc'] ?>...etc</p>
                        <a href="show.php?id=<?= $product['id'] ?>" class="btn btn-primary">Show</a>
                        <?php if($session->get('user_id')){
                                    if($session->get('status') == 'admin'){
                            ?>
                            <a href="edit.php?id=<?= $product['id'] ?>" class="btn btn-info">Edit</a>
                            <a href="handle/deleteProduct.php?id=<?= $product['id'] ?>" class="btn btn-danger">Delete</a>

                      <?php } } ?>
                    </div>
                </div>
            </div>
            <?php
            }
    } else {
        echo "no products found";
    }
    ?>
        
    </div>

</div>

<?php include 'inc/footer.php'; ?>