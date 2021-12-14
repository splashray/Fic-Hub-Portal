<?php

ob_start();
include"includes/functions.php";  ?>

<?php


session_start();
include_once('../includes/config.php');
if (strlen($_SESSION['adminid']==0)) {
  header('location:logout.php');
  ob_end_flush();

  } else{
// for deleting user
    if(isset($_GET['delete']))
    {
        $order_id = $_GET['delete'];
    $msg=mysqli_query($con,"DELETE FROM orders WHERE order_id='$order_id'");
    if($msg)
        {
        echo "<script>alert('Data deleted');</script>";
        echo "<script type='text/javascript'> document.location = 'orders.php'; </script>";

        }
    }

   
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

<!-- end of side bar -->


<div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">


   



                            <!-- scope -->

                            </div>
                                <!-- Page-body end -->
                            </div>
                        </div>
                        <!-- Main-body end -->

                        <!-- scope -->


                        
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
                                                        <h4>General Orders </h4>
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
                                                    <li class="breadcrumb-item"><a href="finished-orders.php">Go To Finished Orders</a>
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
                                    
                                        
                                    <!-- Contextual classes table starts -->
                                    <div class="card">
                                        <div class="card-header ">
                                            <h5>Orders Recieved Are Listed Below</h5>
                                            <span> click the Actions to Edit Orders  </span>
                                            <div class="card-header-right">    <ul class="list-unstyled card-option">        <li><i class="icofont icofont-simple-left "></i></li>        <li><i class="icofont icofont-maximize full-card"></i></li>        <li><i class="icofont icofont-minus minimize-card"></i></li>        <li><i class="icofont icofont-refresh reload-card"></i></li>        <li><i class="icofont icofont-error close-card"></i></li>    </ul></div>
                                        </div>
                                                                        
        <div class="card-block table-border-style">
            <div class="table-responsive">
                <table class="table">
                        <thead>

                                        <tr>
                                   <th>Sno.</th>
                                   <th>Order NO</th>
                                  <th>Users</th>
                                  <th>Orders</th>
                                  <th>Order Phone</th>
                                  <th> Order Date</th>
                                  <th> Status</th>
                                  <th>Comment</th>
                                  <th>Delete</th>
                                  <th> Actions</th>

                                        </tr>
                                    </thead>

                                    <tfoot>
                                        <tr>
                                  <th>Sno.</th>
                                  <th>Order NO</th>
                                  <th>Users</th>
                                  <th>Orders</th>
                                  <th>Order Phone</th>
                                  <th> Order Date</th>
                                  <th> Status</th>
                                  <th>Comment</th>
                                  <th>Delete</th>
                                  <th> Actions</th>

                                        </tr>
                                    </tfoot>
                                    <tbody>
<?php 
        $query = "SELECT * FROM orders";
        $select_orders = mysqli_query($con,$query);
        $cnt=1;
        while($row = mysqli_fetch_assoc($select_orders)){ 
            $order_id = $row['order_id'];
            ?>
          

            <tr class="table-active">
            <td><?php echo $cnt;?></td>
            <td> <?php echo "ORD-0".$row['order_id']."-ER"; ?> </td>
            <td> <?php echo $row['order_email']; ?> </td>
            <td> <?php echo $row['order_services']; ?> </td>
            <td> <?php echo $row['order_phone']; ?> </td>
            <td><?php echo $row['order_date']; ?></td>
            <td><?php echo $row['order_approval']; ?></td>
            <td><?php echo $row['order_info']; ?></td>
            <td>
            <a href="orders.php?delete= <?php echo $order_id; ?>"  onClick="return confirm('Do you really want to delete?');" > <i class="ti-trash"></i> </a>
            </td>
            <td>
            <a href="orders.php?approve= <?php echo $order_id; ?>"  onClick="return confirm('Do you really want to approve the order?');" > Approve Order </a>
                        <br><br>
            <a href="orders.php?unapprove= <?php echo $order_id; ?>"  onClick="return confirm('Do you really want to unapprove the order?');" > Unapprove Order </a>
            </td>
        
            </tr>

            <?php $cnt=$cnt+1; }?>
            </tbody>
                    </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Contextual classes table ends -->
                                    
    
<?php

if(isset($_GET['approve'])){
    $order_id =  $_GET['approve'];
    
    $query = "UPDATE orders SET order_approval= 'approved' where order_id =$order_id";

    $app_query = mysqli_query($con,$query); 
    echo "<script type='text/javascript'> document.location = 'orders.php'; </script>";

    }



if(isset($_GET['unapprove'])){
    $order_id =  $_GET['unapprove'];
    
    $query = "UPDATE orders SET order_approval= 'unapproved' where order_id =$order_id";

    $unapp_query = mysqli_query($con,$query); 
    echo "<script type='text/javascript'> document.location = 'orders.php'; </script>";
                  
    }







?>















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