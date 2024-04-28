<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user registration</title>
    <!-- bootstrap css link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- font awesome link  -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
    />
</head>
<body>
<body class="container-fluid" style=" border:8px; margin-top:20px; width: 800px; height:950px; background:white; box-shadow: 2px 4px 8px 8px rgba(0, 0, 0, 0.1);">
    <h2 class="text-center m-4 mt-5 pt-3">New User registration</h2>
    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-lg-12 col-xl-6">
            <form action="" method="post" enctype="multipart/form-data">

                <!-- username -->
                <div class="form-outline mb-4">
                    <label for="user_username" class="form-label">Username</label>
                    <input type="text" id="user_username" class="form-control" placeholder="Enter your username" autocomplete="off" required="required" name="user_username">
                </div>

                <!-- email feild -->
                <div class="form-outline mb-4">
                    <label for="user_email" class="form-label">Email</label>
                    <input type="email" id="user_email" class="form-control" placeholder="Enter your Email" autocomplete="off" required="required" name="user_email">
                </div>

                <!-- image feild -->
                <div class="form-outline mb-4">
                    <label for="user_image" class="form-label">User image</label>
                    <input type="file" id="user_image" class="form-control" required="required" name="user_image">
                </div>

                 <!-- password feild -->
                 <div class="form-outline mb-4">
                    <label for="user_password" class="form-label">Password</label>
                    <input type="password" id="user_password" class="form-control" placeholder="Enter your password" autocomplete="off" required="required" name="user_password">
                </div>

                <!-- confirm password feild -->
                <div class="form-outline mb-4">
                    <label for="conf_user_password" class="form-label">Confirm Password</label>
                    <input type="password" id="conf_user_password" class="form-control" placeholder="Confirm your password" autocomplete="off" required="required" name="conf_user_password">
                </div>

                 <!-- address -->
                 <div class="form-outline mb-4">
                    <label for="user_address" class="form-label">Enter your Address</label>
                    <input type="text" id="user_address" class="form-control" placeholder="Enter your address" autocomplete="off" required="required" name="user_address">
                </div>

                <!-- contact -->
                <div class="form-outline mb-4">
                    <label for="user_contact" class="form-label">Enter your contact number</label>
                    <input type="text" id="user_contact" class="form-control" placeholder="Enter your contact number" autocomplete="off" required="required" name="user_contact">
                </div>

              


                <div class="mt-4 pt-2">
                    <input type="submit" value="REGISTER" class="bg-secondary py-2 px-3 border-0" style='border-radius:50px; color:white;' name='user_register'>
                    <a href="../index.php" class="bg-secondary py-2 px-3 border-0" style='text-decoration:none; border-radius:50px; color:white;' >RETURN TO HOME</a>



                    <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account?<a href="user_login.php" class="text-danger"> Login</a></p>
                    
                </div>
            </form>
        </div>
    </div>
</body>

    
</body>
</html>

<!-- php code -->

<!-- is there anything wrong with the code below?
 -->



<?php



if(isset($_POST['user_register'])) {
    $user_username=$_POST['user_username'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];
    $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
    $conf_user_password=$_POST['conf_user_password'];
    $user_address=$_POST['user_address'];
    $user_contact=$_POST['user_contact'];
    $user_image=$_FILES['user_image']['name'];
    $user_image_tmp=$_FILES['user_image']['tmp_name'];
    $user_ip=getIPAddress();
    $address=$_POST['address'];
    
    // select query

    $select_query="select * from `users` where username='$user_username' or email='$user_email'";
    $result=mysqli_query($con,$select_query);
    $rows_count=mysqli_num_rows($result);
    if($rows_count>0){
        echo "<script>alert('username or email already exists')</script>";
    }else if($user_password!=$conf_user_password){
        echo "<script>alert('password does not match')</script>";
    }else{
        // insert query
    move_uploaded_file($user_image_tmp,"./user_images/$user_image");
    move_uploaded_file($user_scanner_tmp,"./scanner_images/$user_scanner");
    $insert_query="insert into `users` (username,email,password,user_image,user_ip,address,phNo) values ('$user_username','$user_email','$hash_password','$user_image','$user_ip','$user_address','$user_contact')";
    
    $sql_execute=mysqli_query($con,$insert_query);

    echo "<script> alert('register succesful')</script>";
    // echo "<script> window.open('profile.php','self')</script>";
    echo "<script> window.open('./user_login.php','_self')</script>";
    }


// // selecting cart items
// $select_cart_items="select * from `cart_table` where user_ip='$user_ip'";$result_cart=mysqli_query($con,$select_cart_items);
// $rows_count=mysqli_num_rows($result_cart);
// if($rows_count>0){
//     $_SESSION['username']=$user_username;
//     echo "<script>alert('u have items in your cart')</script>";
//     echo "<script>window.open('checkout.php','_self')</script>";
// }else{
//     echo "<script>window.open('../index.php.php','_self')</script>";

// }

}

?>