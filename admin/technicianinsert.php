<?php
define('TITLE', 'Technicians');
include('../config.php');
include('includes/header.php');
session_start();

if(isset($_SESSION["admin_logged_in"])){
    $Admin_Email = $_SESSION['email'];
}else{
    header('location:admin.php');
}


if(isset($_REQUEST['add-technician'])){
    if( ($_REQUEST['name'] == '') || ($_REQUEST['city'] == '') || ($_REQUEST['mobile'] == '') || ($_REQUEST['email'] == '')){
        $msg = "<div class='alert alert-danger'>Please fill all fields</div>";
    }else{
        $name = $_REQUEST['name'];
        $city = $_REQUEST['city'];
        $mobile = $_REQUEST['mobile'];
        $email = $_REQUEST['email'];

        $sql = "INSERT INTO technician (name, city, mobile, email) VALUES('$name','$city','$mobile','$email')";
        $result = mysqli_query($connect, $sql);

        if($result == TRUE){
            header('location: technician.php');
        }else{
            $msg = "<div class='alert alert-danger'>Something went wrong</div>";
        }

    }
}


?>

<!-- Add New Technician FORM -->

<div class="col-sm-5 jumbotron">
    <h3 class="text-center">Add New Technician</h3>
    <form action="" method="POST">
        <div class="form-group">
            <label for="ID">Name</label>
            <input type="text" class="form-control" name="name" >
        </div>
        <div class="form-group">
            <label for="city">City</label>
            <input type="text" class="form-control" name="city" >
        </div>
        <div class="form-group">
            <label for="mobile">Mobile</label>
            <input type="text" class="form-control" name="mobile" >
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email" >
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-danger" name="add-technician">Submit</button>
            <a href="technician.php" class="btn btn-secondary" name="close">Close</a>
        </div>
        <?php if(isset($msg)) {echo $msg;} ?>
    </form>
</div>












<?php
include('includes/footer.php');
?>