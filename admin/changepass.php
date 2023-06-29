<?php
define('TITLE', 'Work Order');
include('../config.php');
include('includes/header.php');

session_start();

if(isset($_SESSION["admin_logged_in"])){
    $Admin_Email = $_SESSION['email'];
}else{
    header('location:admin.php');
}


if(isset($_REQUEST['changepass'])){
    if($_REQUEST['apassword'] == ""){
        $msg = "<div class='alert alert-danger col-sm-6 mt-3'>please fill require field.</div>";
    }else{
        $apass = $_REQUEST['apassword'];
        $sql = "UPDATE adminlogin_tb SET a_password = '$apass' WHERE a_email = '$aEmail'";

        $result = mysqli_query($connect, $sql);
        if($result == TRUE){
            $msg = "<div class='alert alert-success col-sm-6 mt-3'>Password Updated Successfully</div>";
        }else{
            $msg = "<div class='alert alert-danger col-sm-6 mt-3'>Unable to Update Password</div>";
        }
    }
}


?>







<div class="col-sm-4 col-md-5 mt-5 ml-5">
    <form action="" method="POST">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" value="<?php echo $aEmail; ?>" name="email" readonly>
        </div>
        <div class="form-group">
            <label for="email">Password</label>
            <input type="password" class="form-control" name="apassword" value>
        </div>
        <button class="btn btn-danger" name="changepass">Update</button>
        <?php if(isset($msg)) {echo $msg;} ?>
    </form>
</div>



<?php
include('includes/footer.php');
?>