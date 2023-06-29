<?php
define('TITLE', 'Admin - Dashboard');
define('PAGE', 'dashboard');
include('../config.php');
include('includes/header.php');

session_start();

if(isset($_SESSION["admin_logged_in"])){
    $Admin_Email = $_SESSION['email'];
}else{
    header('location:../admin.php');
}


// Making Admin Dashboard Dynamic

$sql = "SELECT max(id) FROM submit_request";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_row($result);

$submit_request = $row[0];

// ========================================================================

// AssignWork Table Dynamic Code
$sql = "SELECT max(request_id) FROM assignwork";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_row($result);
$assignwork = $row[0];

// ========================================================================

$sql = "SELECT * FROM technician";
$result = mysqli_query($connect, $sql);
$totaltechnician = mysqli_num_rows($result);


?>



<div class="col-sm-9 col-md-10">
    <div class="row text-center">

        <div class="col-sm-4 mt-5 px-5">
            <div class="card bg-danger text-white mb-3">
                <div class="card-header">Requests Recieved</div>
                <div class="card-body">
                    <h4 class="card-title"><?php echo $submit_request; ?></h4>
                    <a class="btn text-white" href="requesters.php">View</a>
                </div>
            </div>
        </div>


        <div class="col-sm-4 mt-5 px-5">
            <div class="card bg-success text-white mb-3">
                <div class="card-header">Assigned Work</div>
                <div class="card-body">
                    <h4 class="card-title"><?php echo $assignwork; ?></h4>
                    <a class="btn text-white" href="requesters.php">View</a>
                </div>
            </div>
        </div> 


        <div class="col-sm-4 mt-5 px-5">
            <div class="card bg-primary text-white mb-3">
                <div class="card-header">No. of Technicians</div>
                <div class="card-body">
                    <h4 class="card-title"><?php echo $totaltechnician; ?></h4>
                    <a class="btn text-white" href="requesters.php">View</a>
                </div>
            </div>
        </div>

    </div>

    <!-- Lists of Requesters -->

    <div class="text-center mt-5 mx-4">
        <h5 class="bg-dark text-white p-2">Lists Of Requesters</h5>

        <?php
        $sql = "SELECT * FROM users";
        $result = mysqli_query($connect, $sql);
        $row = mysqli_num_rows($result);
        if($row > 0){
        ?>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <?php
                while($line = mysqli_fetch_assoc($result)){
                    
                
            ?>
            <tbody>
                <tr>
                    <td><?php echo $line['id']; ?></td>
                    <td><?php echo $line['name']; ?></td>
                    <td><?php echo $line['email']; ?></td>
                </tr>
            </tbody>
            <?php
                 }
            ?>
        </table>

        


        <?php
         }
        ?>

    </div>




</div>



















<?php

include('includes/footer.php');
?>

