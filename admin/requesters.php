<?php
define('TITLE', 'Requesters');
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
    <p class="bg-dark text-center text-white p-2">List Of Requesters</p>
    <?php
        $query = "SELECT * FROM users";
        $result = mysqli_query($connect, $query);
        $num_rows = mysqli_num_rows($result);

        if($num_rows > 0){
            
    ?>

<table class="table text-center">
            <thead>
                <tr>
                    <th scope="col">Requester ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($result)){ ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td>
                        <form action="editrequesters.php" method="POST" class="d-inline">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <button type="submit" class="btn btn-info" name="edit">
                                <i class="fas fa-pen"></i>
                            </button>
                        </form> 
                        <form action="" method="POST" class="d-inline">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <button type="submit" class="btn btn-secondary" name="delete">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form> 
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>




        <?php
        }

        if(isset($_REQUEST['delete'])){
            $sql = "DELETE FROM users WHERE id = {$_REQUEST['id']}";
            $result = mysqli_query($connect, $sql);

            if($result == TRUE){
                echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
            }
        }

        ?>
</div>































<?php

include('includes/footer.php');
?>