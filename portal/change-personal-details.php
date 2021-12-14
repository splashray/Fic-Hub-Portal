<?php
ob_start();

session_start();
include_once('includes/config.php');
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  ob_end_flush();

  } else{
//Code for Updation 

if(isset($_POST['update']))
{
    $firstname=$_POST['fname'];
    $lastname=$_POST['lname'];
    $pcontact=$_POST['contact'];

$userid=$_SESSION['id'];

    $msg=mysqli_query($con,"UPDATE users SET fname='$firstname',lname='$lastname',contactno='$pcontact' where id='$userid'") ;
    if(!$msg){
        die("QUERY FAILED". mysqli_error($con));
    }
       else if($msg)
        {
            echo "<script>alert('Profile updated successfully');</script>";
            echo "<script type='text/javascript'> document.location = 'change-personal-details.php'; </script>";
        }
}



// for  password change   
if(isset($_POST['change-password']))
{
$oldpassword=$_POST['currentpassword']; 
$newpassword=$_POST['newpassword'];
$sql=mysqli_query($con,"SELECT password FROM users where password='$oldpassword'");
$num=mysqli_fetch_array($sql);
if($num>0)
{
$userid=$_SESSION['id'];
$ret=mysqli_query($con,"update users set password='$newpassword' where id='$userid'");
echo "<script>alert('Password Changed Successfully !!');</script>";
echo "<script type='text/javascript'> document.location = 'change-personal-details.php'; </script>";
}
else
{
echo "<script>alert('Old Password not match !!');</script>";
echo "<script type='text/javascript'> document.location = 'change-personal-details.php'; </script>";
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

      <script language="javascript" type="text/javascript">
function valid()
{
if(document.changepassword.newpassword.value!= document.changepassword.confirmpassword.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.changepassword.confirmpassword.focus();
return false;
}
return true;
}
</script>

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
                                                        <h4>Change Personal Details</h4>
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
                                                    <li class="breadcrumb-item"><a href="personal-details.php"> Personal Details</a>
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
                                    
                                        <!-- start edit details -->
                                        <div class="card">

                                        <div class="card-block">

                                        <?php 
$userid=$_SESSION['id'];
$query=mysqli_query($con,"select * from users where id='$userid'");
while($result=mysqli_fetch_array($query))
{?>



                                        <form method="post">

                                        <br><br>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">First Name</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control"name="fname" id="fname" value = <?php echo $result['fname'];?> required />
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Last Name</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control"name="lname" id="lname" value = <?php echo $result['lname'];?> required />
                                                                    </div>
                                                                </div>


                                                                
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label"><i class="zmdi zmdi-email"></i>Email</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="email" class="form-control"name="email" id="email" value = <?php echo $result['email'];?> readonly />
                                                                    </div>
                                                                </div>


                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label"><i class="zmdi zmdi-email"></i>Phone Number</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control"name="contact" id="contact"  value = <?php echo $result['contactno'];?> 
                                                                        pattern="[0-9]{11}" title="11 numeric characters only"  maxlength="11" required/>
                                                                    </div>
                                                                </div>


                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label"><i class="zmdi zmdi-email"></i>Registered Date</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control"name="regdate" id="regdate" value = <?php echo $result['posting_date'];?> readonly />
                                                                    </div>
                                                                </div>
                    

                            <div class="form-group form-button"><button type="submit" class="btn btn-primary btn-block" name="update">Update Details</button> </div>
                                                                
                                                              
                                        </form>  <br><br><br>
<?php } ?>
                                        




<!-- password section -->

                                       
<form method="post" name="changepassword" onSubmit="return valid();" id="chgpass">
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Current Password </label>
                                                                    <div class="col-sm-10">
                                                                        <input type="password" class="form-control" id="currentpassword" name="currentpassword" value="" required />
                                                                    </div>
                                                                </div>


                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">New Password</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="password" class="form-control" id="newpassword" name="newpassword" value="" required />
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Confirm New Password</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" required />
                                                                    </div>
                                                                </div>

                    

                            <div class="form-group form-button"><button type="submit" class="btn btn-primary btn-block" name="change-password">Change Password</button> </div>
                                                                
                                                              
                                        </form>








                                        </div>


                                </div>
                                    <!-- end edit details -->


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