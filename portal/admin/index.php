<?php

 session_start(); 
include_once('../includes/config.php');
// Code for login 
if(isset($_POST['login']))
{
$adminusername = $_POST['username'];
$pass=md5($_POST['password']);

$ret=mysqli_query($con,"SELECT * FROM admin WHERE username='$adminusername' and password='$pass'");
$num=mysqli_fetch_array($ret);
        if($num>0)
        {
        $extra="dashboard.php";
        $_SESSION['login']=$_POST['username'];
        $_SESSION['adminid']=$num['id'];
        echo "<script>window.location.href='".$extra."'</script>";
        exit();
        }

        else{
        echo "<script>alert('Invalid username or password');</script>";
        $extra="index.php";
        echo "<script>window.location.href='".$extra."'</script>";
        exit();
        }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign into FIC-HUB Admin</title>
      <link rel="icon" href="assets/images/favicon-img.ico" type="image/x-icon">

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="main" style="padding-top:10px;  ">
    <h2 style="color:blue; text-align:center; ">FIC-HUB Admin</h2>  <br>
        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">                     

                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="../images/signin-image.jpg" class="disable" alt="sing up image"></figure>
                        <a href="#" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Admin Dashboard</h2>
                        <form action="" method="POST">

                        
                            <div class="form-group">
                                <label for="your_email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" id="username" placeholder="Your Admin  Username" required/>
                            </div>


                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="upass" placeholder="Admin Password Access" required/>
                            </div>


                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" required />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div>

                        <!-- <a class="small" href="password-recovery.php">Forgot Password?</a> -->

                            <div class="form-group form-button">
                                <input type="submit" name="login" id="login" class="form-submit" value="Log in"/>
                            </div>
                        </form>



                        <!-- <div class="social-login">
                            <span class="social-label">Or login with</span>
                            <ul class="socials">
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                            </ul>
                        </div> -->
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../js/main.js"></script>
    <script>
        document.querySelector('.disable').addEventlisteners('click', e => e.preventDefault())
    </script>
</body>
</html>