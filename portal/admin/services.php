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
                                                        <h4>Admin Services Offered</h4>
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
                                                    <li class="breadcrumb-item"><a href="orders.php">View All Orders</a>
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
                                            <h5>Services Offered Are Listed Below</h5>
                                            <span> click the Actions to Edit Services  </span>
                                            <div class="card-header-right">    <ul class="list-unstyled card-option">        <li><i class="icofont icofont-simple-left "></i></li>        <li><i class="icofont icofont-maximize full-card"></i></li>        <li><i class="icofont icofont-minus minimize-card"></i></li>        <li><i class="icofont icofont-refresh reload-card"></i></li>        <li><i class="icofont icofont-error close-card"></i></li>    </ul></div>
                                        </div>

      	<div class="col-10">
      		<a href="#" data-toggle="modal" data-target="#add_product_modal" class="btn btn-primary btn-sm">Add Services</a>
      	</div>

                                                                        
        <div class="card-block table-border-style">
            <div class="table-responsive">
                <table class="table">
                        <thead>

                                        <tr>
                                   <th>Sno.</th>
                                  <th>Services Categories</th>
                                  <th>Services</th>
                                  <th>Services Option</th>
                                  <th>Delivery Rate</th>
                                  <th>Expected Bills</th>
                                  <th>Services Image</th>
                                  <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tfoot>
                                        <tr>
                                  <th>Sno.</th>
                                  <th>Services Categories</th>
                                  <th>Services</th>
                                  <th>Services Option</th>
                                  <th>Delivery Rate</th>
                                  <th>Expected Bills</th>
                                  <th>Services Image</th>
                                  <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
<?php 
        $query = "SELECT * FROM category";
        $select_categories = mysqli_query($con,$query);
        $cnt=1;
        while($row = mysqli_fetch_assoc($select_categories)){ 
            $services_id = $row['services_id'];
            ?>
            <!-- $services_id = $row['services_id'];
            $services_cat = $row['services_cat'];
            $services = $row['services'];
            $services_option = $row['services_option'];
            $services_delivery = $row['services_delivery'];
            $expected_bills = $row['expected_bills'];
            $post_image = $row['services_image'];
 -->

            <tr class="table-active">
            <td><?php echo $cnt;?></td>
            <td> <?php echo $row['services_cat']; ?> </td>
            <td><?php echo $row['services'];?></td>
            <td> <?php echo $row['services_option']; ?> </td>
            <td><?php echo $row['services_delivery'];?></td>
            <td> <?php echo $row['expected_bills']; ?> </td>
         <?php   echo  "<td><img width='100px' height='60px' src='./images/$row[services_image]' alt ='image'></td>" ?>;
         <td>



         <a href="update_services.php?edit=<?php echo $services_id; ?>"  onClick="return confirm('Do you really want to Edit');" > Edit </a>  <br><br>

            <a href="services.php?delete=<?php echo $services_id; ?>"  onClick="return confirm('Do you really want to delete');" > Delete </a>

        </td>
            </tr>

            <?php $cnt=$cnt+1; }?>
            </tbody>
                    </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Contextual classes table ends -->
                                    

<!-- //////////////////ADD services section start here ///////////////////////////////// -->

<?php
    insert_categories();
?>
<!-- //////////////////ADD servces section end here ///////////////////////////////// -->



<!-- //////////////////delete services section start here ///////////////////////////////// -->

<?php
        deleteCategories(); 
 ?>
<!-- //////////////////delete services section end here ///////////////////////////////// -->




<!-- ////////////////// //UPDATE AND INCLUDE QUERY services section start here ///////////////////////////////// -->

<?php 

if(isset($_GET['edit'])){
    $services_id = $_GET['edit'];
    echo "<script type='text/javascript'> document.location = 'update_services.php'; </script>";

}

?>
<!-- ////////////////// //UPDATE AND INCLUDE QUERY services section end here ///////////////////////////////// -->



<!-- Add Product Modal start -->


<div class="modal fade" id="add_product_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Services Categories</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="add-product-form" enctype="multipart/form-data" method="post">
        	<div class="row">
        		<div class="col-12">
        			<div class="form-group">
		        		<label> Services Categories</label>
		        		<input type="text" name="services_cat" class="form-control" placeholder="Enter Services Category">
		        	</div>
        		</div>

        		<div class="col-12">
        			<div class="form-group">
		        		<label>Services </label>
                        <input type="text" name="services" class="form-control" placeholder="Enter Services ">
		        	</div>
        		</div>

        		<div class="col-12">
        			<div class="form-group">
		        		<label>Services Option</label>
                        <textarea class="form-control"name="services_option" placeholder="Enter Services Option" ></textarea>
		        	</div>
        		</div>

        		<div class="col-12">
        			<div class="form-group">
		        		<label>Expected Delivery Rate</label>
                        <input type="text"  class="form-control" name="services_delivery" placeholder="Enter Services Delivery" >
		        	</div>
        		</div>
            <div class="col-12">
              <div class="form-group">
                <label>Expected Bills </label>
                <input type="number" name="expected_bills" class="form-control" placeholder="Enter Services Bills Range">
              </div>
            </div>
        		<div class="col-12">
        			<div class="form-group">
		        		<label>Services Image <small>(format: jpg, jpeg, png)</small></label>
		        		<input type="file" name="services_image" class="form-control">
		        	</div>
        		</div>
        		<!-- <input type="hidden" name="add_product" value="1"> -->
        		<div class="col-12">
        			<button type="submit" class="btn btn-primary" name="add-services">Add Services</button>
        		</div>
        	</div>
        	
        </form>

      </div>
    </div>
  </div>
</div>
<!-- Add Product Modal end -->















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