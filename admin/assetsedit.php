<?php

define('TITLE', 'Asset Edit');
include('includes/header.php');
include('../config.php');

session_start();
if(isset($_SESSION["admin_logged_in"])){
    $Admin_Email = $_SESSION['email'];
}else{
    header('location:admin.php');
}



// Fetching Data from Datab base table with Fetch_assoc

if(isset($_REQUEST['id'])){
    $sql = "SELECT * FROM assets WHERE id = {$_REQUEST['id']}";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);

}


// Updating Assets

if(isset($_REQUEST['asset-update'])){

    if( ($_REQUEST['pname'] == "") || ($_REQUEST['pdop'] == "") ||($_REQUEST['pavail'] == "") ||($_REQUEST['ptotal'] == "") ||($_REQUEST['pcostprice'] == "") ||($_REQUEST['psellprice'] == "") ){ 
        $msg = "<div class='alert alert-warning mt-4 ml-3'>Please Fill All Fields</div>";
    }else{
        $pid = $_REQUEST['pid'];
        $pname = $_REQUEST['pname'];
        $pdop = $_REQUEST['pdop'];
        $pavail = $_REQUEST['pavail'];
        $ptotal = $_REQUEST['ptotal'];
        $costprice = $_REQUEST['pcostprice'];
        $sellprice = $_REQUEST['psellprice'];

        $query = "UPDATE assets SET product_name = '$pname', product_dop = '$pdop', product_avail = '$pavail', product_total = '$ptotal', product_cost = '$costprice', sell_price = '$sellprice' WHERE id = '$pid'";
        $result = mysqli_query($connect, $query);

        if($result == TRUE){
            $msg = "<div class='alert alert-success mt-4 ml-3'>Updated Successfully</div>";
        }else{
            $msg = "<div class='alert alert-danger mt-4 ml-3'>Something went wrong</div>";
        }
    }
}


?>




<!-- Code For Editing Assets -->

<div class="jumbotron col-sm-6 mt-5 mx-5">
    <h3 class="text-center">Update Details</h3>
    <form action="" method="POST">

        <div class="form-group">
            <label for="product-id">Product ID</label>
            <input type="text" class="form-control" name="pid" autocomplete="off" readonly value="<?php if(isset($row['id'])) {echo $row['id'];}  ?>">
        </div>

        <div class="form-group">
            <label for="product name">Product Name</label>
            <input type="text" class="form-control" name="pname" autocomplete="off"  value="<?php if(isset($row['product_name'])){echo $row['product_name'];}  ?>">
        </div>

        <div class="form-group">
            <label for="product date">Product DOP</label>
            <input type="text" class="form-control" name="pdop" autocomplete="off" value="<?php if(isset($row['product_dop'])) {echo $row['product_dop'];} ?>">
        </div>

        <div class="form-group">
            <label for="product available">Product Available</label>
            <input type="text" class="form-control" name="pavail" autocomplete="off" value="<?php if(isset($row['product_avail'])) {echo $row['product_avail'];} ?>">
        </div>

        <div class="form-group">
            <label for="product total">Total Products</label>
            <input type="text" class="form-control" name="ptotal" autocomplete="off" value="<?php if(isset($row['product_total'])){echo $row['product_total'];}  ?>">
        </div>

        <div class="form-group">
            <label for="product cost">Product Cost Price</label>
            <input type="text" class="form-control" name="pcostprice" autocomplete="off" value="<?php if(isset($row['product_cost'])){echo $row['product_cost'];}  ?>">
        </div>

        <div class="form-group">
            <label for="product-sell">Product Sell Price</label>
            <input type="text" class="form-control" name="psellprice" autocomplete="off" value="<?php if(isset($row['sell_price'])){echo $row['sell_price'];} ?>">
        </div>

        <div class="text-center">
            <button class="btn btn-danger" type="submit" name="asset-update">Update</button>
            <a href="assets.php" class="btn btn-secondary">Close</a>
        </div>

        <?php if(isset($msg)){echo $msg; }  ?>

    </form>
</div>






<?php
include('includes/footer.php');
?>