<?php
session_start();
define('TITLE', 'Sales');
include('../config.php');
include('includes/header.php');



if(isset($_SESSION["admin_logged_in"])){
    $Admin_Email = $_SESSION['email'];
}else{
    header('location:admin.php');
}
?>


<!-- Start Second Column  -->

<div class="col-sm-9 col-md-10 mt-4 text-center">
    <form action="" method="POST" class="d-print-none">
        <div class="form-row">

            <div class="form-group col-md-2 ml-4">
                <input type="date" class="form-control" name="startdate">
            </div>
            <span>to</span>
            <div class="form-group col-md-2">
                <input type="date" class="form-control" name="enddate">
            </div>
            
            <div class="form-group">
                <input type="submit" class="btn btn-secondary" name="search-submit" value="Search">
            </div>
        </div>
    </form>

    <?php 
        if(isset($_REQUEST['search-submit'])){
            $startdate = $_REQUEST['startdate'];
            $enddate = $_REQUEST['enddate'];

            $sql = "SELECT * FROM assignwork_tb WHERE date BETWEEN '$startdate' AND '$enddate'";
            $result = mysqli_query($connect, $sql);
            $rows = mysqli_num_rows($result);
            if($rows > 0){  ?>

            <h3 class="bg-dark text-white p-2 mt-4">Details</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Requester ID</th>
                        <th scope="col">Request Info</th>
                        <th scope="col">Requester Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">City</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">Technician</th>
                        <th scope="col">Assign Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = mysqli_fetch_assoc($result)){ ?>
                        <tr>
                            <td><?php echo $row['request_id']; ?></td>
                            <td><?php echo $row['request_info']; ?></td>
                            <td><?php echo $row['request_name']; ?></td>
                            <td><?php echo $row['addressline1']; ?></td>
                            <td><?php echo $row['city']; ?></td>
                            <td><?php echo $row['mobile']; ?></td>
                            <td><?php echo $row['assigntechnician']; ?></td>
                            <td><?php echo $row['date']; ?></td>
                        </tr>
                        
                    <?php }?>
                    <tr>
                            <td>
                                <input type="submit" class="btn btn-danger d-print-none" value="print" onClick="window.print()">
                            </td>
                        </tr>
                </tbody>
            </table>
    <?php
            }else{
                echo "<div class='alert alert-warning col-sm-8 mt-3'>No Record Found !</div>";
            }
        }
    ?>
</div>




<?php
include('includes/footer.php');
?>
