<?php
include("../db.php");
include("../CommonFunction.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <!-- bootstrap icon cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css" integrity="sha512-dPXYcDub/aeb08c63jRq/k6GaKccl256JQy/AnOq7CAnEZ9FzSL9wSbcZkMp4R26vBsMLFYH4kQ67/bbV8XaCQ==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
 $user_Ip_address = getIPAddress();
 $get_USER =  "SELECT * FROM `registration` WHERE `user_Ip_address` = '$user_Ip_address' ";//AND  `Username` = '$_SESSION[username]'";
 $result = mysqli_query($conn,$get_USER );
 $Run_query = mysqli_fetch_array($result);
 $user_ID = $Run_query['id'];

?>

    <div class="container">
    <h2 class="text-center text-info ">Payment Options</h2>
    <br>
    <div class="row text-center d-flex justify-content-center align-items-center my-10">
        <div class="col-md-6 ">
            <a href="https://www.paypal.com" target="_blank"><img src="../icons/clove.jpg" ></a>
        </div>
        <div class="col-md-4 ">
            <a href="order.php?user_id=<?php echo $user_ID?>"><h2 class="text-center">Pay Offline</h2></a>
        </div>
        <div class="col-md-4 ">
            <a href="../razorpay-sample-project/index.php"><h2 class="text-center">Pay Online</h2></a>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>   
</body>
</html>