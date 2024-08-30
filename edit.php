<?php include 'inc/header.php';
require_once 'App.php';
require_once 'inc/connection.php';
?>

<div class="container my-5">
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
        <?php
    if($request->get('id')){
        $id = $request->get('id');
        $runQuery = $conn->prepare("select * from products WHERE id = :id");
        $runQuery->bindParam(':id',$id, PDO::PARAM_INT);
        $runQuery->execute();
        if ($runQuery->rowCount() ==1) {
            $product = $runQuery->fetch(PDO::PARAM_STR);
        } else {
            $session->set('errors',['product not found']);
            $request->redirect("index.php");
        }
        
    }else{
        $request->redirect("index.php");
    }
?>
            <?php
                require_once 'inc/errors.php';
                require_once 'inc/success.php';
            ?>
            <form action="handle/editProduct.php?id=<?= $product['id'] ?>" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="name" name = "title" value="<?= $product['title'] ?>">
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price:</label>
                    <input type="number" class="form-control" id="price" name="price" value="<?= $product['price'] ?>">
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Description:</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name = "desc"><?= $product['desc'] ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="formFile" class="form-label">Image:</label>
                    <input class="form-control" type="file" id="formFile" name="img" src="images/<?= $product['image'] ?>">
                </div>

                <div class="col-lg-3">
                    <img src="images/<?= $product['image'] ?>" class="card-img-top" width="100px">
                </div>
                        
                <center><button on type="submit" class="btn btn-primary" name="submit">Add</button></center>
            </form>
        </div>
    </div>
</div>



<?php include 'inc/footer.php'; ?>