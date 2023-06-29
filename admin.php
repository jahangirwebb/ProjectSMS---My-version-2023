<?php

define('TITLE', 'Admin - Login');
include('config.php');

session_start();

if(!isset($_SESSION['admin_logged_in'])){

    if(isset($_REQUEST['login'])){
        $Admin_Email = trim($_REQUEST['email']);
        $Password = trim($_REQUEST['password']);
    
        $sql = "SELECT * FROM admins WHERE email = '$Admin_Email'";
        $result = mysqli_query($connect, $sql);
        $row = mysqli_num_rows($result);
    
        if($row == 1){
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['email'] = $Admin_Email;
            header('location: admin/dashboard.php');
        }else{
            $msg = '<div class="alert alert-danger mt-4">Email or password is wrong.</div>';
        }
    }

}else{
    header('location: admin/dashboard.php');
}










?>














<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo TITLE ?></title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">

    <link rel="stylesheet" href="css/styles.css">
   
    


</head>
<body class="d-flex flex-column bg-dark">



  <div class="mask d-flex align-items-center gradient-custom-3">
    <div class="container">
      <div class="row d-flex justify-content-center align-items-center ">
        <div class="col-10 col-md-8 col-lg-6 col-xl-5">
          <div class="card mt-5" style="border-radius: 5px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Admin Login</h2>

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