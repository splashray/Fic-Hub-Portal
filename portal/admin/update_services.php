<?php

ob_start();
session_start();
include_once('../includes/config.php');
if (strlen($_SESSION['adminid']==0)) {
  header('location:logout.php');
  ob_end_flush();

  } else{
// for deleting user
if(isset($_GET['id']))
{
$adminid=$_GET['id'];
$msg=mysqli_query($con,"DELETE FROM users WHERE id='$adminid'");
if($msg)
{
echo "<script>alert('Data deleted');</script>";
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
                                                        <h4>Edit Services </h4>
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
                                                    <li class="breadcrumb-item"><a href="services.php">Back To All  Services</a>
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
    // global $con;
if(isset($_GET['edit'])){
    $services_id = $_GET['edit'];

$query = "SELECT * FROM category WHERE services_id = $services_id ";
$select_services_id = mysqli_query($con,$query);

while($row = mysqli_fetch_assoc($select_services_id)){
	$services_id = $row['services_id'];
	$services_cat = $row['services_cat'];
	$services = $row['services'];
	$services_option = $row['services_option'];
	$services_delivery = $row['services_delivery'];
	$expected_bills = $row['expected_bills'];
	$post_image = $row['services_image'];
	
	 
?>
<!-- Add Product Modal start -->

<div class="card">

      <div class="modal-body">
        <form id="add-product-form" enctype="multipart/form-data" method="post">
        	<div class="row">
        		<div class="col-12">
        			<div class="form-group">
		        		<label> Services Categories</label>
		        		<input type="text" name="services_cat" class="form-control" value=" <?php if(isset($services_cat)){
    echo $services_cat;} ?>" >
		        	</div>
        		</div>

        		<div class="col-12">
        			<div class="form-group">
		        		<label>Services </label>
                        <input type="text" name="services" class="form-control" value=" <?php if(isset($services)){
    echo $services;} ?>">
		        	</div>
        		</div>

        		<div class="col-12">
        			<div class="form-group">
		        		<label>Services Option</label>
                        <input type name="services_option"  class="form-control"value=" <?php if(isset($services_option)){
    echo $services_option;} ?>" >
		        	</div>
        		</div>

        		<div class="col-12">
        			<div class="form-group">
		        		<label>Expected Delivery Rate</label>
                        <input type="text"  class="form-control" name="services_delivery"  value=" <?php if(isset($services_delivery)){
    echo $services_delivery;} ?>" >
		        	</div>
        		</div>
            <div class="col-12">
              <div class="form-group">
                <label>Expected Bills </label>
                <input type="text" name="expected_bills" class="form-control" value=" <?php if(isset($expected_bills)){
    echo $expected_bills; } ?>" >
              </div>
            </div>
        		<div class="col-12">
        			<div class="form-group">
		        		<label>Services Image <small>(format: jpg, jpeg, png)</small></label>
                        <img width="100px" width="60px" src="./images/<?php echo $post_image; ?>" alt="Update image" >
		        		<input type="file" name="services_image" class="form-control" >
		        	</div>
        		</div>
<?php } ?> 
          		<div class="col-12">
        			<button type="submit" class="btn btn-primary" name="update-services">Update Services</button>
        		</div>
        	</div>
        </form>

      </div>
    </div>
  
<!-- Add Product Modal end -->
<?php
global $con;
    if(isset($_POST['update_services'])){
                $services_cat =$_POST['services_cat'];
                $services =$_POST['services'];
                $services_option =$_POST['services_option'];
                $services_delivery =$_POST['services_delivery'];
                $expected_bills =$_POST['expected_bills'];
                
                $post_image        = $_FILES['services_image']['name'];
                $post_image_temp   = $_FILES['services_image']['tmp_name'];
                move_uploaded_file($post_image_temp, "./images/$post_image");

                
            // if($services_cat==""||$services==""|| $services_option=="" ||$services_delivery==""||$expected_bills=="" ){
            //     echo "<script type='text/javascript'> document.location = 'update_services.php'; </script>";
            // }else{

                $query = "UPDATE category SET ";
                $query.= "services_cat = '{$services_cat}', ";
                $query.= "services = '{$services}', ";
                $query.= "services_option = '{$services_option}', ";
                $query.= "services_delivery = '{$services_delivery}', ";
                $query.= "expected_bills = '{$expected_bills}', ";
                $query.= "services_image = '{$post_image}' ";
                $query.= "WHERE services_id = '{$services_id}' " ;
        
                $update_services = mysqli_query($con,$query);
                    if(!$update_services){
                    die("QUERY FAILED". mysqli_error($con));
                    }
            
    } }
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