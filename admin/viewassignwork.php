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

<div class="col-sm-6 mx-5 mt-3">
    <h3 class="text-center mb-3">Assigned Work Details</h3>

<?php
    if(isset($_REQUEST['view'])){

    $query = "SELECT * FROM assignwork WHERE request_id = {$_REQUEST['id']}";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($result); 
?>

    <table class="table table-bordered ">
        <tbody>
            <tr>
                <td>Request ID</td>
                <td><?php if(isset($row['request_id'])) { echo $row['request_id']; } ?></td>
            </tr>
            <tr>
                <td>Request Info</td>
                <td><?php if(isset($row['request_info'])) { echo $row['request_info']; } ?></td>
            </tr>
            <tr>
                <td>Request Desc</td>
                <td><?php if(isset($row['description'])) { echo $row['description']; } ?></td>
            </tr>
            <tr>
                <td>Request Name</td>
                <td><?php if(isset($row['requester_name'])) { echo $row['requester_name']; } ?></td>
            </tr>
            <tr>
                <td>Address 1</td>
                <td><?php if(isset($row['address_1'])) { echo $row['address_1']; } ?></td>
            </tr>
            <tr>
                <td>Address 2</td>
                <td><?php if(isset($row['address_2'])) { echo $row['address_2']; } ?></td>
            </tr>
            <tr>
                <td>City</td>
                <td><?php if(isset($row['city'])) { echo $row['city']; } ?></td>
            </tr>
            <tr>
                <td>State</td>
                <td><?php if(isset($row['state'])) { echo $row['state']; } ?></td>
            </tr>
            <tr>
                <td>Zip</td>
                <td><?php if(isset($row['zip'])) { echo $row['zip']; } ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?php if(isset($row['email'])) { echo $row['email']; } ?></td>
            </tr>
            <tr>
                <td>Mobile</td>
                <td><?php if(isset($row['mobile'])) { echo $row['mobile']; } ?></td>
            </tr>
            <tr>
                <td>Assign Technician</td>
                <td><?php if(isset($row['assigntechnician'])) { echo $row['assigntechnician']; } ?></td>
            </tr>
            <tr>
                <td>Date</td>
                <td><?php if(isset($row['date'])) { echo $row['date']; } ?></td>
            </tr>
        </tbody>
    </table>

    <div class="text-center">
        <form action="" class="mb-5 d-print-none d-inline">
            <input type="submit" class="btn btn-danger mr-2" value="Print" onclick="window.print()">
        </form>
        <form action="workorder.php" class="d-inline">
            <input type="submit" class="btn btn-secondary" value="Close">
        </form>
    </div>

<?php
}
?>
</div>









<?php
include('includes/footer.php');
?>