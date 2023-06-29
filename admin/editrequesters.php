<?php
define('TITLE', 'Edit - Requesters');
include('../config.php');
include('includes/header.php');
session_start();

if(isset($_SESSION["admin_logged_in"])){
    $Admin_Email = $_SESSION['email'];
}else{
    header('location:admin.php');
}


?>




<div class="col-sm-6 jumbotron mt-4 ml-4">
    <h3 class="text-center">Update Details</h3>
<?php
if(isset($_REQUEST['edit'])){

        $query = "SELECT * FROM users WHERE id = {$_REQUEST['id']}";
        $result = mysqli_query($connect, $query);
        $row = mysqli_fetch_assoc($result);
}


    if(isset($_REQUEST['save'])){
        if(($_REQUEST['id'] == "") 
            || ($_REQUEST['name'] == "") 
            || ($_REQUEST['email'] == ""))
            { $msg = '<div class="alert alert-warning col-sm-5">Please fill required Fields</div>';
            }else{
                $id = $_REQUEST['id'];
                $name = $_REQUEST['name'];
                $email = $_REQUEST['email'];

                $sql = "UPDATE users SET id = '$id', name = '$name', email = '$email' WHERE id = '$id'";
                $update_result = mysqli_query($connect, $sql);
                if($update_result == TRUE){
                    header('location: requesters.php');
                }
            }
    }

?>

    <form action="" method="POST">
        <div class="form-group">
            <label for="">Requester ID</label>
            <input type="text" class="form-control" name="id" value='<?php if(isset($row["id"])){echo $row["id"];} ?>' readonly>
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" value="<?php if(isset($row['name'])){echo $row['name'];} ?>">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" value="<?php if(isset($row['email'])){ echo $row['email'];} ?>">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-danger" name="save">Save</button>
            <a href="requesters.php" class="btn btn-secondary">Close</a>
        </div>
    </form>


    <?php if(isset($msg)){echo $msg;}  ?>
</div>











<?php
include('includes/footer.php');
?>