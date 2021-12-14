<?php 

session_start();
require_once('includes/config.php');

//Code for Registration 
if(isset($_POST['submit']))
{
    $fname= $_POST['fname'];
    $lname= $_POST['lname'];
    $email= $_POST['email'];
    $password=  md5($_POST['password']);
    $contact=   $_POST['contact'];

    $fname = mysqli_real_escape_string($con, $fname);
    $lname = mysqli_real_escape_string($con, $lname);
    $email = mysqli_real_escape_string($con, $email);
    $password = mysqli_real_escape_string($con, $password);
    $contact = mysqli_real_escape_string($con, $contact);

    // $query = "SELECT randSalt FROM users ";
    // $select_rand = mysqli_query($con, $query);
    // if(!$select_rand){
    //     die("Query Failed".mysqli_error($con));
    // }

    // $row = mysqli_fetch_array($select_rand);
    // $salt = $row['randSalt'];
    // $password = crypt($password, $salt);




$sql=mysqli_query($con,"select id from users where email='$email'");
$row=mysqli_num_rows($sql);

    if($row>0){
    echo "<script>alert('Email id already exist with another account. Please try with other email id');</script>";
        } else{
            $msg=mysqli_query($con,"insert into users(fname,lname,email,password,contactno) values('$fname','$lname','$email','$password','$contact')");

        if($msg)
        {
            echo "<script>alert('Registered successfully');</script>";
            echo "<script type='text/javascript'> document.location = 'login.php'; </script>";
        }
    }
}

 
?>





<!DOCTYPE html>
<html lang="en">
<head>
        <title> FIC-Hub Sign-up </title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

      <link rel="icon" href="assets/images/favicon-img.ico" type="image/x-icon">

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">

    <script type="text/javascript">
function checkpass()
{
if(document.signup.password.value!=document.signup.confirmpassword.value)
{
alert(' Password and Confirm Password field does not match');
document.signup.confirmpassword.focus();
return false;
}
return true;
} 

</script>

</head>
<body>

    <div class="main" style="padding-top:10px;  ">
    <h2 style="color:blue; text-align:center; " >FIC-HUB</h2>  <br>

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>


                        <form method="post" name="signup" onsubmit="return checkpass();"class="register-form" id="register-form">


                            <div class="form-group">
                                <label for="firstname"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="fname" id="fname" placeholder="Enter Your First Name" required/>
                            </div>

                            <div class="form-group">
                                <label for="lastname"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="lname" id="lastname" placeholder="Enter Your Last Name" required/>
                            </div>

                            <div class="form-group">
                                <label for="email"></label>
                                <input type="email" name="email" id="email" placeholder="Your Email" required/>
                            </div>

                            <div class="form-group">
                                <label for="phone"><i class="zmdi zmdi-phone"></i></label>
                                <input type="text" name="contact" id="contact" placeholder="Your Phone"  required pattern="[0-9]{11}" title="11 numeric characters only"  maxlength="11" required/>
                            </div>

                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password"
                                 pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="at least one number and one uppercase and lowercase letter, and at least 6 or more characters" required
                                 placeholder="Create a password" />
                            </div>

                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="confirmpassword" id="confirmpassword"
                                 pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="at least one number and one uppercase and lowercase letter, and at least 6 or more characters" required
                                placeholder="Repeat your password"/>
                            </div>

                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" required />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span> <i>I Understand that No Password Recovery? <br>And i bear all risks due to loss of password</i></label>
                            </div>
                            <!-- <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" required />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div> -->
                            <div class="form-group form-button">
                                <input type="submit" name="submit" id="signup" class="form-submit" value="Create Account"/>
                            </div>
                        </form>



                    </div>
                    <div class="signup-image">
                        <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="login.php" class="signup-image-link">I am already member</a>
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