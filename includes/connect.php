
<!-- dont have a password, NOT the mysql password !  -->
<?php
$con=mysqli_connect('localhost:3307','root','','hellmark');
if(!$con){
    die(mysqli_error($con));
}
?>
