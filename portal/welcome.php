<?php
ob_start();

 session_start();
include_once('includes/config.php');
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  ob_end_flush();
  } else{
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title> FIC-Hub Dashboard </title>
    <!-- HTML5 Shim and Respond.js IE9 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
      <!-- Meta -->
      <meta charset="utf-8">
      <meta http-equiv="refresh" content="100; url=logout.php">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="description" content="CodedThemes">
      <meta name="keywords" content=" Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
      <meta name="author" content="CodedThemes">
      <!-- Favicon icon -->
      <link rel="icon" href="assets/images/favicon-img.ico" type="image/x-icon">
      <!-- Google font-->
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
      <!-- Required Fremwork -->
      <link rel="stylesheet" type="text/css" href="assets/css/bootstrap/css/bootstrap.min.css">
      <!-- themify-icons line icon -->
      <link rel="stylesheet" type="text/css" href="assets/icon/themify-icons/themify-icons.css">
      <!-- ico font -->
      <link rel="stylesheet" type="text/css" href="assets/icon/icofont/css/icofont.css">
      <!-- Style.css -->
      <link rel="stylesheet" type="text/css" href="assets/css/style.css">
      <link rel="stylesheet" type="text/css" href="assets/css/jquery.mCustomScrollbar.css">
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
    $userid=$_SESSION['id'];
    $query=mysqli_query($con,"select * from users where id='$userid'");
    while($result=mysqli_fetch_array($query))
    {
       $_SESSION['fname']= $result['fname'];
       $_SESSION['lname']= $result['lname'];
       $_SESSION['email']= $result['email'];

        
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


   




    <div class="row center" style="margin-top:20px;margin-bottom:0px;" >
        <div class="col-xl-5 col-md-6" >
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">Welcome Back <?php if(isset($_SESSION['fname']) && isset($_SESSION['fname'])) {echo $_SESSION['fname'].' '.$_SESSION['lname'];  }?></div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-blue stretched-link" href="personal-details.php">View Profile</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        </div>



                            <!-- scope -->

                            </div>
                                <!-- Page-body end -->
                            </div>
                        </div>
                        <!-- Main-body end -->

                        <!-- scope -->



<!-- dashboard box -->
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">

                                    <div class="page-body">
                                        <div class="row">


            <?php

            $query=mysqli_query($con,"SELECT * FROM category");
           $totalservices=mysqli_num_rows($query);

            ?>
                                            <!-- card1 start -->
                                            <div class="col-md-6 col-xl-3">
                                                <div class="card widget-card-1">
                                                    <div class="card-block-small">
                                                        <i class="icofont icofont-pie-chart bg-c-blue card1-icon"></i>
                                                        <span class="text-c-blue f-w-600">Services</span>
                                                        <h4><?php echo $totalservices; ?> Available</h4>
                                                        <div> <a href="services.php">
                                                            <span class="f-left m-t-10 text-muted">
                                                                <i class="text-c-blue f-16 icofont icofont-warning m-r-10"></i>View Available Services
                                                            </span> </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- card1 end -->


            <?php
            $uemail= $_SESSION['email'];

            $order = mysqli_query($con, "SELECT * FROM  orders WHERE order_email = '$uemail' ");
            $totalorders = mysqli_num_rows($order);


            ?>
                                            <!-- card1 start -->
                                            <div class="col-md-6 col-xl-3">
                                                <div class="card widget-card-1">
                                                    <div class="card-block-small">
                                                        <i class="icofont icofont-ui-home bg-c-pink card1-icon"></i>
                                                        <span class="text-c-pink f-w-600">Orders</span>
                                                        <h4><?php echo $totalorders;  ?></h4>
                                                        <div> <a href="track-orders.php">
                                                            <span class="f-left m-t-10 text-muted">
                                                                <i class="text-c-pink f-16 icofont icofont-calendar m-r-10"></i>View Your Orders
                                                            </span> </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- card1 end -->
                                            <!-- card1 start -->
                                            <div class="col-md-6 col-xl-3">
                                                <div class="card widget-card-1">
                                                    <div class="card-block-small">
                                                        <i class="icofont icofont-warning-alt bg-c-green card1-icon"></i>
                                                        <span class="text-c-green f-w-600">Pricing</span>
                                                        <h4>Coming Soon</h4>
                                                        <div>
                                                            <span class="f-left m-t-10 text-muted">
                                                                <i class="text-c-green f-16 icofont icofont-tag m-r-10"></i>Pay and checkOut 
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- card1 end -->
<?php

$randomOrder = rand(60,100);


?>
                                            <!-- card1 start -->
                                            <div class="col-md-6 col-xl-3">
                                                <div class="card widget-card-1">
                                                    <div class="card-block-small">
                                                        <i class="icofont icofont-ui-home bg-c-pink card1-icon"></i>
                                                        <span class="text-c-yellow f-w-600">Track Orders</span>
                                                        <h4><?php 
                                                        if( $totalorders == 0){
                                                          echo  "<h4> 0% Ready</h4>";
                                                        }else{
                                                        echo "<h4> $randomOrder %  Ready</h4>"; } ?>
                                                        <div> <a href="track-orders.php">
                                                            <span class="f-left m-t-10 text-muted">
                                                             <i class="text-c-yellow f-16 icofont icofont-refresh m-r-10"></i>Track your orders
                                                            </span>   </a> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- card1 end -->
<!-- dashboard box ends -->


                














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