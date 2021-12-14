<?php
ob_start();
 session_start(); 
include_once('includes/config.php');
// Code for login 
if(isset($_POST['login']))
{
$password=$_POST['password'];

$dec_password=md5($password);

// $password = crypt($password, $dec_password);

$useremail=$_POST['uemail'];
$ret= mysqli_query($con,"SELECT id,fname FROM users WHERE email='$useremail' and password='$dec_password'");
$num=mysqli_fetch_array($ret);
if($num>0)
{

$_SESSION['id']=$num['id'];
$_SESSION['name']=$num['fname'];
header("location:welcome.php");
ob_end_flush();
}
else
{
echo "<script>alert('Invalid username or password');</script>";
}
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> FIC-Hub Login </title>

      <link rel="icon" href="assets/images/favicon-img.ico" type="image/x-icon">

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="main" style="padding:10px; " >
    <h2 style="color:blue; text-align:center; ">FIC-HUB</h2>  <br>
        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">                     

                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
                        <a href="signup.php" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Sign in</h2>
                        <form action="" method="POST" class="register-form" id="login-form">

                        
                            <div class="form-group">
                                <label for="your_email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="email" name="uemail" id="uemail" placeholder="Your Email address" required/>
                            </div>


                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="upass" placeholder="Password" required/>
                            </div>


                            <!-- <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" required />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Check that No Password Recovery</label>
                            </div> -->

                        <!-- <a class="small" href="#">Forgot Password?</a> -->

                            <div class="form-group form-button">
                                <input type="submit" name="login" id="login" class="form-submit" value="Log in"/>
                            </div>
                        </form>



                        <div class="social-login">
                            <span class="social-label">Or login with</span>
                            <ul class="socials">
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>