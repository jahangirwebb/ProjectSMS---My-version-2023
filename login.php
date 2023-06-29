<?php

include('config.php');
session_start();

if(!isset($_SESSION['user_logged_in'])){

  if(isset($_REQUEST['login'])){
    $Email = $_REQUEST['email'];
    $sql = "SELECT email FROM users WHERE email = '$Email' limit 1";
    $result = mysqli_query($connect, $sql);
    
    $row = mysqli_num_rows($result);
    if($row == 1){
      $_SESSION['user_logged_in'] = true;
      $_SESSION['email'] = $Email;
      header('location: users/profile.php');
    }else{
      $msg = '<div class="alert alert-danger mt-4">Email or password is wrong.</div>';
    }
  }

}else{
  header('location:users/profile.php');
}




?>












<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <link rel="stylesheet" href="css/styles.css">


</head>
<body class="d-flex flex-column bg-dark">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-5">
                <a class="navbar-brand" href="index.php">Php Authentication</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                        <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Pricing</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">FAQ</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Blog</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Portfolio</a></li>

                    </ul>
                </div>
            </div>
        </nav>

<section class=" bg-image">

  <div class="mask d-flex align-items-center gradient-custom-3">
    <div class="container">
      <div class="row d-flex justify-content-center align-items-center ">
        <div class="col-10 col-md-8 col-lg-6 col-xl-5">
          <div class="card mt-5" style="border-radius: 5px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Create an account</h2>

              <form method="POST">

                <div class="form-outline mb-4">
                  <input type="email" name="email" class="form-control" placeholder="Email Address" required="required" />
                  
                </div>

                <div class="form-outline mb-4">
                  <input type="password" name="password" class="form-control " placeholder="Password" required="required"/>
                </div>

                <div class="d-flex justify-content-center">
                  <button type="submit"class="btn btn-success btn-block btn-lg gradient-custom-4 text-body form-control" name="login">Sign In</button>
                </div>
                <?php if(isset($msg)) {echo $msg; } ?>

                <p class="text-center text-muted mt-5 mb-0">Create a new account. <a href="signup.php"
                    class="fw-bold text-body"><u>Registration</u></a></p>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/all.min.js"></script>


</body>

</html>