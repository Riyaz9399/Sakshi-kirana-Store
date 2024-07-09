


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Account</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <!-- bootstrap icon cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css" integrity="sha512-dPXYcDub/aeb08c63jRq/k6GaKccl256JQy/AnOq7CAnEZ9FzSL9wSbcZkMp4R26vBsMLFYH4kQ67/bbV8XaCQ==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
    <style>

    .modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgb(0,0,0);
    background-color: rgba(0,0,0,0.4);
    padding-top: 60px;
  }

  .modal-content {
    background-color: #fefefe;
    margin: 5% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
    max-width: 300px;
    text-align: center;
  }

 
  
    </style>
</head>
<body>
    <h3 class=" text-center text-danger mb-4">Delete Account</h3>

    <form action="" method="POST" class="mt-5">
        <div class="form-outline mb-4">
            <input type="submit" class="form-control w-50 m-auto " name="delete" Value="DELETE ACCOUNT" >
        </div>
        <div class="form-outline ">
            <input type="submit" class="form-control w-50 m-auto " name="dont_delete" Value="DON'T DELETE ACCOUNT" >
        </div>
    </form>
    <?php
        $usersession = $_SESSION['username'];
        if(isset($_POST['delete'])){
            $delete_query = "DELETE FROM `registration` WHERE `Username` = '$usersession'";
            $result = mysqli_query($conn,$delete_query);
            if($result){
                session_destroy();
                echo "<script>alert('WE WILL MISS YOU COME SOON AGAIN..!');
                window.location.href='../index.php';</script>";
            }
        }

        if(isset($_POST['dont_delete'])){
            echo "<script>window.location.href='profile.php';</script>";
        }
    
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>   
</body>
</html>