<?php


define('TITLE', 'User Profile');
include('../config.php');
include('includes/header.php');
session_start();

if($_SESSION['user_logged_in']){
    $Email = $_SESSION['email'];
}else{
    header('location:../login.php');
}

$sql = "SELECT name, email FROM users WHERE email = '$Email'";
$result = mysqli_query($connect, $sql);
$rows = mysqli_num_rows($result);

if($rows == 1){
    $line = mysqli_fetch_assoc($result);
    $Name = $line['name'];
}


// Update UserName 

if(isset($_REQUEST['nameupdate'])){
    if($_REQUEST['Name'] == ""){
        $msg = '<div class="alert alert-warning mt-2">Please fill the required field</div>';
    }else{
        $Name = $_REQUEST['Name'];
        $query = "UPDATE users SET name = '$Name' WHERE email = '$Email'";
        $result = mysqli_query($connect, $query);

        if($result == TRUE){
            header("Location: ".$_SERVER['PHP_SELF']);
        }else{
            $msg = "<div class='alert alert-danger mt-2'>Unable to update</div>";
        }
    }
}









?>


            <div class="col-sm-6 mt-5">       <!-- User Right Side Area -->
                <form action="" method="POST" class="mx-5">

                    <div class="form-group">
                        <label for="Email">Email</label>
                        <input type="email" class="form-control" name="Email" id="rEmail" autocomplete="off" readonly value="<?php echo $Email;?>">
                    </div>

                    <div class="form-group">
                        <label for="Email">Name</label>
                        <input type="text" class="form-control" name="Name" id="rName" autocomplete="off" value="<?php echo $Name;?>">
                    </div>

                    <button type="submit" class="btn btn-danger" name="nameupdate">Update</button>
                    <?php if(isset($msg)) {echo $msg; } ?>

                </form>
            </div>













<?php
include('includes/footer.php');
?>