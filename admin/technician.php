<?php
define('TITLE', 'Technicians');
include('../config.php');
include('includes/header.php');
session_start();

if(isset($_SESSION["admin_logged_in"])){
    $Admin_Email = $_SESSION['email'];
}else{
    header('location:admin.php');
}



?>

<div class="col-sm-9 col-md-10 mt-4">
    <h5 class="bg-dark text-white text-center py-2">List of Technicians</h5>
    <!-- PHP CODE FOR Technicians Table -->
    <?php
        $sql = "SELECT * FROM technician";
        $result = mysqli_query($connect, $sql);
        $rows = mysqli_num_rows($result);

        // IF Records is Available Then Table will be Created
        if($rows > 0){
     ?>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>City</th>
                    <th>Mobile</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php
            While($row = mysqli_fetch_assoc($result)){ ?>

            <tbody>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['city']; ?></td>
                    <td><?php echo $row['mobile']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td>
                        <!-- Edit Button -->
                        <form action="technicianedit.php" method="POST" class="d-inline">
                            <input type="hidden" name="id" value="<?php echo $row['id'];?> ">
                            <button class="btn btn-info" name="edit" type="submit">
                                <i class="fas fa-pen"></i>
                            </button>
                        </form>
                        <!-- Delete Button -->
                        <form action="" method="POST" class="d-inline">
                            <input type="hidden" name="id" value="<?php echo $row['id'];?> ">
                            <button class="btn btn-secondary" name="delete" type="submit">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            </tbody>

            <?php  } ?>
        </table>

<?php
} 
?>
</div>


<?php
if(isset($_REQUEST['delete'])){
    $sql = "DELETE FROM technician WHERE id = {$_REQUEST['id']}";
    $result = mysqli_query($connect, $sql);
    if($result == TRUE){
      echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
    }else{
        $msg = "<div class='alert alert-danger'>Something went wrong</div>";
    }
  }
?>








</div>
        <div class="float-right my-5"><a href="technicianinsert.php" class="btn btn-danger"><i class="fas fa-plus fa-2x"></i></a></div>
        </div>
        <!-- Javascript -->

    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/all.min.js"></script>    
    
</body>
</html>