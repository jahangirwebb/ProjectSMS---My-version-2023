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


// ======================================================================================

if(isset($_REQUEST['submitrequest'])){

    if( ($_REQUEST['requester'] == "") || ($_REQUEST['description'] == "") ||($_REQUEST['name'] == "") || ($_REQUEST['address1'] == "") || ($_REQUEST['address2'] == "") || ($_REQUEST['city'] == "") || ($_REQUEST['state'] == "") || ($_REQUEST['zip'] == "") || ($_REQUEST['email'] == "") || ($_REQUEST['mobile'] == "") || ($_REQUEST['date'] == "") ){

        $msg = "<div class='alert alert-danger mt-2 col-md-4'>please fill all required fields.</div>";
    }else{
        $requester = $_REQUEST['requester'];
        $description = $_REQUEST['description'];
        $name = $_REQUEST['name'];
        $address1 = $_REQUEST['address1'];
        $address2 = $_REQUEST['address2'];
        $city = $_REQUEST['city'];
        $state = $_REQUEST['state'];
        $zip = $_REQUEST['zip'];
        $email = $_REQUEST['email'];
        $mobile = $_REQUEST['mobile'];
        $date = $_REQUEST['date'];

        $query = "INSERT INTO submit_request (requester,description, name, address1, address2, city, state, zip, email, mobile, date) VALUES ('$requester', '$description','$name', '$address1','$address2', '$city','$state', '$zip','$email', '$mobile','$date')";

        $result = mysqli_query($connect, $query);
        
        if($result){
            $generate_id = mysqli_insert_id($connect);
            $msg = "<div class='alert alert-success mt-2 col-md-4'>Request Submitted Successfully</div>";

            $_SESSION['user_request_id'] = $generate_id;
            header('location: successcheck.php');
        }else{
            $msg = "<div class='alert alert-danger mt-2 col-md-4'>Unable to Submit Your Request</div>";
        }
    }


}






?>


<div class="col-sm-7 col-md-8 mt-4 mx-5">
<!-- Submit Request Form -->

    <form action="" method="POST">
        <div class="form-group">
            <label for="RequesterInfo">Requester Info</label>
            <input type="text" class="form-control" name="requester" placeholder="Requester Info" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="RequesterDescription">Description</label>
            <input type="text" class="form-control" name="description" placeholder=" Description" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="RequesterName">Name</label>
            <input type="text" class="form-control" name="name" placeholder=" Your Name" autocomplete="off">
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="Address">Address Line 1</label>
                <input type="text" class="form-control" name="address1" placeholder="Address" autocomplete="off">
            </div>
            <div class="form-group col-md-6">
                <label for="Address">Address Line 2</label>
                <input type="text" class="form-control" name="address2" placeholder="Address" autocomplete="off">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="City">City</label>
                <input type="text" class="form-control" name="city" placeholder="City" autocomplete="off"> 
            </div>
            <div class="form-group col-md-4">
                <label for="City">State</label>
                <input type="text" class="form-control" name="state" placeholder="State" autocomplete="off"> 
            </div>
            <div class="form-group col-md-2">
                <label for="City">Zip Code</label>
                <input type="text" class="form-control" name="zip" placeholder="zip" autocomplete="off"> 
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Email" autocomplete="off"> 
            </div>
            <div class="form-group col-md-2">
                <label for="mobile">Mobile</label>
                <input type="text" class="form-control" name="mobile" placeholder="Mobile" autocomplete="off"> 
            </div>
            <div class="form-group col-md-3">
                <label for="City">Date</label>
                <input type="Date" class="form-control" name="date" autocomplete="off"> 
            </div>
        </div>
        <button type="submit" name="submitrequest" class="btn btn-danger">Submit</button>
        <button type="reset" name="reset" class="btn btn-secondary">Reset</button>
        <?php if(isset($msg)) {echo $msg;} ?>
    </form>
</div>










<?php
include('includes/footer.php');
?>