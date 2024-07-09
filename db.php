<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "sakshikirana_store";

$conn = mysqli_connect($host,$username,$password,$dbname);

if($conn){
    echo "Data base connected";
}
else{
    echo "refuse";
}
?>