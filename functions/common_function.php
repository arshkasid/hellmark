
<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="../style.css">
</head>

<style>
*{
    font-family: 'Lucida Console';
}
</style>


<?php

    //displaying front page prducts
    function getproducts(){
        global $con;
        //only if category and brand variable is not set, display the data
        if(!isset($_GET['category'])){
            $select_query="Select * from `products` order by rand() LIMIT 0,6";
            $result_query=mysqli_query($con,$select_query);

                        while($row=mysqli_fetch_assoc($result_query)){

                            // in insert product, to put n database, it was the the name of the input form part that was written in the [], her to fetch it is the column name in [] (the $name is just a variable)
                            $product_id=$row['product_id'];
                            $product_title=$row['product_title'];
                            
                            $category_id=$row['category_id'];
                            $product_price=$row['product_price'];
                            //accessing images
                            $product_image1=$row['product_image1'];
                            

                            
                            echo "


                            <div class='col-md-4 mb-2'>
    <div class='card' style='width: 20rem; margin:30px; margin-top:-5px; border:8px; box-shadow: 3px 4px 8px 0 rgba(0, 0, 0, 0.2); '>
    
    
    
    
    <img class='card-img-top slide' src='./admin_area/product_images/$product_image1' alt='Card image cap'>



    <div class='card-body' style='text-align: center;'>
        <h5 class='card-title m-3'>$product_title</h5>

        <a style='border-radius:50px' href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
            <button class='btn btn-secondary' style='border-radius:50px'>
        <a href='checkout.php?product_id=$product_id' style='text-decoration: none; color: white'  style='border-radius:50px' >Contact</a>
      </button>

    </div>
    </div>
    </div>


                         


                            ";

                            

                        }
            }
        }



   




























// getting all products
function get_all_products(){

    global $con;
    //only if category and brand variable is not set, display the data
    if(!isset($_GET['category'])){
        $select_query="Select * from `products` order by rand() ";
        $result_query=mysqli_query($con,$select_query);

                    while($row=mysqli_fetch_assoc($result_query)){

                        // in insert product, to put n database, it was the the name of the input form part that was written in the [], her to fetch it is the column name in [] (the $name is just a variable)
                        $product_id=$row['product_id'];
                        $product_title=$row['product_title'];
                        
                        $category_id=$row['category_id'];
                        $product_price=$row['product_price'];
                        //accessing images
                        $product_image1=$row['product_image1'];
                        

                        echo " 
                            
                        <div class='col-md-4 mb-2'>
                        <div class='card' style='width: 20rem; margin:30px; margin-top:-5px; border:8px; box-shadow: 3px 4px 8px 0 rgba(0, 0, 0, 0.2); '>
                        
                        
                        
                        
                        <img class='card-img-top slide' src='./admin_area/product_images/$product_image1' alt='Card image cap'>
                    
                    
                    
                        <div class='card-body' style='text-align: center;'>
                            <h5 class='card-title m-3'>$product_title</h5>
                    
                            <a style='border-radius:50px' href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                                <button class='btn btn-secondary' style='border-radius:50px'>
                            <a href='checkout.php?product_id=$product_id' style='text-decoration: none; color: white'  style='border-radius:50px' >Contact</a>
                          </button>
                    
                        </div>
                        </div>
                        </div>
                    
                    
                        ";

                    }
        }
    }




    // if category is choosen only display those items 
    function get_unique_categories(){
            global $con;
            //only if category and brand variable is set, display the data
            if(isset($_GET['category'])){
                // inside getcategories we have set category=$cat_id
                $category_id=$_GET['category'];

                $select_query="Select * from `products` where category_id=$category_id";
                $result_query=mysqli_query($con,$select_query);
                $number_of_rows=mysqli_num_rows($result_query);

    
                while($row=mysqli_fetch_assoc($result_query)){
    
                                // in insert product, to put n database, it was the the name of the input form part that was written in the [], her to fetch it is the column name in [] (the $name is just a variable)
                                $product_id=$row['product_id'];
                                $product_title=$row['product_title'];
                          
                                $category_id=$row['category_id'];
                                $product_price=$row['product_price'];
                                //accessing images
                                $product_image1=$row['product_image1'];
                               
    
                                echo " 
                                <div class='col-md-4 mb-2'>
                                <div class='card' style='width: 20rem; margin:30px; margin-top:-5px; border:8px; box-shadow: 3px 4px 8px 0 rgba(0, 0, 0, 0.2); '>
                                
                                
                                
                                
                                <img class='card-img-top slide' src='./admin_area/product_images/$product_image1' alt='Card image cap'>
                            
                            
                            
                                <div class='card-body' style='text-align: center;'>
                                    <h5 class='card-title m-3'>$product_title</h5>
                            
                                    <a style='border-radius:50px' href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                                        <button class='btn btn-secondary' style='border-radius:50px'>
                                    <a href='checkout.php?product_id=$product_id' style='text-decoration: none; color: white'  style='border-radius:50px' >Contact</a>
                                  </button>
                            
                                </div>
                                </div>
                                </div>
                            
                            
                            ";




                               








    
                }
            }
    }




    //displaying categories
    function getcategories(){
        global $con;
        $select_cat="Select * from `categories`";
        $result_cat=mysqli_query($con,$select_cat);
        while($row_data=mysqli_fetch_assoc($result_cat)){
            $cat_title=$row_data['category_title'];
            $cat_id=$row_data['category_id'];
            echo " <li class='nav-item'>
                    <a href='display_all.php?category=$cat_id' class='nav-link text-light'><h4>$cat_title</h4></a>
                </li>";
        }
    }
    

