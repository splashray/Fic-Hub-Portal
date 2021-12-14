<?php
ob_start();

session_start();

unset($_SESSION['id']) ;
unset($_SESSION['fname']);
unset($_SESSION['lname']);
unset($_SESSION['email']);

session_destroy();
header("Location: login.php");
ob_end_flush();

exit(0);


?>

<!-- <script language="javascript">
document.location="login.php";
</script> -->



