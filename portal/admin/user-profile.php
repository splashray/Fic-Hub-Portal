<?php

ob_start();
session_start();
include_once('../includes/config.php');
if (strlen($_SESSION['adminid']==0)) {
  header('location:logout.php');
  ob_end_flush();

  } else{
// for viewing  user profile before deleting

   ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title> FIC-Tech Admin Home </title>
    <!-- HTML5 Shim and Respond.js IE9 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
      <!-- Meta -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="description" content="CodedThemes">
      <meta name="keywords" content=" Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
      <meta name="author" content="CodedThemes">
      <!-- Favicon icon -->
      <!-- <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon"> -->
      <!-- Google font-->
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
      <!-- Required Fremwork -->
      <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap/css/bootstrap.min.css">
      <!-- themify-icons line icon -->
      <link rel="stylesheet" type="text/css" href="../assets/icon/themify-icons/themify-icons.css">
      <!-- ico font -->
      <link rel="stylesheet" type="text/css" href="../assets/icon/icofont/css/icofont.css">
      <!-- Style.css -->
      <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
      <link rel="stylesheet" type="text/css" href="../assets/css/jquery.mCustomScrollbar.css">

  </head>

  <body>
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">

                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->
    
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

        <?php 
    $adminid=$_SESSION['adminid'];
    $query=mysqli_query($con,"SELECT * FROM admin WHERE id='$adminid'");
    while($result=mysqli_fetch_array($query))
    {           
        $_SESSION['id']= $result['id'];
        $_SESSION['username']= $result['username'];
        $_SESSION['password']= $result['password'];

             } 
        ?>







<!-- navigation start from here -->
<?php include_once('includes/navbar.php');?>

<!-- navigation ends here -->


<!-- side bar start -->
<?php include_once('includes/sidebar.php');?>

<div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-header start -->
                                    <div class="page-header card">
                                        <div class="row align-items-end">
                                            <div class="col-lg-8">
                                                <div class="page-header-title">
                                                    <i class="icofont icofont-table bg-c-blue"></i>
                                                    <div class="d-inline">
                                                        <h4>User's Personal Details</h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="page-header-breadcrumb">
                                                   <ul class="breadcrumb-title">
                                                    <li class="breadcrumb-item">
                                                        <a href="dashboard.php">
                                                            <i class="icofont icofont-home"></i>
                                                        </a>
                                                    </li>
                                                    <li class="breadcrumb-item"><a href="total-users.php">Total Registered Users</a>
                                                    </li>
                                                    <!-- <li class="breadcrumb-item"><a href="#!">Basic Table</a>
                                                    </li> -->
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Page-header end -->
                                
                                <!-- Page-body start -->
                                <div class="page-body">
                                    
<?php 
$userid=$_GET['uid'];
$query=mysqli_query($con,"select * from users where id='$userid'");
while($result=mysqli_fetch_array($query))
{?>


                                
                                    <!-- Contextual classes table starts -->
                                    <div class="card">
                                        <div class="card-header ">
                                            <h5>Ensure all Users details are all Correct...</h5>
                                            <span> <a href="edit-profile.php?uid=<?php echo $result['id'];?>"> If not click here to Edit their Profile  </a> </span>
                                            <div class="card-header-right">    <ul class="list-unstyled card-option">        <li><i class="icofont icofont-simple-left "></i></li>        <li><i class="icofont icofont-maximize full-card"></i></li>        <li><i class="icofont icofont-minus minimize-card"></i></li>        <li><i class="icofont icofont-refresh reload-card"></i></li>        <li><i class="icofont icofont-error close-card"></i></li>    </ul></div>
                                        </div>
                             
                                        <div class="card-block table-border-style">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                        <th scope="row">1</th>                                                            <th>First Name</th>
                                                            <td> <?php echo $result['fname'] ?> </td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr class="table-active">
                                                            <th scope="row">2</th>
                                                            <th>Last-Name</th>
                                                            <td><?php echo $result['lname'] ?></td>
                                                            
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">3</th>
                                                            <th> Email</th>
                                                            <td><?php echo $result['email'] ?></td>
                                                        </tr>
                                                        <tr class="table-success">
                                                            <th scope="row">4</th>
                                                            <th>Phone Number</th>
                                                            <td><?php echo $result['contactno'] ?></td>
                                                          
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">5</th>
                                                            <th>Registered Date</th>
                                                            <td><?php echo $result['posting_date'] ?></td>
                                                        </tr>
                                                        <tr class="table-warning">
                                                            <th scope="row">6</th>
                                                            <th>Password</th>
                                                            <td><a href="#"> (Change Password) </a> </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">7</th>
                                                            <th>New Info </th>
                                                            <td>the Space</td>
                                                        </tr>
                                                        <tr class="table-danger">
                                                            <th scope="row">8</th>
                                                            <th>New Info 2</th>
                                                            <td>the Space 2</td>
                                                        </tr>
                                                       
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
            <?php } ?>
                                    </div>
                                    <!-- Contextual classes table ends -->
                                    


                                </div>
                                <!-- Page-body end -->
                            </div>
                        </div>
                        <!-- Main-body end -->

                










                                            </div>
                                        </div>
                                    </div>

                                    <div id="styleSelector">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

<!-- footer start here -->

    <?php include('includes/footer.php');?>  
<!-- footer ends here -->
    
  <?php  } ?>