// searching products function

function search_product(){

    global $con;
if(isset($_GET['search_data_product'])){
    $search_data_value=$_GET['search_data'];
        $seach_query="Select * from `products` where product_keywords like '%$search_data_value%'";
        $result_query=mysqli_query($con,$seach_query);

                    while($row=mysqli_fetch_assoc($result_query)){

                        // in insert product, to put n database, it was the the name of the input form part that was written in the [], her to fetch it is the column name in [] (the $name is just a variable)
                        $product_id=$row['product_id'];
                        $product_title=$row['product_title'];
                       
                        $category_id=$row['category_id'];
                        $product_price=$row['product_price'];
                        //accessing images
                        $product_image1=$row['product_image1'];
                       
                        
                        

                        echo " 
                        <div class='col-md-4 mb-2'>
                        <div class='card' style='width: 20rem; margin:30px; margin-top:-5px; border:8px; box-shadow: 3px 4px 8px 0 rgba(0, 0, 0, 0.2); '>
                        
                        
                        
                        
                        <img class='card-img-top slide' src='./admin_area/product_images/$product_image1' alt='Card image cap'>
                    
                    
                    
                        <div class='card-body' style='text-align: center;'>
                            <h5 class='card-title m-3'>$product_title</h5>
                    
                            <a style='border-radius:50px' href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                                <button class='btn btn-secondary' style='border-radius:50px'>
                            <a href='checkout.php?product_id=$product_id' style='text-decoration: none; color: white'  style='border-radius:50px' >Contact</a>
                          </button>
                    
                        </div>
                        </div>
                        </div>
                    
                    
                            ";

                    }
        }
    }


    // view details function
    function view_details(){

        global $con;
        //only if category and brand variable is not set, display the data
        if(isset($_GET['product_id'])){
                $product_id=$_GET['product_id'];

            $select_query="Select * from `products` where product_id='$product_id'";
            $result_query=mysqli_query($con,$select_query);
            $row=mysqli_fetch_assoc($result_query);
            $username=$row['username'];

        
            $select_user_things="Select * from `user_table` where username='$username'";
            $result_query1=mysqli_query($con,$select_user_things);
            $row2=mysqli_fetch_assoc($result_query1);
 	
                            // in insert product, to put n database, it was the the name of the input form part that was written in the [], her to fetch it is the column name in [] (the $name is just a variable)
                            $user_email=$row2['user_email'];
                            $user_address=$row2['user_address'];
                            $product_title=$row['product_title'];
                            $user_mobile=$row2['user_mobile'];
                            $upi_id=$row2['upi_id'];
                            $product_price=$row['product_price'];
                        

                            echo " 


                            <div class='col-md-4 mb-2'>
                            <div class='card' style='width: 20rem; margin:30px; margin-top:-5px; border:8px; box-shadow: 3px 4px 8px 12px rgba(0.2, 0.2, 0.2, 0.2); '>
              
                            <div class='card-body' style='text-align: center;'>
                                <h5 class='card-title m-2'><b>$product_title</b></h5>
                                <p class='card-title m-3'>Email: $user_email</p>
                                <p class='card-title m-3'>Address: $user_address</p>
                                <p class='card-title m-3'>UPI: $upi_id</p>
                                <p class='card-title m-3'>Price: $product_price</p>
                        
                                <a style='border-radius:50px' href='index.php' class='btn btn-secondary'>Go Back</a>
                        
                            </div>
                            </div>
                            </div>
                            
                        
                            
                            ";

                        
            }
        }


    // get ip address
    
    function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;  


