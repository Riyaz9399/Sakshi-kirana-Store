<!-- <?php
include("db.php");
include("CommonFunction.php");
session_start();
?> -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce Website</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <!-- bootstrap icon cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css" integrity="sha512-dPXYcDub/aeb08c63jRq/k6GaKccl256JQy/AnOq7CAnEZ9FzSL9wSbcZkMp4R26vBsMLFYH4kQ67/bbV8XaCQ==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
    <link rel="stylesheet" href="style.css">
    <style>
      body {
        background: linear-gradient(to right, #2193b0, #6dd5ed, #2193b0, #6dd5ed, #2193b0, #6dd5ed);
        width:100vw;
        height:100vh;
      }
      .card{
        border-color:2px solid black;
        box-shadow: 23px 34px 67px black;
      }
      .cart_image{
        width:70px;
        height:70px;
        object-fit:contain;
      }
      html, body {
    height: 100%;
    margin: 0;
    padding: 0;
}

.wrapper {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}


.content {
    flex: 1;
}

.footer {
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    background-color: #17a2b8; /* bg-info color */
    text-align: center;
    padding: 10px 0;
    color: white; /* Ensure text color is readable */
}

    </style>
</head>
<body>
     <!-- go back to main -->
    <div class="container-fluid p-0">
            <!-- The first child  -->
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <img class="img-logo" src="icons\Logo.jpg">
                 <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"         aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                 </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-3 mb-lg-0">
                       <li class="nav-item">
                         <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                       </li>
                       <li class="nav-item">
                         <a class="nav-link" href="display_all.php">Products</a>
                       </li>
                       <li class="nav-item">
                         <a class="nav-link" href="./user_Area/registration.php">Register</a>
                       </li>
                       <li class="nav-item">
                         <a class="nav-link" href="#">Contact</a>
                       </li>
                       <li class="nav-item">
                         <a class="nav-link" href="cart.php"> Carts<i class="bi bi-cart4"></i><sup> <?php number_of_cart_items();?></sup></a>
                       </li>
                    </ul>
                    
               </div>
            </div>
        </nav>


        <!-- Second Child -->
        <nav class="navbar navbar-expand-lg  navbar-dark bg-secondary">
            <ul class="navbar-nav me-auto">
            <li class="nav-item">
                <a class="nav-link " href="#">Welcome Guest</a>
            </li>

            <?php
             if(!isset($_SESSION['username'])){
              echo '<li class="nav-item">
      <a class="nav-link" href="user_Area\user_login.php">LOGIN</a>
  </li>';
         }else{
          echo '<li class="nav-item">
          <a class="nav-link" href="user_Area\Logout.php">LOGOUT</a>
      </li>';
         }
            
            ?>
            
            </ul>
        </nav>

        <!-- Third Child -->
        <div class="">
                <h3 class="text-center">Sakshi Kirana Store</h3>
                <p class="text-center">We listen, we care, Personalized support tailored to your needs</p>
        </div>

        <!-- fourth Child -->

        <div class="container">
            <div class="row">

            <form action="" method="Post" >
                <table class="table table-striped table-dark table-bordered table-hover text-center">
                    
                    <!-- php code for dunamic data from the databse -->
                    <?php
                    //  session_start();
                      $ip = getIPAddress();  
                      $cart_Query = "SELECT * FROM `carts_detail` WHERE `Ip_Address` =  '$ip' ";
                      $result = mysqli_query($conn, $cart_Query);
                      $number_of_carts_item = mysqli_num_rows($result);
                   if($number_of_carts_item > 0){   
                     echo " <tr>
                                    <th>Product Title</th>
                                    <th>Product Image</th>
                                     <th>Quantity</th>
                                     <th>Total Price</th>
                                     <th>Remove</th>
                                     <th> Operations</th> 
                                   </tr>";
                                     
                      while ($row = mysqli_fetch_array($result)){
                        $product_id = $row['product_Id'];
                        $select_Price = "SELECT * FROM  `products` Where `product_Id` = '$product_id' ";
                        
                        $result_product = mysqli_query($conn, $select_Price);
                        $product_prices = array();
                        while ($row_product_price = mysqli_fetch_array($result_product)){
                          $product_price[] = array($row_product_price["product_price"]);
                          $totalprice_value_sum = array_sum($product_price );
                          $totalprice_value = $row_product_price['product_price'];
                          $productTable_Title = $row_product_price['product_title'];
                          $product_Image = $row_product_price['Image_1'];
                          
                          echo  "
                                    <tr>
                                        <td>  $productTable_Title</td>
                                        <td><image class='cart_image' src='admin/products_images/$product_Image' alt=''/></td>
                                        <td><input type='text' name='cart_quantity' placeholder=' $totalprice_value_sum ' id=''  class='form-input w-50'/> </td>
                                        <td> $totalprice_value </td>
                                        <td><input type='checkbox' name='removeitem[]'value='$product_id'/></td>
                                        <td>   
                                        <input name='Update' type='submit' class='btn btn-info px-3 py-2 border-0 mx-3 my-3' value='Update'  />
                                        <input name='Remove' type='submit' class='btn btn-info px-3 py-2 border-0 mx-3 my-3' value='Remove'  />
                                    </td>
                                      </tr>" ;
                                     
                        }
                      }
                     
                    }
                      
                    else{
                      echo '<h2 class=" text-center text-danger fst-italic">Your cart is empty cart</h2>';
                    }
                    
                      $get_ip_address = getIPAddress();
                      $subtotal = 0;
                      if(isset($_POST['Update'])){
                       $cart_quantity = $_POST['cart_quantity'];                  
                        $update_Queruy = "UPDATE `carts_detail` SET `quantity`='$cart_quantity' Where  `Ip_Address` = '$get_ip_address'" ;
                        $result = mysqli_query($conn,$update_Queruy);                                 
                        $totalprice_value =  (int)$totalprice_value * (int)$cart_quantity;
                         $subtotal +=  $totalprice_value;
                      }    

                    ?>
                </table>
                    </form>

                    <!-- Function for removing the items from the cart -->
                       
                      <?php
                      
                         $ip = getIPAddress();  
                         $cart_Query = "SELECT * FROM `carts_detail` WHERE `Ip_Address` =  '$ip' ";
                         $result = mysqli_query($conn, $cart_Query);
                         $number_of_carts_item = mysqli_num_rows($result);
                        
                      if($number_of_carts_item > 0){  
                        echo "<h4 class='px-3 text-dark'>Subtotal: <strong> $subtotal/-</strong> </h4>
                        <a href='index.php' ><button class=' btn btn-info p-2 text-light mb-4'>Continue Shopping</button></a>
                         <a href='user_Area/ChecKout.php' ><button class='btn btn-info p-2 text-light mb-4'>CheckOut</button></a>";
                      }else{
                        echo ' <a href="index.php" ><button class=" btn btn-info p-2 text-light mb-4">Continue Shopping</button></a>';
                      }
                      
                      ?>

                <!-- Subtotal -->
                 
            </div>
        </div>

        <?php
                        function remove_cart(){
                          global $conn;
                          if(isset ($_POST['Remove'])){
                            foreach($_POST['removeitem'] as $remove_id){
                              echo $remove_id;
                              $delete_Query = "DELETE  FROM  `carts_detail` WHERE `product_Id` = $remove_id ";
                              $result = mysqli_query($conn, $delete_Query); 
                            }
                          }
                        }
                        
                       $remove_item = remove_cart();
                        
                        ?>


      


        <!--  last child -->
        <div class="container-fluid p-0 bg-info footer  text-dark text-center">
    <p class="text-center">"Need assistance? Our customer support team is here to help you 24/7. Contact us anytime for any inquiries or support."</p>
</div>



    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>   
</body>
</html>

<?php
function calculateTotalPrice($conn, $ip) {
        $totalPrice = 0;

        $cart_Query = "SELECT * FROM `carts_detail` WHERE `Ip_Address` = '$ip'";
        $result = mysqli_query($conn, $cart_Query);

        while ($row = mysqli_fetch_array($result)) {
            $product_id = $row['product_Id'];
            $select_Price = "SELECT * FROM `products` WHERE `product_Id` = '$product_id'";
            $result_product = mysqli_query($conn, $select_Price);

            while ($row_product_price = mysqli_fetch_array($result_product)) {
                $product_price = $row_product_price["product_price"];
                $quantity = $row['quantity'];
                $subtotal = $product_price * $quantity;
                $totalPrice += $subtotal;
            }
        }

        return $totalPrice;
    }
    ?>
