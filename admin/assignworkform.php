<?php
if(session_id() == ""){
    session_start();
}

if(isset($_SESSION["admin_logged_in"])){
    $Admin_Email = $_SESSION['email'];
}else{
    header('location:admin.php');
}

if(isset($_REQUEST['view'])){
    $sql = "SELECT * FROM submit_request WHERE id = {$_REQUEST['id']}";
    $result = mysqli_query($connect, $sql);
    $rows = mysqli_fetch_assoc($result);
}

if(isset($_REQUEST['close'])){
    $del_query = "DELETE FROM submit_request WHERE id = {$_REQUEST['id']}";
        if(mysqli_query($connect, $del_query)){
            echo '<meta http-equiv="refresh" content="0;URL=?closed">'; }
}

if(isset($_REQUEST['assigntechnician'])){
    if( 
        ($_REQUEST['request_id'] == '') || 
        ($_REQUEST['request_info'] == '') || 
        ($_REQUEST['description'] == '') || 
        ($_REQUEST['requester-name'] == '') ||
        ($_REQUEST['address-1'] == '') || 
        ($_REQUEST['address-2'] == '') ||
        ($_REQUEST['city'] == '') || 
        ($_REQUEST['state'] == '') || 
        ($_REQUEST['zip'] == '') || 
        ($_REQUEST['email'] == '') || 
        ($_REQUEST['mobile'] == '') || 
        ($_REQUEST['assigntechnician'] == '') || 
        ($_REQUEST['date'] == '')){

        $msg = '<div class="alert alert-warning col-sm-6">Please fill all fields</div>';
    }else{

        $rid = $_REQUEST['request_id'];
        $rinfo = $_REQUEST['request_info'];
        $rdesc = $_REQUEST['description'];
        $rname = $_REQUEST['requester-name'];
        $radd1 = $_REQUEST['address-1'];
        $radd2 = $_REQUEST['address-2'];
        $rcity = $_REQUEST['city'];
        $rstate = $_REQUEST['state'];
        $rzip = $_REQUEST['zip'];
        $remail = $_REQUEST['email'];
        $rmobile = $_REQUEST['mobile'];
        $rassigntech = $_REQUEST['assigntechnician'];
        $rdate = $_REQUEST['date'];

        $sql = "INSERT INTO assignwork (request_id, request_info, description, requester_name, address_1, address_2, city, state, zip, email, mobile, assign_technician, date)VALUES ('$rid', '$rinfo', '$rdesc', '$rname', '$radd1', '$radd2', '$rcity', '$rstate', '$rzip', '$remail', '$rmobile', '$rassigntech', '$rdate')";

        $DB_result = mysqli_query($connect, $sql);
        if($DB_result){
            $msg = '<div class="alert alert-success col-sm-6 mt-4">Work Assign Successfuly</div>';
        }else{
            $msg = '<div class="alert alert-danger col-sm-6 mt-4">Unable to assign work</div>';
        }
    }
}





?>




<div class="col-sm 5 mt-4 jumbotron">
    <form action="" method="POST">
        <h5 class="text-center">Assign Work Order Request</h5>
        <div class="form-group">
            <label for="">Request ID</label>
            <input type="text" class="form-control" name="request_id" autocomplete="off" value="<?php if(isset($rows['request_id'])){ echo $rows['request_id']; } ?>">   
        </div>
        <div class="form-group">
            <label for="">Request Info</label>
            <input type="text" class="form-control" name="request_info" autocomplete="off" value="<?php if(isset($myrow['request_info'])){echo $myrow['request_info']; } ?>">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" name="description" autocomplete="off" value="<?php if(isset($rows['description'])){echo $rows['description'];} ?>">
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="requester-name" autocomplete="off" value="<?php if(isset($rows['requester-name'])){echo $rows['requester-name'];} ?>">
        </div>
    <!-- FORM ROW 1 -->
        <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="address">Address line 1</label>
                    <input type="text" class="form-control" name="address-1" autocomplete="off" value="<?php if(isset($rows['address1'])){echo $rows['address1'];} ?> ">
                </div>

                <div class="form-group col-md-6">
                    <label for="address">Address line 2</label>
                    <input type="text" class="form-control" name="address-2" autocomplete="off" value="<?php if(isset($rows['address-2'])){echo $rows['address-2'];} ?> ">
                </div>
        </div>

        <!-- FORM ROW 2 -->

        <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="address">City</label>
                    <input type="text" class="form-control" name="city" autocomplete="off" value="<?php if(isset($rows['city'])){echo $rows['city'];} ?> ">
                </div>
                <div class="form-group col-md-4">
                    <label for="address">State</label>
                    <input type="text" class="form-control" name="state" autocomplete="off" value="<?php if(isset($rows['state'])){echo $rows['state'];} ?> ">
                </div>
                <div class="form-group col-md-4">
                    <label for="address">Zip</label>
                    <input type="text" class="form-control" name="zip" autocomplete="off" value="<?php if(isset($rows['zip'])){echo $rows['zip'];} ?> ">
                </div>
        </div>

        <!-- FORM ROW 3 -->

        <div class="form-row">
                <div class="form-group col-md-8">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" autocomplete="off" value="<?php if(isset($rows['email'])){echo $rows['email'];} ?>" >
                </div>
                <div class="form-group col-md-4">
                    <label for="email">Mobile</label>
                    <input type="number" class="form-control" name="mobile" autocomplete="off" value="<?php if(isset($rows['mobile'])){echo $rows['mobile'];} ?>" >
                </div>
        </div>

        <!-- FORM ROW 4 -->

        <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="technician">Assign to Technician</label>
                    <input type="text" class="form-control" name="assigntechnician" autocomplete="off">
                </div>
                <div class="form-group col-md-6">
                    <label for="date">Date</label>
                    <input type="date" class="form-control" name="date" autocomplete="off">
                </div>
        </div>

        <!-- BUTTONS -->

       <div class="float-right">
                <button class="btn btn-success" name="assigntech">Assign</button>
                <button class="btn btn-secondary" name="reset">Reset</button>
        </div>
            
        <?php if(isset($msg)){echo $msg;} ?>

    </form>
</div>