// cart function
function cart(){
if(isset($_GET['add_to_cart'])){
    global $con;
    $ip = getIPAddress();
    $get_product_id=$_GET['add_to_cart'];
    $select_query="Select * from `cart_details` where ip_address='$ip' and product_id='$get_product_id'";
    $result_query=mysqli_query($con,$select_query);
    $number_of_rows=mysqli_num_rows($result_query);

                if($number_of_rows>0){
                    echo "<script>alert('this item already present  int thecart')</script>";
                    echo "<script>window.open('index.php','_self')</script>";
                }else{
                    $insert_query="insert into `cart_details` (product_id,ip_address,quantity) values ('$get_product_id','$ip',0)";
                    $result_query=mysqli_query($con,$insert_query);
                    echo "<script>alert('this item is added to the cart')</script>";
                    echo "<script>window.open('index.php','_self')</script>";
                }
            
}
}

// function to get cart items

function cart_item(){

    if(isset($_GET['add_to_cart'])){
        global $con;
        $ip = getIPAddress();
       
        $select_query="Select * from `cart_details` where ip_address='$ip'";
        $result_query=mysqli_query($con,$select_query);
        $count_cart_items=mysqli_num_rows($result_query);
    }else{
        global $con;
        $ip = getIPAddress();
       
        $select_query="Select * from `cart_details` where ip_address='$ip'";
        $result_query=mysqli_query($con,$select_query);
        $count_cart_items=mysqli_num_rows($result_query);
                    }
                echo $count_cart_items;
    }


// total price function
function total_cart_price(){
    global $con;
    $get_ip_add = getIPAddress();
    $total=0;
    $cart_query="Select * from `cart_details` where ip_address='$get_ip_add'";
    $result=mysqli_query($con,$cart_query);
    while($row=mysqli_fetch_array($result)){
        $product_id=$row['product_id'];
        $select_products="Select * from `products` where product_id='$product_id'";
        $result_products=mysqli_query($con,$select_products);
        while($row_product_price=mysqli_fetch_array($result_products)){
            $product_price=array($row_product_price['product_price']);
            $product_values=array_sum($product_price);
            $total+=$product_values;
        }
    }
    echo $total;
}





function deleteplease() {
    $username=$_SESSION['username'];
    // Your code here
    global $con;

    $select_query="DELETE FROM `products` WHERE username='$username'";

    $result_query=mysqli_query($con,$select_query);


    $select_query="DELETE FROM `user_table` WHERE username='$username'";
    
    $result_query=mysqli_query($con,$select_query);

    
    session_unset();
    session_destroy();
    
    echo "<script> window.open('./index.php','_self')</script>";


}





function showalluser(){

    global $con;

        $username=$_SESSION['username'];
            $seach_query="Select * from `products` where username='$username'";
            $result_query=mysqli_query($con,$seach_query);
    
                        while($row=mysqli_fetch_assoc($result_query)){
    
                            // in insert product, to put n database, it was the the name of the input form part that was written in the [], her to fetch it is the column name in [] (the $name is just a variable)
                            $product_id=$row['product_id'];
                            $product_title=$row['product_title'];
                            
                            $category_id=$row['category_id'];
                            
                            $product_price=$row['product_price'];
                            //accessing images
                            $product_image1=$row['product_image1'];
                           
                            
                            
    
                            echo " 
                            <div class='col-md-4 mb-2'>
                            <div class='card' style='width: 20rem; margin:30px; margin-top:-5px; border:8px; box-shadow: 3px 4px 8px 0 rgba(0, 0, 0, 0.2); '>
                            
                            
                            
                            
                            <img class='card-img-top slide' src='./admin_area/product_images/$product_image1' alt='Card image cap'>
                        
                        
                        
                            <div class='card-body' style='text-align: center;'>
                                <h5 class='card-title m-3'>$product_title</h5>
                        
                                
                        
                              <button class='btn btn-secondary' style='border-radius:50px'>
                                <a href='deleteitem.php?product_id=$product_id' style='text-decoration: none; color: white' style='border-radius:50px' >Delete Item</a>
                              </button>
                        
                            </div>
                            </div>
                            </div>
                        
                        
                            
                            ";
    
                        }
            }




