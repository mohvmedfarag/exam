<?php 
require_once 'App.php';
require_once 'inc/connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                <?php 
                    require_once 'inc/errors.php';
                ?>

                <form class="mx-1 mx-md-4" action="handle/register.php" method="post" >

                  <div class="d-flex flex-row align-items-center mb-4">
                    <div data-mdb-input-init class="form-outline flex-fill mb-0">
                        
                      <input type="text" name="name" id="form3Example1c" class="form-control" placeholder="enter your name..." />
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    
                    <div data-mdb-input-init class="form-outline flex-fill mb-0">
                        
                      <input type="email" name="email" id="form3Example3c" class="form-control" placeholder="enter your email..." />
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                   
                    <div data-mdb-input-init class="form-outline flex-fill mb-0">
                      
                      <input type="password" name="password" id="form3Example4c" class="form-control" placeholder="enter your password..." />
                    </div>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button  type="submit" name="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg">Register</button>
                  </div>

                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>