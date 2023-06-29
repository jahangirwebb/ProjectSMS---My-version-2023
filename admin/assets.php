<?php
define('TITLE', 'Assets');
include('includes/header.php');
include('../config.php');


session_start();
if(isset($_SESSION["admin_logged_in"])){
    $Admin_Email = $_SESSION['email'];
}else{
    header('location:admin.php');
}


?>

<div class="col-sm-9 col-md-10 mt-4 text-center">
    <p class='bg-dark text-white p-2 mb-4'>Assest/Products Details</p>

    <?php
    $query = "SELECT * FROM assets";
    $result = mysqli_query($connect, $query);
    $num_rows = mysqli_num_rows($result);

    if($num_rows > 0){ ?>

    <table class="table text-center">
        <thead >
            <tr>
                <th>Product ID</th>
                <th>Name</th>
                <th>Purchase Date</th>
                <th>Stock Available</th>
                <th>Total Stock</th>
                <th>Cost Price</th>
                <th>Sell Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while($row = mysqli_fetch_assoc($result)){ ?>
            <tr>
                <td><?php echo $row['id'] ?></td>
                <td><?php echo $row['product_name'] ?></td>
                <td><?php echo $row['product_dop'] ?></td>
                <td><?php echo $row['product_avail'] ?></td>
                <td><?php echo $row['product_total'] ?></td>
                <td><?php echo $row['product_cost'] ?></td>
                <td><?php echo $row['sell_price'] ?></td>

                <td>
                    <!-- Product Edit -->
                    <form action="assetsedit.php" method="POST" class="d-inline">
                        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                        <button class="btn btn-info" type="submit" name="edit"><i class="fas fa-pen"></i></button>
                    </form>
                    <!-- Product Delete -->
                    <form action="" method="POST" class="d-inline">
                        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                        <button class="btn btn-secondary" type="submit" name="delete"><i class="fas fa-trash-alt"></i></button>
                    </form>
                    <!-- Product Sold -->
                    <form action="assetssell.php" method="POST" class="d-inline">
                        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                        <button class="btn btn-info" type="submit" name="issue"><i class="fas fa-handshake"></i></button>
                    </form>
                </td>
            </tr>
        </tbody>

        <?php } ?>
    </table>

<?php } ?>
</div>


<!-- Delete Query -->

<?php
if(isset($_REQUEST['delete'])){
    $query = "DELETE FROM assets WHERE product_id = {$_REQUEST['id']}";
    $result = mysqli_query($connect, $query);
    if($result == TRUE){
        echo '<meta http-equiv="refresh" content=0;URL=?deleted />';
    }
}
?>










    </div>

    <!-- Adding new Assets Button -->
         <div class="float-right my-5"><a href="assetsinsert.php" class="btn btn-danger"><i class="fas fa-plus fa-2x"></i></a></div>
    </div>
        <!-- Javascript -->

    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/all.min.js"></script>    
    
</body>
</html>