function deleteitem(){
    global $con;
    $username=$_SESSION['username'];
    $product_id=$_GET['product_id'];
    $select_query="DELETE FROM `products` WHERE username='$username' and product_id='$product_id'";
    $result_query=mysqli_query($con,$select_query);
    echo "<script> window.open('./users_area/profile.php','_self')</script>";
    
}




function show_top3_sellers(){
    global $con;
    $query= "select username,count(*) from `products` group by username order by count(*) desc limit 3";
    $runquery=mysqli_query($con,$query);
    while($row=mysqli_fetch_array($runquery)){
        $username=$row['username'];
        

        $select_user_things="Select * from `user_table` where username='$username'";
        $result_query1=mysqli_query($con,$select_user_things);
        $row=mysqli_fetch_assoc($result_query1);



        $image=$row['user_image'];
        echo "
        <div class='col-md-3 m-5'>
        <div class='card' style='height:200px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
max-width: 200px;
margin: auto;
text-align: center;
border-radius:100px;'>


<img  src='./users_area/user_images/$image' width='200' height='200' class='rounded-circle'>

        </div>
        <div class='card-body' style='text-align:center;'>
                <h5 class='card-title p-2'>$username</h5>
            </div>
        </div>
        ";
    }
}




function baught(){

    $username=$_SESSION['username'];
    global $con;
    $select="SELECT * FROM `bought` where seller_username='$username'";
    $run=mysqli_query($con,$select);
    while($row=mysqli_fetch_array($run)){
        
        $buyer_username=$row['buyer_username'];
        
        $selectbuyer="select * from user_table where username='$buyer_username'";
        $run2=mysqli_query($con,$selectbuyer);
        $row2=mysqli_fetch_array($run2);

        $product_img=$row['product_image'];
        $product_title=$row['product_title'];
        $user_phone=$row2['user_mobile'];
        $user_email=$row2['user_email'];
        $product_id=$row['product_id'];

        echo "
        <div class='container' style=' width:1550px; margin:30px; margin-top:-5px; border:8px; box-shadow: 3px 4px 8px 8px rgba(0, 0, 0, 0.1); '>
        <div class='row'>
            <div class='col-4'>
                <img class='card-img-top slide' src='./admin_area/product_images/$product_img' alt='Card image cap'>
            </div>
            <div class='col-8'>
                <div class='card-body' style='text-align: center;'>
                    <h5 class='card-title m-3'></h5>
                    <p class='card-title m-3'><b>$buyer_username </b> is interested in <b>$product_title</b></p>
                    <p class='card-title m-3'>Contact them at: $user_phone</p>
                    <p class='card-title m-3'>Or <a href='mailto:$user_email'>CLICK HERE</a> to send them a mail </p>
                    <a href='delete_req.php?product_id=$product_id&buyer_username=$buyer_username' class='btn btn-primary' style='text-decoration: none; color: white; border-radius:50px;'>Remove Request</a>
                </div>
            </div>
        </div>
    </div>
    


        ";
    }
    
}



    
function show_users(){
    global $con;
    $query= "select * from `user_table` where username!='Admin'";
    $runquery=mysqli_query($con,$query);
    while($row=mysqli_fetch_array($runquery)){
        $username=$row['username'];
        $image=$row['user_image'];

        echo "
        <div class='col-md-3 m-5'>
        <div class='card' style='height:200px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
max-width: 200px;
margin: auto;
text-align: center;
border-radius:100px;'>


<img  src='../users_area/user_images/$image' width='200' height='200' >

        </div>
        <div class='card-body' style='text-align:center;'>
                <h5 class='card-title p-2'>$username</h5>
            </div>
        </div>
        ";
    }
}



