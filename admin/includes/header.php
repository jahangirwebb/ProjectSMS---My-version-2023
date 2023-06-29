<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/custom.css">
    <title><?php echo TITLE ?></title>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark pl-5">
        <a href="userprofile.php" class="navbar-brand"><h3>OSMS</h3></a>
    </nav>

    <!-- Side Bar Navigation -->

    <div class="container-fluid">
        <div class="row">


         <nav class="col-sm-2 bg-dark sidebar pt-3">
              <div class="sidebar-sticky">
                <ul class="nav flex-column">

                 <li class="nav-item my-li active">
                  <a href="dashboard.php" class="nav-link text-white d-print-none 
                  <?php if('PAGE' == 'Dashboard'){echo 'active';}?>">
                  <i class="fa fa-user mr-1"></i> Dashboard</a>
                </li>
                   
                 <li class="nav-item my-li">
                 <a href="workorder.php" class="nav-link text-white d-print-none"> <i class="fab fa-accessible-icon mr-1"></i> Work Order</a>
                 </li>
                 
                 <li class="nav-item my-li">
                 <a href="requests.php" class="nav-link text-white d-print-none"> <i class="fas fa-align-center"></i> Requests</a>
                 </li>

                <li class="nav-item my-li">
                 <a href="assets.php" class="nav-link text-white d-print-none"> <i class="fas fa-database"></i> Assets</a>
                </li>

                <li class="nav-item my-li">
                 <a href="technician.php" class="nav-link text-white d-print-none"> <i class="fas fa-user-cog"></i> Technician</a>
                </li>

                <li class="nav-item my-li">
                 <a href="requesters.php" class="nav-link text-white d-print-none"> <i class="fas fa-users"></i> Requesters</a>
                </li>

                <li class="nav-item my-li">
                 <a href="sales.php" class="nav-link text-white d-print-none"> <i class="fas fa-donate"></i> Sales Report</a>
                </li>

                <li class="nav-item my-li">
                 <a href="workreport.php" class="nav-link text-white d-print-none"> <i class="fas fa-chart-bar"> </i> Work Report</a>
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