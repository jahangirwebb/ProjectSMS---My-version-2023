<?php
define('TITLE', 'Submit Request');
include('../config.php');
include('includes/header.php');
session_start();

if($_SESSION['user_logged_in']){
    $Email = $_SESSION['email'];
}else{
    header('location:../login.php');
}


$sql = "SELECT * FROM submit_request WHERE id = {$_SESSION['user_request_id']}";
$result = mysqli_query($connect, $sql);
$num = mysqli_num_rows($result);

if($num == 1){
    $row = mysqli_fetch_assoc($result);

    echo "<div class='ml-5 mt-5'>
            <table class='table'>
                <tbody>
                    <tr>
                        <th>Request ID</th>
                        <td>".$row['id']."</td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td>".$row['name']."</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>".$row['email']."</td>
                    </tr>
                    <tr>
                        <th>Request Info</th>
                        <td>".$row['requester']."</td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td>".$row['description']."</td>
                    </tr>

                    <tr>
                        <td>
                            <form class='d-print-none'>
                                <input class='btn btn-danger' type='submit' value='Print' onClick='window.print()'>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
            </div>";
}



?>



?>






<?php
include('includes/footer.php');
?>