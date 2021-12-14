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
        $_SESSION['id']= $result['id'];
       $_SESSION['fname']= $result['fname'];
       $_SESSION['lname']= $result['lname'];
       $_SESSION['email']= $result['email'];
       $_SESSION['password']= $result['password'];
       $_SESSION['contactno']= $result['contactno'];
       $_SESSION['posting_date']= $result['posting_date'];
        
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
                                <div class="page-wrapper">
                                    <!-- Page-header start -->
                                    <div class="page-header card">
                                        <div class="row align-items-end">
                                            <div class="col-lg-8">
                                                <div class="page-header-title">
                                                    <i class="icofont icofont-table bg-c-blue"></i>
                                                    <div class="d-inline">
                                                        <h4>Choose Services</h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="page-header-breadcrumb">
                                                   <ul class="breadcrumb-title">
                                                    <li class="breadcrumb-item">
                                                        <a href="welcome.php">
                                                            <i class="icofont icofont-home"></i>
                                                        </a>
                                                    </li>
                                                    <li class="breadcrumb-item"><a href="services.php">Services Details</a>
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
                                            <h5>Ensure your Services details are all Correct...</h5>
                                            <span> <a href="change-personal-details.php"> Add additional details for more clarity  </a> </span>
                                            <div class="card-header-right">    <ul class="list-unstyled card-option">        <li><i class="icofont icofont-simple-left "></i></li>        <li><i class="icofont icofont-maximize full-card"></i></li>        <li><i class="icofont icofont-minus minimize-card"></i></li>        <li><i class="icofont icofont-refresh reload-card"></i></li>        <li><i class="icofont icofont-error close-card"></i></li>    </ul></div>
                                        </div>

                                      
                                         <!-- Tooltips on textbox card start -->
                                               
                                                <div class="card-block tooltip-icon button-list">
                                                    <form action="orders.php" method="post">
                                                <div class="input-group">
                                                        <span class="input-group-addon" id="name"><i class="ti-layout-media-right"></i></span>
                                                        <select name="optservices" id="services" class="form-control" title="Enter Services" data-toggle="tooltip" required />
                                                        <option value=''>Choose Services </option>
                                <?php
                                    
                                    $query = "SELECT * FROM category";
                                    $fetch_ser = mysqli_query($con,$query);

                                    while($row = mysqli_fetch_assoc($fetch_ser)){
                                        $services_id = $row['services_id'];
                                        $services_cat = $row['services_cat'];
                                    

                                echo "<option value='{$services_cat}'>{$services_cat}</option>";

                           } ?>
                            </select>
                                                    </div>
                                                    <div class="input-group">
                                                        <span class="input-group-addon" id="name"><i class="icofont icofont-user-alt-3"></i></span>
                                                        <input type="text" name="name" class="form-control" placeholder="Enter your name" title="Enter your name" data-toggle="tooltip" required/>
                                                    </div>
                                                    
                                            
                                                    <div class="input-group">
                                                        <span class="input-group-addon" id="email"><i class="icofont icofont-ui-email"></i></span>
                                                        <input type="email" name="email" class="form-control" value="<?php if(isset($_SESSION['email'])){ echo  $_SESSION['email']; } ?>" readonly />
                                                    </div>

                                                    <div class="input-group">
                                                        <span class="input-group-addon" id="phone"><i class="ti-mobile"></i></span>
                                                        <input type="phone" name="phone" class="form-control" placeholder="Enter your Phone Number" title="Enter your Phone Number" data-toggle="tooltip" required />
                                                    </div>

                                                   
                                                    <div class="input-group">
                                                        <span class="input-group-addon" id="bname"><i class="ti-envelope"></i></span>
                                                        <input type="text" name="bname" class="form-control" placeholder="Enter your brand name" title="Enter your brand name" data-toggle="tooltip" required />
                                                    </div>
                                                    <h6 align="center">Enter in details what you want us to offer you </h6>

                                                    <div class="input-group">
                                                        <span class="input-group-addon" id="info"><i class="ti-comments"></i></span>
                                                        <textarea  name="info" rows="5" class="form-control" title="Enter in details what you want us to offer you" data-toggle="tooltip" required > </textarea>
                                                    </div>

                                                    <button type="submit" class="btn btn-primary" name="services">Submit Service Order 
                                                    </button>

                                                    </form>
                                                </div>
                                            </div>
                                            <!-- Tooltips on textbox card end -->






                                        </div>
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