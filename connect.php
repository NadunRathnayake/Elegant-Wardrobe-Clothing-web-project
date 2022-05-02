<?php

error_reporting(0);
$servername = "127.0.0.1";//localhost
$username = "root";
$password="";
$dbname = "elegant_wardrobe";

$conn = mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
    echo "Database Not connected";
}else{
   // echo "Database Connected";
}
?>