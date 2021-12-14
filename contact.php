
<?php

include_once('../portal/includes/config.php');

    if(isset($_POST['support'])){
   
   $fname = $_POST['fname'];
   $lname = $_POST['lname'];
   $email = $_POST['email'];
   $subject = $_POST['subject'];
   $message = $_POST['message'];

   $name = "$fname ' ' $lname";
   
   $query = "INSERT INTO message(name, email, subject, message) ";
   $query .= "VALUES('{$name}','{$email}','{$subject}','{$message}' ) ";
   
   $msg_query = mysqli_query($con,$query);
   if(!$msg_query){
       die("Query Failed". mysqli_error($con));
   }
   echo "<script>alert('Message Sent and Recieved');</script>";
   echo "<script type='text/javascript'> document.location = 'contact.php'; </script>";
   
   
   
   
   }

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/styleAlt.css">
    <title>FIC HUB Contact</title>
</head>
<body>
    <header>
        <div class="logo"> <a href="index.html"><img id="screenLogo" src="" alt=""></a> </div>
        <div class="toggle"></div>
        <div class="dark" id="darkToggle">
            <img src="./images/moon.png" alt="">
        </div>
        
        <!-- Desktop nav -->
        <div class="navigationDesktop">
            <ul class="navList">
                <li><a href="index.html">Home</a></li>
                <li><a href="services.html">Services</a></li>
                <!-- <li><a href="work.html">Work</a></li> -->
                <li class="live"><a href="contact.php">Contact</a></li>
            </ul>
            <div class="social-bar">
                <ul class="socialList">
                    <li>
                        <a href="https://facebook.com">
                            <img id="fb" src="./images/facebook.png" target="_blank" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="https://instagram.com">
                            <img src="./images/instagram.png" target="_blank" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="https://twitter.com">
                            <img src="./images/twitter.png" target="_blank" alt="">
                        </a>
                    </li>
                </ul>
                <!-- <a href="mailto:decryptus080@gmail.com" class="email-icon">
                    <img src="images/email.png" alt="">
                </a> -->
            </div>
        </div>
        <!-- Mobile nav -->
        <div class="navigation">
            <ul class="navList">
                <li><a href="index.html">Home</a></li>
                <li><a href="services.html">Services</a></li>
                <!-- <li><a href="work.html">Work</a></li> -->
                <li><a href="contact.php">Contact</a></li>
            </ul>
            <div class="social-bar">
                <ul class="socialList">
                    <li>
                        <a href="https://facebook.com">
                            <img id="fb" src="./images/facebook.png" target="_blank" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="https://instagram.com">
                            <img src="./images/instagram.png" target="_blank" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="https://twitter.com">
                            <img src="./images/twitter.png" target="_blank" alt="">
                        </a>
                    </li>
                </ul>
                <a href="mailto:decryptus080@gmail.com" class="email-icon">
                    <img src="images/email.png" alt="">
                </a>
            </div>
        </div>
    </header>

    <section class="contactSection">
        <div class="title">
            <h1>Contact us.</h1>
            <p>You can reach us directly on the website or send us a direct Message on the website, we respond within 10 minutes, seems cool right?
                Try us out today</p>
        </div>
        <div class="contact">
            <div class="contact-form">
                <form method="post">
                    <div class="row">
                        <div class="input50">
                            <input type="text" placeholder="First Name" name="fname">
                        </div>
                        <div class="input50">
                            <input type="text" placeholder="last Name" name="lname">
                        </div>
                    </div>
                    <div class="row">
                        <div class="input50">
                            <input type="email" placeholder="Email"  name="email">
                        </div>
                        <div class="input50">
                            <input type="text" placeholder="Subject" name="subject">
                        </div>
                    </div>
                    <div class="row">
                        <div class="input100">
                            <textarea placeholder="Message" name="message"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input100">
                            <input type="submit" value="Send" name="support">
                        </div>
                    </div>
                </form>
            </div>
            <div class="contact-info">
                <div class="info-box">
                    <img src="images/address.png" alt="" class="contact-icon">
                    <div class="details">
                        <h4>Address</h4>
                        <p>No 50 Kwara State  <br> polytechnic gate, <br> Ilorin Kwara State <br></p>
                    </div>
                </div>
                <div class="info-box">
                    <img src="images/email.png" alt="" class="contact-icon">
                    <div class="details">
                        <h4>Email</h4>
                        <a href="mailto:fichub4@gmail.com">fichub4@gmail.com,</a>
                        <a href="mailto:domnick080@outlook.com">domnick080@outlook.com,</a>
                        <a href="mailto:digilearn2020@gmail.com">digilearn2020@gmail.com</a>

                    </div>
                </div>
                <div class="info-box">
                    <img src="images/call.png" alt="" class="contact-icon">
                    <div class="details">
                        <h4>Call</h4>
                        <a href="tel:+2347088435682">+234 708 843 5682,</a> <br>
                        <a href="tel:++2349031874139">+234 903 187 4139,</a> <br>
                        <a href="tel:+2349015755906">+234 901 575 5906,</a> <br>
                        <a href="tel:+2349081726874">+234 908 172 6874</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="./js/script.js"></script>
</body>
</html>