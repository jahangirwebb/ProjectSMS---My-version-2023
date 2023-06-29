<?php
define('TITLE', 'Add Product');
include('includes/header.php');
include('../config.php');


session_start();
if(isset($_SESSION["admin_logged_in"])){
    $Admin_Email = $_SESSION['email'];
}else{
    header('location:admin.php');
}

if(isset($_REQUEST['product-submit'])){

    if( 
        ($_REQUEST['product-name'] == '') || 
        ($_REQUEST['product-dop'] == '') || 
        ($_REQUEST['product-avail'] == '') || 
        ($_REQUEST['product-total'] == '') || 
        ($_REQUEST['buy-price'] == '') || 
        ($_REQUEST['sell-price'] == '')){
        
        $msg = "<div class='alert alert-warning col-sm-6 mt-4 ml-3'>Please Fill All Fields</div>";
    }else{
        $product_name = $_REQUEST['product-name'];
        $product_dop = $_REQUEST['product-dop'];
        $product_avail = $_REQUEST['product-avail'];
        $product_total = $_REQUEST['product-total'];
        $buy_price = $_REQUEST['buy-price'];
        $sell_price = $_REQUEST['sell-price'];
        
        $sql = "INSERT INTO assets (product_name, product_dop, product_avail, product_total, product_cost, sell_price) VALUES ('$product_name', '$product_dop','$product_avail', '$product_total', '$buy_price', '$sell_price' )";

        $result = mysqli_query($connect, $sql);

        if($result){
            $msg = "<div class='alert alert-success col-sm-6 mt-4 ml-3'>Product Added Successfully</div>";
        }else{
            $msg = "<div class='alert alert-danger col-sm-6 mt-4 ml-3'>Product Added Successfully</div>";
        }
    }
}

?>




<div class="col-sm-6 jumbotron mt-5 mx-5">
    <h3 class="text-center">Add New Product</h3>
    <form action="" method="POST">
        <div class="form-group">
            <label for="product-name">Product Name</label>
            <input type="text" class="form-control" name="product-name" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="pdop">Date of Purchase</label>
            <input type="date" class="form-control" name="product-dop" id="pdop" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="product-avail">Available Products</label>
            <input type="text" class="form-control" name="product-avail" id="product-avail" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="ptotal">Total Products</label>
            <input type="text" class="form-control" name="product-total" id="ptotal" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="product-price">Product Cost Price</label>
            <input type="text" class="form-control" name="buy-price" id="pcostprice" autocomplete="off">
        </div>
        <div class="form-group">
            <label for=" sellprice">Product Sell Price</label>
            <input type="text" class="form-control" name="sell-price" id="psellprice" autocomplete="off">
        </div>
        <div class="text-center">
            <button class="btn btn-danger" type="submit" name="product-submit" id="psubmit">Submit</button>
            <a href="assets.php" class="btn btn-secondary">Close</a>
        </div>
            <?php  if(isset($msg)){ echo $msg; } ?>
    </form>
</div>















<?php
include('includes/footer.php');
?>