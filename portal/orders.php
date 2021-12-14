<?php
ob_start();

session_start();
include_once('includes/config.php');
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  ob_end_flush();
  } else{

    if(isset($_POST['services'])){
        $services = $_POST['optservices'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $bname = $_POST['bname'];
        $info = $_POST['info'];
        $phone = $_POST['phone'];
        $order_date = date("Y-m-d H:i:s");

  
        if( empty($email) && empty($bname) && empty($info)){
            echo "<script type='text/javascript'> document.location = 'services.php'; </script>";
           
          }else{
        $query = "INSERT INTO orders(order_services, order_name, order_email, order_phone, order_brand, order_info, order_date ) ";
        $query .= "VALUES('{$services}','{$name}','{$email}','{$phone}','{$bname}','{$info}', '{$order_date}' ) ";
  
        $order_query = mysqli_query($con,$query);
        if(!$order_query){
            die("Query Failed". mysqli_error($con));
        }
        echo "<script>alert('Order Submitted ');</script>";
                echo "<script>alert('Click Process Order to continue ');</script>";

        echo "<script type='text/javascript'> document.location = 'orders.php'; </script>";


        session_start();
        $_SESSION['order_services'] = $services;
        $_SESSION['order_name'] = $name;
        $_SESSION['order_email'] = $email;
        $_SESSION['order_brand'] = $bname;
        $_SESSION['order_info'] = $info;
        $_SESSION['order_phone'] = $phone;
        $_SESSION['order_date'] = $order_date;


        
        

    //     $query=mysqli_query($con,"SELECT order_id FROM orders  WHERE order_email = '{$_SESSION['order_email']}' BY order_id DESC LIMIT 1 ");
    //    $test=mysqli_num_rows($query);

        
    //     // $sql = "SELECT * FROM orders  WHERE order_email = '{$_SESSION['order_email']}' BY order_id DESC LIMIT 1 ";
    //     // $order_id = mysqli_query($con,$sql);
    //     // // while($row = mysqli_fetch_array($num)){
    //     // // $order_id = $row['order_id'];
    //     // // }
    //     // echo $test;
        
    //     $_SESSION['order_id'] = $test;

        
    
  
    }
  
  
  
      }

    

    
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
                                                        <h4>Check Out Service Order</h4>
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
                                                    <li class="breadcrumb-item"><a href="services.php">Back To Services</a>
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
                                            <h5>Kindly Reach out to the Support for faster delivery rate...</h5>
                                            <span>  Submit another one?<a href="services.php"> Click Here </a> </span>
                                            <div class="card-header-right">    <ul class="list-unstyled card-option">        <li><i class="icofont icofont-simple-left "></i></li>        <li><i class="icofont icofont-maximize full-card"></i></li>        <li><i class="icofont icofont-minus minimize-card"></i></li>        <li><i class="icofont icofont-refresh reload-card"></i></li>        <li><i class="icofont icofont-error close-card"></i></li>    </ul></div>
                                        </div>


                                        <div class="card-block tab-icon">
                                                        <!-- Row start -->
                                                        <div class="row">
                                                            <div class="col-lg-12 col-xl-6">
                                                                <!-- <h6 class="sub-title">Tab With Icon</h6> -->
                                                                <div class="sub-title">Keep Details of this page</div>(check all Sections here)
                                                                <!-- Nav tabs -->
                                                                <ul class="nav nav-tabs md-tabs " role="tablist">
                                                                    <li class="nav-item">
                                                                        <a class="nav-link active" data-toggle="tab" href="#home7" role="tab"><i class="icofont icofont-home"></i>Order Submitted</a>
                                                                        <div class="slide"></div>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link" data-toggle="tab" href="#profile7" role="tab"><i class="icofont icofont-ui-user "></i>Contact Support</a>
                                                                        <div class="slide"></div>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link" data-toggle="tab" href="#messages7" role="tab"><i class="icofont icofont-ui-message"></i>Send Us Messages</a>
                                                                        <div class="slide"></div>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link" data-toggle="tab" href="#settings7" role="tab"><i class="icofont icofont-ui-settings"></i>Settings</a>
                                                                        <div class="slide"></div>
                                                                    </li>
                                                                </ul>
                                                                <!-- Tab panes -->
                                                                <div class="tab-content card-block">
                                                                    
                                                                <div class="tab-pane active" id="home7" role="tabpanel">
                                                                        <p class="m-0">
                                                                            Your order have been successfully submitted <br> and has been recieved. <br>
                                                                            Kindly Click the button below to process order <br> <br>

                                                                            
                                                                           
                                                                            </p>
   

                                                                        
                                                                    </div>





                                                                    <div class="tab-pane" id="profile7" role="tabpanel">
                                                                        <p class="m-0">
                                                                           What faster delivery rate?
                                                                           <br>
                                                                Reach out to the support Team for faster response
                                                                        </p>
                                                                    </div>
                                                                    <div class="tab-pane" id="messages7" role="tabpanel">
                                                                        <p class="m-0 center">
                                                                            
                  <h5> Call Us</h5>
                  <p>+234 903187 4139<br>+234 901575 5906 <br>+234 708843 5682  </p>

                  
                  <h5>Email Us</h5>
                  <p>digitalfictechagency@gmail.com<br>digilearn2020@gmail.com</p>

                  <h5>Our Physical address</h5>
                  <p>No 50 Kwara State  <br> polytechnic gate, <br> Ilorin Kwara State <br></p> 
                                                                        </p>
                                                                    </div>
                                                                    <div class="tab-pane" id="settings7" role="tabpanel">
                                                                        <p class="m-0">
           
<a href="services.php">Submit another order?</a><br><br>
<a href="change-personal-details.php">Change Personal Details?</a>

                                                                        </p>
                                                                    </div>
                                                               

<div class="card-block table-border-style">
<div class="table-responsive">
<table class="table">
         <?php
         
         
        // $test =  $_SESSION['order_id'];
        // $test = $_SESSION['order_id'];
        $services =  $_SESSION['order_services'] ;
         $name = $_SESSION['order_name'];
         $email =  $_SESSION['order_email'];
         $bname = $_SESSION['order_brand'];
         $info = $_SESSION['order_info'];
         $phone =  $_SESSION['order_phone'] ;
         $order_date =  $_SESSION['order_date'];

        ?>
                      <thead>
                        <tr>
                        <!-- <th>Order Number </th> -->
                        <th>SERVICES OPTION </th>
                        <th>ORDER NAME </th>
                        <th>ORDER E-MAIL </th>
                        <th> BRAND NAME </th>
                        <th> OTHER INFO </th>
                        <th> ORDER PHONE-NUMBER </th>
                        <th>ORDER DATE </th>
                        </tr>
                      </thead>

                      <tbody id="tbodylecture">
                        <tr>

                          <!-- <th> <?php echo $test; ?></th> -->
                          <th> <?php echo $services; ?>  </th>
                          <th> <?php echo $name; ?>  </th>
                          <th> <?php echo $email; ?>  </th>
                          <th> <?php echo $bname; ?>  </th>
                          <th> <?php echo $info; ?>  </th>
                          <th> <?php echo $phone ?>  </th>
                          <th> <?php echo $order_date; ?>  </th>
                        </tr>
                      </tbody>

                  </table>
</div> </div>
<button class=" btn btn-primary">
<a href="https://api.whatsapp.com/send?phone=2349031874139&text=Hi%20Fic-hub%20Support,%20I%20just%20placed%20an%20order%20on%20your%20website,%20Kindly%20Process%20My%20order.%20My%20name%20is%20---">  Process Order </a>
</button>
<br> <br>
<a href="track-orders.php">Click Here to Track Your Orders</a>

</div>
                                                            </div>
                                                        </div>
                                                        <!-- Row end -->
                                                    </div>
                                                </div>
                                                <!-- Tab variant tab card start -->
                                        











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