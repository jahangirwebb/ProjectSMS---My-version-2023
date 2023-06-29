<?php
 define('TITLE', 'Requests');
 include('../config.php');
 include('includes/header.php');

 session_start();
 if(isset($_SESSION["admin_logged_in"])){
    $Admin_Email = $_SESSION['email'];
}else{
    header('location:admin.php');
}

?>


<div class="col-sm-4">
    <?php
        $sql = "SELECT id, requester, description, date FROM submit_request";
        $result = mysqli_query($connect, $sql);
        $rows = mysqli_num_rows($result);

        if($rows > 0){
            while($line = mysqli_fetch_assoc($result)){

    ?>

    <div class="card mt-4 mx-5">
        <div class="card-header">
            <h6>Request ID: <?php echo $line['id']; ?></h6>
        </div>
        <div class="card-body">
            <h5 class="card-title">Request Info: <?php echo $line['requester']; ?></h5>
            <p class="card-text"><?php echo $line['description']; ?></p>
            <p class="card-text">Date:<?php echo $line['date']; ?></p>

            <div class="float-right">
                <form action="" method="POST">
                    <input type="hidden" name="id" value="<?php echo $line['id']; ?>">
                    <input type="submit" class="btn btn-danger mr-2" value="View"name="view">
                    <input type="submit" class="btn btn-secondary" value="Close" name="close">
                </form>
            </div>
        </div>
    </div>



<?php
        }
    }
?>
</div>














<?php
include('assignworkform.php');
include('includes/footer.php');
?>