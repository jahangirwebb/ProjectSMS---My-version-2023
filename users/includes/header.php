<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo TITLE ?></title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/custom.css">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark pl-5">
        <a href="userprofile.php" class="navbar-brand">OSMS</a>
    </nav>


<!-- Side Bar Navigation -->

    <div class="container-fluid">
        <div class="row">


            <nav class="col-sm-2 bg-dark sidebar pt-3 text-white">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">

                        <li class="nav-item my-li">
                            <a href="userprofile.php" class="nav-link text-white d-print-none"><i class="fa fa-user mr-1"></i> Profile</a>
                        </li>
                   
                        <li class="nav-item my-li">
                            <a href="submitrequest.php" class="nav-link text-white d-print-none"> <i class="fab fa-accessible-icon mr-1"></i> Submit Request</a>
                        </li>
                 
                        <li class="nav-item my-li">
                            <a href="servicestatus.php" class="nav-link text-white d-print-none"> <i class="fas fa-user-clock mr-1"></i> Service Status</a>
                        </li>

                        <li class="nav-item my-li">
                            <a href="changepass.php" class="nav-link text-white d-print-none"> <i class="fas fa-unlock-alt mr-1"></i> Change Password</a>
                        </li>
                
                        <li class="nav-item my-li">
                            <a href="../logout.php" class="nav-link text-white d-print-none"> <i class="fas fa-sign-out-alt mr-1"></i> Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>  <!-- Side Navigation End -->
