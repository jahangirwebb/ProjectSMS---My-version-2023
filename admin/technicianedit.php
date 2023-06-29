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



?>




<div class="jumbotron col-sm-6 mt-4 ml-4">
    <h3 class="text-center">Update Details</h3>

    <?php

    if(isset($_REQUEST['edit'])){
        $sql = "SELECT * FROM technician WHERE id = {$_REQUEST['id']}";
        $result = mysqli_query($connect, $sql);
        $row = mysqli_fetch_assoc($result);
    }

    if(isset($_REQUEST['update'])){
            $id = $_REQUEST['id'];
            $name = $_REQUEST['name'];
            $city = $_REQUEST['city'];
            $mobile = $_REQUEST['mobile'];
            $email = $_REQUEST['email'];

            $query = "UPDATE technician SET id = '$id', name = '$name', city = '$city', mobile = '$mobile', email = '$email' WHERE id = '$id'";
            $result = mysqli_query($connect, $query);

            if($result == TRUE){
                $msg = "<div class='alert alert-danger'>Updated Successfully</div>";
            }else{
                $msg = "<div class='alert alert-danger'>Something went wrong</div>";
            }
        }


    ?>

    <form action="" method="POST">
        <div class="form-group">
            <label for="ID">Technician ID</label>
            <input type="text" class="form-control" name="id" value="<?php if(isset ($row['id'])){echo $row['id'];} ?>" readonly required>
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" value="<?php if(isset ($row['name'])){echo $row['name'];} ?>" required>
        </div>
        <div class="form-group">
            <label for="city">City</label>
            <input type="text" class="form-control" name="city" value="<?php if(isset ($row['city'])){echo $row['city'];} ?>" required>
        </div>

        <div class="form-group">
            <label for="Mobile">Mobile</label>
            <input type="text" class="form-control" name="mobile" value="<?php if(isset ($row['mobile'])){echo $row['mobile'];} ?>" required>
        </div>

        <div class="form-group">
            <label for="Email">Email</label>
            <input type="email" class="form-control" name="email" value="<?php if(isset ($row['email'])){echo $row['email'];} ?>" required>
        </div>
        <div class="text-center mt-4">
            <button type="submit" class="btn btn-danger" name="update">Update</button>
            <a href="technician.php" class="btn btn-secondary" name="close">Close</a>
        </div>
    </form>
    <?php if(isset($msg)) {echo $msg;} ?>



</div>












<?php
include('includes/footer.php');
?>