function related_products(){


    global $con;
    //only if category and brand variable is set, display the data
    $product_id=$_GET['product_id'];

        // inside getcategories we have set category=$cat_id
        $select_query="Select * from `products` where  product_id='$product_id' ";
        $result_query=mysqli_query($con,$select_query);
        $row=mysqli_fetch_assoc($result_query);
        $category=$row['category_id'];

        $select="Select * from `products` where category_id='$category' order by rand() LIMIT 0,6";
        $run=mysqli_query($con,$select);
        while($row=mysqli_fetch_assoc($run)){

            // in insert product, to put n database, it was the the name of the input form part that was written in the [], her to fetch it is the column name in [] (the $name is just a variable)
            $product_id=$row['product_id'];
            $product_title=$row['product_title'];
            $category_id=$row['category_id'];
            
            $product_price=$row['product_price'];
            //accessing images
            $product_image1=$row['product_image1'];
            

            
            echo "


            <div class='col-md-4 mb-2'>
            <div class='card' style='width: 20rem; margin:30px; margin-top:-5px; border:8px; box-shadow: 3px 4px 8px 0 rgba(0, 0, 0, 0.2); '>
            
            
            
            
            <img class='card-img-top slide' src='./admin_area/product_images/$product_image1' alt='Card image cap'>
        
        
        
            <div class='card-body' style='text-align: center;'>
                <h5 class='card-title m-3'>$product_title</h5>
        
                <a style='border-radius:50px' href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                    <button class='btn btn-secondary' style='border-radius:50px'>
                <a href='checkout.php?product_id=$product_id' style='text-decoration: none; color: white'  style='border-radius:50px' >Contact</a>
              </button>
        
            </div>
            </div>
            </div>
        
        
           ";
        }


}














    // include('./includes/connect.php');




//     //displaying front page prducts
//     function getproducts(){
//         global $con;
//         //only if category and brand variable is not set, display the data
//         if(!isset($_GET['category'])){
//             if(!isset($_GET['brand'])){
//             $select_query="Select * from `products` order by rand() LIMIT 0,6";
//             $result_query=mysqli_query($con,$select_query);

//                         while($row=mysqli_fetch_assoc($result_query)){

//                             // in insert product, to put n database, it was the the name of the input form part that was written in the [], her to fetch it is the column name in [] (the $name is just a variable)
//                             $product_id=$row['product_id'];
//                             $product_title=$row['product_title'];
//                             $product_description=$row['product_description'];
//                             $category_id=$row['category_id'];
//                             $brand_id=$row['brand_id'];
//                             $product_price=$row['product_price'];
//                             //accessing images
//                             $product_image1=$row['product_image1'];
//                             $product_image2=$row['product_image2'];
//                             $product_image3=$row['product_image3'];

                            
//                             echo " 
//                             <div class='col-md-4 mb-2'>
//                             <div class='card' style='height:400px;
//                             box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
//   max-width: 300px;
//   margin: auto;
//   text-align: center;
//   font-family: arial;
                            
//                             '>
//                                 <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
//                                 <div class='card-body'>
//                                     <h5 class='card-title'>$product_title</h5>
//                                     <p class='card-text' style='height:40px; text-overflow: ellipsis;  overflow: hidden;
//                                     -webkit-box-orient: vertical;
//   display: -webkit-box;
//   -webkit-line-clamp: 2;
//   overflow: hidden;
//   text-overflow: ellipsis;
//   white-space: normal;
                                    
                                    
                                    
//                                     '>$product_description</p>
//                                     <p class='card-text'>Price: $product_price/-</p>
                                    
                                    
                                    
//                                     <a style='border-radius:50px' href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
//                                     <button class='btn btn-secondary' style='border-radius:50px'>
//                                 <a href='checkout.php?product_id=$product_id' style='text-decoration: none; color: black' style='border-radius:50px' >Check Out</a>
//                               </button>
                                    
//                                 </div>
//                             </div>
//                             </div>";




                            

//                         }
//             }
//         }
//     }









?>

<!-- ADD TO CART 
<a href='index.php?add_to_cart=$product_id' class='btn btn-info back'>Add to cart</a> -->



<!-- <img style='height:200px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    max-width: 200px;
    margin: auto;
    text-align: center;
    border-radius:100px;'     src='./users_area/user_images/$image' class='card-img-top' alt='$username'> -->





