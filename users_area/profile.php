

<!-- connect file  -->
<?php

    include('../includes/connect.php');
    // this function has the dynamic products displayed 
    include('../functions/common_function.php');
    session_start();

    if(isset($_SESSION['username'])){
        $username=$_SESSION['username'];
        if($username=='Admin'){
            echo "<script>window.open('../admin_area/index.php','_self')</script>";
        }}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce Website</title>
    <link rel="stylesheet" href="../style.css">
    <!-- bootstrap css link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- font awesome link  -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
    />

    <style>
        .logo{
            width: 30px;
    object-fit: contain;
        }

        .profile{
            width:100%;
            display:block;
            margin:auto;
            object-fit:contain;

        }

        button, input[type="submit"]{
	background: none;
	color: inherit;
	border: none;
	padding: 0;
	font: inherit;
	cursor: pointer;
	outline: inherit;
}
    
        

    </style>
</head>
<body>
    <!-- navbar  -->


    <!-- first child (navbar) -->

    <!-- container-fluid takes 100% of the width -->
    <!-- p-0 makes the navbar box complete on top without spacking  -->
    <div class="nav-box-out" style="
      width: 100%;
  height: 400px;
  display: flex;
  flex-direction: column;
  background-image: url('https://images.unsplash.com/photo-1528698827591-e19ccd7bc23d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1176&q=80');
  background-size:     cover;            
  background-repeat:   no-repeat;
  background-position:center; 
  justify-content: start;
">



<div class="navnav">
<nav class="navbar navbar-expand-lg navbar-light " >
        <div class="container-fluid">
           
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                


                <?php



            
        




if(!isset($_SESSION['username'])){
}else{


    // global $con;
    // $select_cat="Select * from `user_table` where username=".$_SESSION['username']."";
    // $result_cat=mysqli_query($con,$select_cat);
    // $row_data=mysqli_fetch_assoc($result_cat);
    // $username=$row_data['username'];
    $username = $_SESSION['username'];
    $user_image="Select * from `user_table` where username='$username'";
    $result_image=mysqli_query($con,$user_image);
    $row_image=mysqli_fetch_array($result_image);
    $result_image=$row_image['user_image'];

    echo"
    <a href='./profile.php?username=$username'> <img src='./user_images/$result_image' width='50' height='50' class='rounded-circle'></a>
    ";
}




                ?>
                </li>
                
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="../index.php"style="color:white; font-size:24px;"><b>&nbsp Home</b></a>
                </li>




                <li class="nav-item">
                <a class="nav-link" href="../display_all.php"style="color:white;font-size:24px;"><b>All Products</b></a>
                </li>
                <li>

                



<?php

    if(!isset($_SESSION['username'])){
        echo"
        <a style='color:white; font-size:24px;' class='nav-link' href='./users_area/user_login.php'>Login </a>
        ";
    }else{
        echo"
        <a class='nav-link ' style='color:white; font-size:24px;' href='./user_logout.php'>Logout </a>
        ";
    }




?>


                </li>
                
                <!-- <li class="nav-item"><a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item() ?></sup></a></li> -->

                
                <!-- <li class="nav-item"><a class="nav-link" href="#">Total Price:<?php total_cart_price()?>/-</a></li> -->


            </ul>
            
		<button onclick="deleteplease()" style='color:white; font-size:24px;' class='nav-link btn '>DELETE PROFILE</button>
	

<script>

function deleteplease() {
    var txt;
    var r = confirm("Are you sure you want to delete your profile?");
    if (r == true) {
        window.open('../delete_profile.php','_self');
    }
    
}
</script>

	
            </div>
        </div>
        </nav>
</div>










<div class="navtext-box" style="display:flex;
justify-content:center;
flex-direction:column;
color: aliceblue;">
    <div class="actualtext " style=" color: aliceblue; text-align:left; margin-left:500px; margin-top:28px;">
<p>
   <b style=" color: aliceblue; text-align:left; margin-left:-20px; margin-top:30px; font-size:40px; font-family: 'Lucida Console'">INVENTORY</b>
</p>
<p style="margin-top:20px;">
   <b style=" color: aliceblue; text-align:left; margin-left:-20px; margin-top:30px; font-size:30px; font-family: 'Lucida Console'">
   Experience the uniqueness
    </b> 
</p>
<p style="margin-top:-15px;">
   <b style=" color: aliceblue; text-align:left; margin-left:-20px; margin-top:30px; font-size:20px; font-family: 'Lucida Console'">
   Your place, Your store
    </b> 
</p>

<p style="margin-left:-20px;">
<button class="solid-button-button button Button" 
style="
border-color:rgb(148, 110, 102);
    width:100px;
  border-radius: 50px;
  background-color: rgb(148, 110, 102);
  transition: all 0.3 ease-in;
" 


onclick="scrollToDiv()">
                    <span style="color">Options</span>
                  </button>
</p>



    </div>

</div>



        </div>



        <script>
        function scrollToDiv() {
        const divElement = document.querySelector('#products_main');
        divElement.scrollIntoView({ behavior: 'smooth' });
        }
    </script>














        <div class="p-3 m-3 mb-4">
       <?php
        if(!isset($_SESSION['username'])){
                    echo"
                    <h3 style='color:black; font-size:24px;' id='products_main'>
                    <div class='bg-light welcome'> 
                    <a class='nav-link text-center' href='#'>Welcome Guest</a>
                    </div>
                    </h3>
                    ";
                }else{
                    echo"
                    <h3 style='color:black; font-size:24px;' id='products_main'>
                    <div class='bg-light welcome'>
                    <a class='nav-link text-center' href='#'>Welcome ".$_SESSION['username']."</a>
                    </div>
                    </h3>
                    ";
                }
            
?>
       </div>
        



        
     
       
      <div class="row">
        
      <!-- 1 -->
      <div class='col-md-4 mb-2'>
                            <div class='card' style='height:300px;
                            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
                            width: 300px;border-radius:150px;margin: auto;text-align: center;font-family: arial;      
                            background: rgb(224,215,255); justify-content:center;' >
                                <a href="../showalluser.php" style="font-family:'Lucida Console'; font-size:30px; text-decoration:none; color:grey;">ITEMS</a>
                                
        
                            </div>
                            </div>
                            

<!-- 2 -->

                            <div class='col-md-4 mb-2'>
                            <div class='card' style='height:300px;
                            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
                            width: 300px;  border-radius:150px;  margin: auto;  text-align: center;  font-family: arial; 
                            background: rgb(215,238,255); justify-content:center;'>
                               <a href="../admin_area/insert_product.php" style="font-family:'Lucida Console'; font-size:30px; text-decoration:none; color:grey;">INSERT ITEMS</a>
                               
                                    
                                </div>
                            </div>

<!-- 3 -->


                            <div class='col-md-4 mb-2'>
                            <div class='card' style='height:300px;
                            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);width: 300px; border-radius:150px;  margin: auto;  text-align: center;  font-family: arial;
                            background:rgb(224,215,255); justify-content:center;'>
                               

                               <a href="../baught.php" style="font-family:'Lucida Console'; font-size:30px; text-decoration:none; color:grey;">REQUESTS</a>

                    


                                    
                                </div>
                            </div>
                            </div>





 

      </div>












            



        <!-- footer last child -->
        <!-- imclude footer -->

        <div class="mt-5">
        <?php
      
            include('../includes/footer.php');
        ?>

    </div>
    </div>
    
    



    <!-- bootstrap js link   -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>