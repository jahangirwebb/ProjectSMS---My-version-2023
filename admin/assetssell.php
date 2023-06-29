<?php
define('TITLE', 'Sell Products');
include('includes/header.php');
include('../config.php');

session_start();
if(isset($_SESSION["admin_logged_in"])){
    $Admin_Email = $_SESSION['email'];
}else{
    header('location:admin.php');
}



// UPDATING ASSETS CODE

if(isset($_REQUEST['f-submit'])){

    if( ($_REQUEST['customer_name'] == '') || ($_REQUEST['customer_address'] == '') || ($_REQUEST['product_avail'] == '') || ($_REQUEST['quantity'] == '') || ($_REQUEST['price_each'] == '') || ($_REQUEST['total_price'] == '') || ($_REQUEST['selldate'] == '')  ){
        $msg = "<div class='alert alert-warning mt-3 ml-3'>please fill all fields</div>";
    }else{

        $pid = $_REQUEST['pid'];
        $pava = $_REQUEST['product_avail'] - $_REQUEST['quantity'];

        $customer_name = $_REQUEST['customer_name'];
        $customer_add = $_REQUEST['customer_address'];
        $product_name = $_REQUEST['product_name'];
       // $product_avail = $_REQUEST['product_avail'];
        $quantity = $_REQUEST['quantity'];
        $price_each = $_REQUEST['price_each'];
        $total_price = $_REQUEST['total_price'];
        $selldate = $_REQUEST['selldate'];

        $query = "INSERT INTO customers (name, address, product_name, quantity, price_each, price_total, sell_date  )VALUE ('$customer_name', '$customer_add', '$product_name', '$quantity', '$price_each', '$total_price', '$selldate')";

        if(mysqli_query($connect, $query) == TRUE){
            $genid = mysqli_insert_id($connect);
            session_start();
            $_SESSION['myid'] = $genid;
            echo "<script>location.href='assetssellsuccess.php';</script>";
        }

        $sql_update = "UPDATE assets SET product_avail = '$pava' WHERE product_id = '$pid'";
        
    }

}


?>


<div class="jombotron col-sm-6 mt-5 mx-5s">
    <h3>Selling Produts / Sales Bill</h3>
    <?php
        if(isset($_REQEUST['issue'])){
            $query =  "SELECT * FROM assets WHERE id = {$_REQUEST['id']}";
            $result = mysqli_query($connect, $query);
            $row = mysqli_fetch_assoc($result);
        }
    ?>

    <form action="" method="POST">
        
        <div class="form-group">
            <label for="pid">Product ID</label>
            <input type="text" class="form-control" name="pid" autocomplete="off" value="<?php if(isset($row['id'])) { echo $row['id']; } ?>" readonly>
        </div>

        <div class="form-group">
            <label for="cname">Customer Name</label>
            <input type="text" class="form-control" name="customer_name" autocomplete="off"> 
        </div>

        <div class="form-group">
            <label for="caddress">Customer Address</label>
            <input type="text" class="form-control" name="customer_address" autocomplete="off"> 
        </div>

        <div class="form-group">
            <label for="pname">Product Name</label>
            <input type="text" class="form-control" name="product_name" autocomplete="off" value="<?php if(isset($row['product_name'])) { echo $row['product_name']; } ?>" readonly> 
        </div>

        <div class="form-group">
            <label for="pavail">Product Available</label>
            <input type="text" class="form-control" name="product_avail" autocomplete="off" value="<?php if(isset($row['product_avail'])) { echo $row['product_avail']; } ?>"> 
        </div>

        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="text" class="form-control" name="quantity" autocomplete="off"> 
        </div>

        <div class="form-group">
            <label for="price">Price Each</label>
            <input type="text" class="form-control" name="price_each" autocomplete="off" value="<?php if(isset($row['product_cost'])) { echo $row['product_cost']; } ?>"> 
        </div>

        <div class="form-group">
            <label for="Total Price">Total Price</label>
            <input type="text" class="form-control" name="total_price" autocomplete="off"> 
        </div>

        <div class="form-group">
            <label for="Sell Date">Date</label>
            <input type="date" name="selldate" autocomplete="off"> 
        </div>

        <div class="text-center">
            <button class="btn btn-danger" type="submit" name="f-submit">Submit</button>
            <a href="assets.php" class="btn btn-secondary">Close</a>
        </div>

    </form>
</div>







<?php
include('includes/footer.php');
?>