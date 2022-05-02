<?php
session_start();
  require 'connect.php';

  if(isset($_POST['AUname'])){
    $Uname = $_POST['AUname'];
  }
  if(isset($_POST['APwd'])){
    $ApassW = $_POST['APwd'];
  }
  $sql = "select * from administrator where UserName = '$Uname' && Password = '$ApassW'";

  $result = mysqli_query($conn,$sql);

  $num = mysqli_num_rows($result);

  if($num == 1){
    $_SESSION['AUname'] = $Uname;

    header('location:Admin panel.php');
  }else{
    include('AdminLog.php');
  }
  ?>