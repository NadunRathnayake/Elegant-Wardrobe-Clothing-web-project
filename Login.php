<?php
require 'connect.php';

if(isset($_POST['Reg'])){
    $NameF = $_POST['FName'];
    $NameL = $_POST['LName'];
    $mob = $_POST['mobile'];
    $mail = $_POST['email'];
    $residence = $_POST['address'];
    $dist = $_POST['district'];
    $Pass = $_POST['pwd'];
    $ConPass = $_POST['ConPwd'];

    if($Pass == $ConPass){
        $sql ="SELECT * FROM customers WHERE Email = '$mail'";
        $result = mysqli_query($conn,$sql);

        if (mysqli_num_rows($result) > 0){
            echo  '<div class="alert alert-warning alert-dismissible mt-2">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>The email you entered have been registered before!!!!!</strong>
          </div>';
        }
        else{
            $pass = password_hash($Pass, PASSWORD_DEFAULT);
            $sql = "INSERT INTO customers(First_Name, Last_Name, Mobile, Email, Address, District,Password) VALUES('$NameF','$NameL','$mob','$mail','$residence','$dist','$pass')";

            $result = mysqli_query($conn,$sql);

            if(!$result){
                echo '<div class="alert alert-danger alert-dismissible mt-2">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>User Cannot Be Registered Unfortunately !!!!</strong>
              </div>';
            }
            else{
              echo  '<div class="alert alert-success alert-dismissible mt-2">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong>Thank You, You Have Been Registered Successfully!!!!</strong>
            </div>';
            }
        }
    }
    else{
       echo '<div class="alert alert-warning alert-dismissible mt-2">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>The Passwords You entered does not match. Please Re-check!!!!</strong>
      </div>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register/Login</title>

    <!-----------------------------------------------Head INCLUDE here---------------------------------------------------------------------------->
<?php include ('Assets\files\header.php'); ?>

<body>

<!-- ___________________________________________________NAVBAR HERE________________________________________________________ -->

<?php include ('Assets\files\nav.php'); ?>

    <style>
        .btn-default {
            font-family: verdana;
            font-size: 16px;
            background-color: #F6BE00;
            color: black;
            letter-spacing: 1px;
            line-height: 15px;
            border: 2px solid white;
            border-radius: 40px;
            transition: all 0.3s ease 0s;
            padding-top:3%;
            padding-bottom:3%;
            padding-right:3%;
            padding-left:3%;
        }
    </style>

</head>
<body>
<div class="container" style = "padding-top:10%;">
<div class = "alert"></div>
  <div class="row" >
    <div class="col-sm" style = "padding-right:5%;">
      <p style = "color: black;"><b>Are You Already a Customer ?</b></p><br>
      If you have an account with us, log in using your email address.<br><br>
      <h2 style = "font-family: calibri;"> Log in Here! </h2>
      <form action = "LogConfig.php" method = "post">
          <div class = "form-group">
              <label>Enter the Email</label>
              <input type = "email" name = "logmail" class = "form-control" placeholder = "Enter your Email" required>
          </div>
          <div class = "form-group">
              <label>Enter the Password</label>
              <input type = "password" name = "logpass" class = "form-control" placeholder = "Enter your Password">
          </div>
          <button type="submit" class="btn btn-default" name = "submit">Log in</button>
          <span>Proceed to admin login</span> <a href = "AdminLog.php">Admin</a>
      </form>

    </div>
    
    <div class="col bg-dark" style = "padding-left:3%;padding-top:2%;padding-bottom:2%; padding-right:3%;">
      <b><h2 style = "font-family: calibri; color:yellow;">You are not a member yet ????</h2></b>
      <form class = "rounded" action = "" method = "post" style="color:white;">
      <div class = "form-group">
          <label>First Name</label>
          <input type = "text" name = "FName" class = "form-control" required>
      </div>
      <div class = "form-group">
          <label>Last Name</label>
          <input type = "text" name = "LName" class = "form-control" required>
      </div>
      <div class = "form-group">
          <label>Mobile Number</label>
          <input type = "text" name = "mobile" class = "form-control" maxlength = "10" minlength = "10" required>
      </div>
      <div class = "form-group">
          <label>Email</label>
          <input type = "email" name = "email" class = "form-control" required>
      </div>
      <div class = "form-group">
          <label>St.Address</label>
          <input type = "text" name = "address" class = "form-control" required>
      </div>
      <div class = "form-group">
          <label>District</label>
          <input type = "text" name = "district" class = "form-control" required>
      </div>
      <div class = "form-group">
          <label>Password</label>
          <input type = "password" name = "pwd" class = "form-control" minlength = "8" required>
      </div>
      <div class = "form-group">
          <label>Confirm Password</label>
          <input type = "password" name = "ConPwd" class = "form-control" required>
      </div>
      <input type="submit" name = "Reg" class="btn btn-default btn-block" value = "Register"></button>
    </div>
    
 
  </div>

      </form>
   
      
</div>
<!-- ___________________________________________________FOORTER HERE________________________________________________________ -->
<?php include ('Assets\files\footer.php'); ?>
</body>
</html>
