<?php
define('TITLE', 'Change Password');
include('../config.php');
include('includes/header.php');
session_start();

if($_SESSION['user_logged_in']){
    $Email = $_SESSION['email'];
}else{
    header('location:../login.php');
}


if(isset($_REQUEST['changepass'])){
    if($_REQUEST['password'] == ""){
        $msg = "<div class='alert alert-danger col-sm-6 mt-3'>please fill require field.</div>";
    }else{
        $Password = $_REQUEST['password'];
        $sql = "UPDATE users SET password = '$Password' WHERE email = '$Email'";
        $result = mysqli_query($connect, $sql);

        if($result == TRUE){
            header("Location: ".$_SERVER['PHP_SELF']);
        }else{
            $msg = "<div class='alert alert-danger mt-2'>Unable to update</div>";
        }
    }
}






?>


<div class="col-sm-4 col-md-5 mt-5 ml-5">
    <form action="" method="POST">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" value="<?php echo $Email; ?>" name="email" readonly>
        </div>
        <div class="form-group">
            <label for="email">Password</label>
            <input type="password" class="form-control" name="password" >
        </div>
        <button class="btn btn-danger" name="changepass">Update</button>
        <?php if(isset($msg)) {echo $msg;} ?>
    </form>
</div>












<?php
include('includes/footer.php');
?>