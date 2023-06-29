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


?>


<div class="col-sm-9 col-sm-10 mt-3">
<?php
$query = "SELECT * FROM assignwork";
$result = mysqli_query($connect, $query);
$rows = mysqli_num_rows($result);

if($rows > 0){
?>
<table class="table">
    <thead>
        <tr>
            <th>Request_id</th>
            <th>Request_info</th>
            <th>Name</th>
            <th>Address</th>
            <th>City</th>
            <th>Mobile</th>
            <th>Technician</th>
            <th>Assigned Date</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php while($line = mysqli_fetch_assoc($result)){  ?>
        <tr>
            <td><?php echo $line['request_id']; ?></td>
            <td><?php echo $line['request_info']; ?></td>
            <td><?php echo $line['requester_name']; ?></td>
            <td><?php echo $line['address_1']; ?></td>
            <td><?php echo $line['city']; ?></td>
            <td><?php echo $line['mobile']; ?></td>
            <td><?php echo $line['assign_technician']; ?></td>
            <td><?php echo $line['date']; ?></td>
            <td>
                <form action="viewassignwork.php" method="POST" class="d-inline mr-2">
                    <input type="hidden" value="<?php $line['request_id']; ?>">
                    <button class="btn btn-warning" name="view" type="submit">
                        <i class="far fa-eye"></i>
                    </button>
                </form>
                <form action="" method="POST" class="d-inline">
                    <input type="hidden" value="<?php $line['request_id']; ?>">
                    <button class="btn btn-secondary" name="delete" type="submit">
                        <i class="far fa-trash-alt"></i>
                    </button>
                </form>
            </td>

        </tr>
    </tbody>

        <?php } ?>
</table>


<?php } ?>
</div>

<?php

if(isset($_REQUEST['delete'])){
    $sql = "DELETE FROM assignwork WHERE request_id = {$_REQUEST['id']}";
    $result = mysqli_query($connect, $sql);
    if($result == TRUE){
        echo '<meta http-equiv="refresh" content="0;URL=?deleted"/>';
    }
}





?>







<?php
include('includes/footer.php');
?>